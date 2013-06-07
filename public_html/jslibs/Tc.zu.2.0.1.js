/**
 * Extends Tc Module with zuizz rest features
 *
 * @author Veith
 * @namespace Tc
 */

Tc.zu = {};
(function ($) {

    Tc.zu.bind_helper = function ($ctx, class_id) {
        // Use a jQuery object as simple PubSub
        var pubSub = jQuery({});

        // add two classes in ui element i.e tc-log tc-log-label  for 
        var class_selector = ".tc-" + class_id,
            message = class_id + ":change";

        // Listen to change events on elements with the tc-[class_id] class and proxy
        // them to the PubSub, so that the change is "broadcasted" to all connected objects
        // TIPP: trigger the change event on contenteditable elements

        $ctx.on("change", class_selector, function () {
            var $input = jQuery(this);
            var attr_name = this.className.match(new RegExp('tc-' + class_id + '-(\\w+)'))[1];
            if ($input.is("input, textarea, select")) {
                pubSub.trigger(message, [ attr_name, $input.val() ]);
            } else {
                pubSub.trigger(message, [ attr_name, $input.html() ]);
            }
        });

        // PubSub propagates changes to all bound elements, setting value of
        // input tags or HTML content of other tags
        pubSub.on(message, function (evt, prop_name, new_val) {
            jQuery(class_selector + class_selector + "-" + prop_name, $ctx).each(function () {
                var $bound = jQuery(this);
                if ($bound.is("input, textarea, select")) {
                    $bound.val(new_val);
                } else {
                    $bound.html(new_val);
                }
            });
        });
        return pubSub;
    };

    /**
     * Bind UI to model. Access your data directly with model.attributes or with get
     * @param $ctx
     * @param class_id
     * @param data
     * @returns {{pubSub: Tc.zu.bind_helper, attributes: {}, data: Function, set: Function, get: Function, onChange: Function}}
     */
    Tc.zu.bind = function ($ctx, class_id, data) {
        var model = {
            pubSub: new Tc.zu.bind_helper($ctx, class_id),
            attributes: {},
            fields: {

            },
            data: function (fields) {
                for (var key in fields) {
                    // key is the key
                    model.pubSub.trigger(class_id + ":change", [ key, fields[key], this ]);
                    if (model.fields[key] == undefined) {
                        model.fields[key] = {};
                    }
                }
            },
            // The attribute setter publish changes using the pubSub PubSub
            set: function (attr_name, val) {
                // return false to stop update process, use beforeChange for validation,...
                if (model.fields[attr_name] != undefined && typeof(model.fields[attr_name].beforeChange) == "function") {
                    var continueSet = model.fields[attr_name].beforeChange(val);
                }
                if (continueSet !== false) {
                    this.attributes[ attr_name ] = val;
                    model.pubSub.trigger(class_id + ":change", [ attr_name, val, this ]);
                    // general callback
                    model.onChange(attr_name, val);

                    // callback for single attributes
                    if (model.fields[attr_name] != undefined && typeof(model.fields[attr_name].onChange) == "function") {
                        model.fields[attr_name].onChange(val);
                    }
                }
            },

            get: function (attr_name) {
                return this.attributes[ attr_name ];
            },
            onChange: function (key, value) {
            }


        };
        // Subscribe to the PubSub
        model.pubSub.on(class_id + ":change", function (evt, attr_name, new_val, initiator) {
            if (initiator !== model) {
                model.set(attr_name, new_val);
            }
        });

        if (typeof (data) == "object") {
            model.data(data);
        }

        return model;
    };

    Tc.zu.rest =
        function (resourceURI) {
            this.URI = resourceURI; // /rest/com.zuizz.user.users

            this.init = function () {
                this.Id = null;
                this.Mimetype = {'search': 'json', 'list': 'json', 'entity': 'json'};
                this.Page = {'search': 0, 'list': 0};
                this.NumOfPages = {'search': 0, 'list': 0};
                this.Limit = {'search': 10, 'list': 10};
                this.Fields = {'search': ['id'], 'list': ['id', 'title'], 'entity': ['id']};
                this.Scope = {'search': {}, 'list': {}};
                this.DataType = {'search': 'json', 'list': 'json', 'entity': 'json'};
                this.JsonpCallback = {'search': null, 'list': null, 'entity': null};

                this.modified_attributes = {};

                if (localStorage[this.URI + '_order_list'] == undefined) {
                    localStorage[this.URI + '_order_list'] = [
                        ['id', 1]
                    ];
                }

                if (localStorage[this.URI + '_order_search'] == undefined) {
                    localStorage[this.URI + '_order_search'] = [
                        ['id', 1]
                    ];
                }

                this.Order = {
                    'search': localStorage[this.URI + '_order_search'],
                    'list': localStorage[this.URI + '_order_list']
                };


            };
            this.init();


            /**
             * Get a specific item from resource
             *
             * @method resGet
             * @param {id} identifier Resource identifier
             * @param {object} statusCode Callback functions for status codes
             * @param {array} additional_data (optional)
             * @return void
             */
            this.get = function (identifier, statusCode) {
                this.Id = identifier;
                $.ajax({
                    url: this.URI + '/' + this.Id + '.' + this.Mimetype.entity,
                    type: 'GET',
                    dataType: this.DataType.entity,
                    resourceDataType: this.JsonpCallback.entity,
                    data: {
                        'fields': this.Fields.entity
                    },
                    'statusCode': statusCode
                });
            };


            /**
             * Search a list from resource
             *
             * @method restList
             * @param {string} query Search term
             * @param {object} statusCode Callback functions for status codes
             * @param {array} additional_data (optional)
             * @param {int} page (optional)
             * @return void
             */
            this.search = function (query, statusCode, additional_data, page) {

                var data = {};
                if (page != undefined) {
                    if (typeof (additional_data) != "object") {
                        this.Page.list = data;
                    }
                }

                if (typeof (additional_data) == "object") {
                    data = additional_data;
                }
                data.q = query;
                data.fields = this.Fields.search;
                data.page = this.Page.search;
                data.limit = this.Limit.search;
                data.scope = this.Scope.search;
                data.order = this.Order.search[0];
                data.order_dir = this.Order.search[1];


                var self = this;
                if (statusCode[200] != undefined) {
                    statusCode['t200'] = statusCode[200];
                }

                statusCode[200] = function (r) {
                    if (r.metadata != undefined) {
                        self.page.search = r.metadata.page;
                        self.NumOfPages.search = r.metadata.pages;
                    }
                    if (statusCode[200] != undefined) {
                        statusCode['t200'](r);
                    }
                };

                $.ajax({
                    'url': this.URI + '.' + this.Mimetype.search,
                    'type': 'GET',
                    'dataType': this.DataType.search,
                    'resourceDataType': this.JsonpCallback.search,
                    'data': data,
                    'statusCode': statusCode
                });
            };

            /**
             * Receive a list from resource
             * @method restList
             * @param {object} statusCode Callback functions for status codes
             * @param {array} additional_data (optional)
             * @param {int} page (optional)
             * @return void
             */
            this.list = function (statusCode, additional_data, page) {

                var data = {};
                if (page != undefined) {
                    if (typeof (additional_data) != "object") {
                        this.Page.list = data;
                    }
                }

                if (typeof (additional_data) == "object") {
                    data = additional_data;
                }

                data.fields = this.Fields.list;
                data.page = this.Page.list;
                data.limit = this.Limit.list;
                data.scope = this.Scope.list;
                data.order = this.Order.list[0];
                data.order_dir = this.Order.list[1];


                var self = this;
                if (statusCode[200] != undefined) {
                    statusCode['t200'] = statusCode[200];
                }

                statusCode[200] = function (r) {
                    if (r.metadata != undefined) {
                        self.page.list = r.metadata.page;
                        self.NumOfPages.list = r.metadata.pages;
                    }
                    if (statusCode[200] != undefined) {
                        statusCode['t200'](r);
                    }
                };

                $.ajax({
                    'url': this.URI + '.' + this.Mimetype.list,
                    'type': 'GET',
                    'dataType': this.DataType.list,
                    'resourceDataType': this.JsonpCallback.list,
                    'data': data,
                    'statusCode': statusCode
                });
            };

            this.add = function (fields, statusCode) {

            };
            this.post_file = function (fields, statusCode) {

            };

            this.update = function (fields, statusCode) {
                this.set(fields);
                this.save(statusCode)
            };

            this.set = function (fields) {
                for (var key in fields) {
                    // The key is key
                    this.modified_attributes[key] = fields[key];
                }
            };
            this.save = function (statusCode) {
                var self = this;
                $.ajax({
                    url: this.URI + '/' + this.Id + '.' + this.Mimetype.entity,
                    type: 'PUT',
                    resourceDataType: this.JsonpCallback.entity,
                    data: self.modified_attributes,
                    'statusCode': statusCode
                });


            };

            this.destroy = function (identifier, statusCode) {
                var self = this;
                $.ajax({
                    url: this.URI + '/' + this.Id + '.' + this.Mimetype.entity,
                    type: 'DELETE',
                    resourceDataType: this.JsonpCallback.entity,
                    'statusCode': statusCode
                });

            };

            this.setScope = function (scope, requestType) {  // like  {'running': 1, 'age': ['gt',8], 'name': ['contains','Vei']}
                if (requestType != undefined) {
                    this.Scope[requestType] = scope;
                } else {
                    this.Scope.list = scope;
                    this.Scope.search = scope;
                }


            };

            this.defineFields = function (fields, requestType) { //search || list || entity, fields array
                if (requestType != undefined) {
                    this.Fields [requestType] = fields;
                } else {
                    this.Fields.list = fields;
                    this.Fields.search = fields;
                }
            };

            this.orderBy = function (field, direction, requestType) { // -1 asc ,1 desc
                if (direction == undefined) {
                    direction = -1;
                }

                if (requestType != undefined) {
                    this.Order[requestType] = [field, direction];
                    localStorage[this.URI + '_order_' + requestType] = [field, direction];
                } else {
                    this.Order.list = [field, direction];
                    localStorage[this.URI + '_order_list'] = [field, direction];
                    this.Order.search = [field, direction];
                    localStorage[this.resourceURI + '_order_search'] = [field, direction];
                }
            };


            this.setPrevPage = function (requestType) {
                if (requestType != undefined) {
                    if (this.resourcePage[requestType] > 0) {
                        this.resourcePage[requestType]--;
                    }
                } else {
                    if (this.resourcePage[requestType] > 0) {
                        this.resourcePage.list--;
                        this.resourcePage.search--;
                    }
                }
            };

            this.setNextPage = function (requestType) {
                if (requestType != undefined) {
                    if (this.resourcePage[requestType] < this.resourceNumOfPages[requestType]) {
                        this.resourcePage[requestType]++;
                    }
                } else {
                    if (this.resourcePage[requestType] < this.resourceNumOfPages[requestType]) {
                        this.resourcePage.list++;
                        this.resourcePage.search++;
                    }
                }
            };

            this.setPage = function (page, requestType) {
                if (requestType != undefined) {
                    this.resourcePage[requestType] = page;
                } else {
                    this.resourcePage.list = page;
                    this.resourcePage.search = page;
                }
            };

            this.setLimit = function (numOfItems, requestType) {
                if (requestType != undefined) {
                    this.resourceLimit[requestType] = numOfItems;
                } else {
                    this.resourceLimit.list = numOfItems;
                    this.resourceLimit.search = numOfItems;
                }
            };

        };

})(Tc.$);


(function ($) {
    "use strict";
    Tc.Module = Tc.Module.extend({

        autobutton:function(){
            var $ctx = this.$ctx,
                self = this;
            $ctx.on('click', '.tcb', function () {
                var action = this.className.match(/tcb-\w+/g);
                var button = this;
                var i = 0;
                if (action != null) {
                    for (i; i < action.length; i++) {
                        if(typeof(self[action[i]]) == "function"){
                            self[action[i]](button);
                        }
                    }
                }
            });
        },

        initDot: function () {
            var $ctx = this.$ctx,
                self = this;
            self.dot = {};

            $('script', $ctx).each(function (i, e) {
                var dot = $(e);
                self.dot[dot.attr('name')] = doT.template(dot.html());
            });

        },
        debounce: function (func, threshold, execAtBeginning) {
            var timeout;
            return function debounced() {
                var obj = this, args = arguments;

                function delayed() {
                    if (!execAtBeginning) {
                        func.apply(obj, args);
                    }
                    timeout = null;
                }

                if (timeout) {
                    clearTimeout(timeout);
                }
                else if (execAtBeginning) {
                    func.apply(obj, args);
                }

                timeout = setTimeout(delayed, threshold || 500);
            };
        },
        initKeys: function () {
            this.KEY = {
                TAB: 9,
                ENTER: 13,
                ESC: 27,
                SPACE: 32,
                LEFT: 37,
                UP: 38,
                RIGHT: 39,
                DOWN: 40,
                SHIFT: 16,
                CTRL: 17,
                ALT: 18,
                PAGE_UP: 33,
                PAGE_DOWN: 34,
                HOME: 36,
                END: 35,
                BACKSPACE: 8,
                DELETE: 46,
                isArrow: function (k) {
                    k = k.which ? k.which : k;
                    switch (k) {
                        case KEY.LEFT:
                        case KEY.RIGHT:
                        case KEY.UP:
                        case KEY.DOWN:
                            return true;
                    }
                    return false;
                },
                isControl: function (e) {
                    var k = e.which;
                    switch (k) {
                        case KEY.SHIFT:
                        case KEY.CTRL:
                        case KEY.ALT:
                            return true;
                    }

                    if (e.metaKey) return true;

                    return false;
                },
                isFunctionKey: function (k) {
                    k = k.which ? k.which : k;
                    return k >= 112 && k <= 123;
                }
            };
        }


    });
})(Tc.$);
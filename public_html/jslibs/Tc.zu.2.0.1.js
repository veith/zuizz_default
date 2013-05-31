/**
 * Extends Tc Module with zuizz rest features
 *
 * @author Veith
 * @namespace Tc
 * @class zu.REST
 * @static
 */


(function ($) {
    "use strict";
    Tc.Module = Tc.Module.extend({

        initRest: function (resourceURI) {
            this.resourceURI = resourceURI; // /rest/com.zuizz.user.users
            this.resourceId = null;
            this.resourceMimetype = {'search': 'json', 'list': 'json', 'entity': 'json'};
            this.resourcePage = {'search': 0, 'list': 0};
            this.resourceNumOfPages = {'search': 0, 'list': 0};
            this.resourceLimit = {'search': 10, 'list': 10};
            this.resourceFields = {'search': ['id'], 'list': ['id', 'title'], 'entity': ['id']};
            this.resourceScope = {'search': {}, 'list': {}};
            this.resourceDataType = {'search': 'json', 'list': 'json', 'entity': 'json'};
            this.resourceJsonpCallback = {'search': null, 'list': null, 'entity': null};

            if (localStorage[this.resourceURI + '_order_list'] == undefined) {
                localStorage[this.resourceURI + '_order_list'] = [
                    ['id', 1]
                ];
            }

            if (localStorage[this.resourceURI + '_order_search'] == undefined) {
                localStorage[this.resourceURI + '_order_search'] = [
                    ['id', 1]
                ];
            }

            this.resourceOrder = {
                'search': localStorage[this.resourceURI + '_order_search'],
                'list': localStorage[this.resourceURI + '_order_list']
            };


        },

        restLoad: function (identifier, statusCode) {
            var self = this;
            self.resourceId = identifier;
            $.ajax({
                url: self.resourceURI + self.resourceId + '.' + self.resourceMimetype.entity,
                type: 'GET',
                dataType: self.resourceDataType,
                resourceDataType: self.resourceJsonpCallback.entity,
                data: {
                    'fields': self.resourceFields.entity
                },
                'statusCode': statusCode
            });
        },

        restSearch: function (query, statusCode, additional_data, page) {
            var self = this;
            var data = {};
            if (page != undefined) {
                if (typeof (data) != "object") {
                    self.resourcePage.list = data;
                }
            }

            if (typeof (data) == "object") {
                data = additional_data;
            }
            data.q = query;
            data.fields = self.resourceFields.search;
            data.page = self.resourcePage.search;
            data.limit = self.resourceLimit.search;
            data.scope = self.resourceScope.search;
            data.order = self.resourceOrder.search[0];
            data.order_dir = self.resourceOrder.search[1];

            $.ajax({
                'url': self.resourceURI + '.' + self.resourceMimetype.search,
                'type': 'GET',
                'dataType': self.resourceDataType,
                'resourceDataType': self.resourceJsonpCallback.search,
                'data': data,
                'statusCode': statusCode
            });
        },
        restList: function (statusCode, additional_data, page) {
            var self = this;
            var data = {};
            if (page != undefined) {
                if (typeof (data) != "object") {
                    self.resourcePage.list = data;
                }
            }

            if (typeof (data) == "object") {
                data = additional_data;
            }

            data.fields = self.resourceFields.list;
            data.page = self.resourcePage.list;
            data.limit = self.resourceLimit.list;
            data.scope = self.resourceScope.list;
            data.order = self.resourceOrder.list[0];
            data.order_dir = self.resourceOrder.list[1];


            $.ajax({
                'url': self.resourceURI + '.' + self.resourceMimetype.list,
                'type': 'GET',
                'dataType': self.resourceDataType,
                'resourceDataType': self.resourceJsonpCallback.list,
                'data': data,
                'statusCode': statusCode
            });
        },

        restUpdate: function (identifier, fields, statusCode) {
        },
        restDelete: function (identifier, statusCode) {
        },

        restSetScope: function (scope, requestType) {
        }, //search || list

        restSetFields: function (fields, requestType) { //search || list || entity, fields array
            if (requestType != undefined) {

                self.resourceFields [requestType] = fields;
            } else {
                self.resourceFields.list = fields;
                self.resourceFields.search = fields;
            }
        },

        restOrderBy: function (field, direction, requestType) { // -1 asc ,1 desc
            if (direction == undefined) {
                direction = -1;
            }

            if (requestType != undefined) {
                self.resourceOrder[requestType] = [field, direction];
                localStorage[self.resourceURI + '_order_' + requestType] = [field, direction];
            } else {
                self.resourceOrder.list = [field, direction];
                localStorage[this.resourceURI + '_order_list'] = [field, direction];
                self.resourceOrder.search = [field, direction];
                localStorage[this.resourceURI + '_order_search'] = [field, direction];
            }
        },


        restSetPrevPage: function (requestType) {
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
        },
        restSetNextPage: function (requestType) {
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
        },

        restSetPage: function (page, requestType) {
            if (requestType != undefined) {
                this.resourcePage[requestType] = page;
            } else {
                this.resourcePage.list = page;
                this.resourcePage.search = page;
            }
        },

        restSetLimit: function (numOfItems, requestType) {
            if (requestType != undefined) {
                this.resourceLimit[requestType] = numOfItems;
            } else {
                this.resourceLimit.list = numOfItems;
                this.resourceLimit.search = numOfItems;
            }
        },


        initDot: function () {
            var $ctx = this.$ctx,
                self = this;
            self.dot = {};

            $('script', $ctx).each(function (i, e) {
                var dot = $(e);
                self.dot[dot.attr('name')] = doT.mstatus(dot.html());
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
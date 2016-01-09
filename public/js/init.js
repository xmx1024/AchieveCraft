$.fn.finished = function (interval, callback) {

    var typingTimer;
    var doneTypingInterval = interval;

    this.keyup(function () {
        clearTimeout(typingTimer);
        typingTimer = setTimeout(callback, doneTypingInterval);
    });

    this.keydown(function () {
        clearTimeout(typingTimer);
    });

    return this;
};

/*
 * I don't like how this code turned out. So I will more than likely redo it eventfully
 */
var AchieveCraft = {
    variables: {
        baseUrl: location.protocol + "//" + document.domain + "/"//"http://dev.achievecraft.net/"
    },

    Components: {
        Preview: {
            elements: {
                $image: $(".Preview.image"),
                $shortLink: $(".Preview.link.short"),
                $directLink: $(".Preview.link.direct"),

                $bbCode: $(".Preview.code.bb"),
                $htmlCode: $(".Preview.code.html"),
            },
            variables: {
                icon: "19.1",
                topText: "Achievement Get",
                bottomText: "Make an Achievement!",

                url: ""
            },

            setIcon: function (id) {
                this.variables.icon = id;
                this.update();
            },
            setTopText: function (text) {
                if (text == "") {
                    text = " ";
                }
                this.variables.topText = text;
                this.update();
            },
            setBottomText: function (text) {
                if (text == "") {
                    text = " ";
                }
                this.variables.bottomText = text;
                this.update();
            },

            update: function () {
                this.variables.url = AchieveCraft.variables.baseUrl + "i/" + this.variables.icon + "/" + encodeURIComponent(this.variables.topText) + "/" + encodeURIComponent(this.variables.bottomText);

                this.elements.$image.attr("src", this.variables.url);

                this.elements.$directLink.val(this.variables.url);
                this.elements.$directLink.attr("data-clipboard-text", this.variables.url);

                var bbCode = "[url=" + AchieveCraft.variables.baseUrl + "?r=s][img]" + this.variables.url + "[/img][/url]";
                var htmlCode = '<a href="' + AchieveCraft.variables.baseUrl + '?r=h"><img src="' + this.variables.url + '"></a>';

                this.elements.$bbCode.val(bbCode);
                this.elements.$bbCode.attr("data-clipboard-text", bbCode);

                this.elements.$htmlCode.val(htmlCode);
                this.elements.$htmlCode.attr("data-clipboard-text", htmlCode);
            },

            init: function () {
                this.update();
                new Clipboard('.clickToCopy');
            }
        },
        IconSelector: {
            elements: {
                $groupSelect: $(".IconSelector.list.groups"),
                $iconList: $(".IconSelector.list.icons")
            },
            variables: {
                currentGroup: ""
            },

            onGroupChange: function (group) {
                console.log("Group:", group);
            },

            onIconChange: function (icon) {
                console.log("Icon:", icon);
            },

            setGroup: function (group) {
                var that = this;
                this.variables.currentGroup = group;

                $.get(AchieveCraft.variables.baseUrl + "api/get/group/" + group, function (data) {
                    $.each(data.icons, function (a, icon) {
                        that.elements.$iconList.append('<div class="icon-preview" title="' + icon.id + '" data-id="' + icon.id + '" style="background:url(data:image/png;base64,' + icon.base64 + '); cursor: pointer; cursor: hand;"></div>');
                    });

                    $(".icon-preview").unbind("click");
                    $(".icon-preview").click(function () {
                        that.onIconChange($(this).attr("data-id"));
                    });
                });
            },

            init: function () {
                var that = this;

                this.setGroup("vanilla");

                this.elements.$groupSelect.change(function () {
                    that.elements.$iconList.html("");
                    that.onGroupChange($(this).val());
                });

                $.get(AchieveCraft.variables.baseUrl + "api/get/groups", function (data) {
                    $.each(data, function (a, group) {
                        if(group.id !== "vanilla") {
                            that.elements.$groupSelect.append('<option value="' + group.id + '" selected>' + group.name + '</option>');
                        }
                    });
                    that.elements.$groupSelect.append('<option value="vanilla" selected>Vanilla Minecraft</option>');
                    $('select').material_select();
                });
            }
        },
        TextSetter: {
            elements: {
                $topText: $(".TextSetter.topText"),
                $bottomText: $(".TextSetter.bottomText")
            },

            onTopTextChange: function (text) {
                console.log("Top Text:", text);
            },
            onBottomTextChange: function (text) {
                console.log("Bottom Text:", text);
            },

            init: function () {
                var that = this;

                this.elements.$topText.finished(500, function () {
                    that.onTopTextChange(that.elements.$topText.val());
                });
                this.elements.$topText.change(function () {
                    that.onTopTextChange($(this).val());
                });

                this.elements.$bottomText.finished(500, function () {
                    that.onBottomTextChange(that.elements.$bottomText.val());
                });
                this.elements.$bottomText.change(function () {
                    that.onBottomTextChange($(this).val());
                });
            }
        }
    },

    init: function () {
        this.Components.IconSelector.init();
        this.Components.Preview.init();
        this.Components.TextSetter.init();

        $('.uploadIconForm').submit(function (e) {
            e.preventDefault();
            $.ajax({
                url: 'api/new/icon',
                type: 'POST',
                processData: false,
                contentType: false,
                data: new FormData(this),
                success: function (data) {
                    console.log(data);
                }
            });
        });
    }
};

(function ($) {
    $(function () {

        $('.button-collapse').sideNav();
        $('.modal-trigger').leanModal();
        $('select').material_select();

        AchieveCraft.init();

        AchieveCraft.Components.TextSetter.onTopTextChange = function (text) {
            AchieveCraft.Components.Preview.setTopText(text);
        };

        AchieveCraft.Components.TextSetter.onBottomTextChange = function (text) {
            AchieveCraft.Components.Preview.setBottomText(text);
        };

        AchieveCraft.Components.IconSelector.onIconChange = function (icon) {
            AchieveCraft.Components.Preview.setIcon(icon);
        };

        AchieveCraft.Components.IconSelector.onGroupChange = function (group) {
            AchieveCraft.Components.IconSelector.setGroup(group);
        };
    });
})(jQuery);
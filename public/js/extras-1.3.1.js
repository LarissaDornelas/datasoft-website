"use strict";
!(function (e) {
    jQuery(document).ready(function () {
        var t = {
            getItem: function (e) {
                return (
                    (e &&
                        decodeURIComponent(
                            document.cookie.replace(
                                new RegExp(
                                    "(?:(?:^|.*;)\\s*" +
                                        encodeURIComponent(e).replace(
                                            /[\-\.\+\*]/g,
                                            "\\$&"
                                        ) +
                                        "\\s*\\=\\s*([^;]*).*$)|^.*$"
                                ),
                                "$1"
                            )
                        )) ||
                    null
                );
            },
            setItem: function (e, t, o, a, r, s) {
                if (!e || /^(?:expires|max\-age|path|domain|secure)$/i.test(e))
                    return !1;
                var n = "";
                if (o)
                    switch (o.constructor) {
                        case Number:
                            n =
                                o === 1 / 0
                                    ? "; expires=Fri, 31 Dec 9999 23:59:59 GMT"
                                    : "; max-age=" + o;
                            break;
                        case String:
                            n = "; expires=" + o;
                            break;
                        case Date:
                            n = "; expires=" + o.toUTCString();
                    }
                return (
                    (document.cookie =
                        encodeURIComponent(e) +
                        "=" +
                        encodeURIComponent(t) +
                        n +
                        (r ? "; domain=" + r : "") +
                        (a ? "; path=" + a : "") +
                        (s ? "; secure" : "")),
                    !0
                );
            },
            removeItem: function (e, t, o) {
                return (
                    !!this.hasItem(e) &&
                    ((document.cookie =
                        encodeURIComponent(e) +
                        "=; expires=Thu, 01 Jan 1970 00:00:00 GMT" +
                        (o ? "; domain=" + o : "") +
                        (t ? "; path=" + t : "")),
                    !0)
                );
            },
            hasItem: function (e) {
                return (
                    !(
                        !e ||
                        /^(?:expires|max\-age|path|domain|secure)$/i.test(e)
                    ) &&
                    new RegExp(
                        "(?:^|;\\s*)" +
                            encodeURIComponent(e).replace(
                                /[\-\.\+\*]/g,
                                "\\$&"
                            ) +
                            "\\s*\\="
                    ).test(document.cookie)
                );
            },
            keys: function () {
                for (
                    var e = document.cookie
                            .replace(
                                /((?:^|\s*;)[^\=]+)(?=;|$)|^\s*|\s*(?:\=[^;]*)?(?:\1|$)/g,
                                ""
                            )
                            .split(/\s*(?:\=[^;]*)?;\s*/),
                        t = e.length,
                        o = 0;
                    o < t;
                    o++
                )
                    e[o] = decodeURIComponent(e[o]);
                return e;
            },
        };
        function o(e, t) {
            t = t || 1;
            let o;
            if (/^#([A-Fa-f0-9]{3}){1,2}$/.test(e))
                return (
                    3 == (o = e.substring(1).split("")).length &&
                        (o = [o[0], o[0], o[1], o[1], o[2], o[2]]),
                    "rgba(" +
                        [
                            ((o = "0x" + o.join("")) >> 16) & 255,
                            (o >> 8) & 255,
                            255 & o,
                        ].join(",") +
                        "," +
                        t +
                        ")"
                );
        }
        const a = {
            primary: "#007bff",
            secondary: "#5A6169",
            success: "#17c671",
            info: "#00b8d8",
            warning: "#ffb400",
            danger: "#c4183c",
            salmon: "#FF4169",
            "royal-blue": "#674EEC",
            java: "#1ADBA2",
        };
        var r,
            s,
            n = e(".color-switcher .accent-colors"),
            i = e("#main-stylesheet"),
            c = i.attr("href"),
            l = i.attr("data-version");
        n.on("click", "li", function () {
            var t = e(this).attr("data-color"),
                d = "styles/accents/" + t + "." + l + ".css";
            "primary" == t && (d = c),
                n.find("li.active").removeClass("active"),
                e(this).addClass("active"),
                i.attr("href", d),
                (function (t) {
                    var o = e("#main-logo");
                    r || (r = o.attr("src"));
                    "primary" === t
                        ? o.attr("src", r)
                        : o.attr(
                              "src",
                              "images/shards-dashboards-logo-" + t + ".svg"
                          );
                    var a = e(".auth-form__logo");
                    s || (s = a.attr("src"));
                    "primary" === t
                        ? a.attr("src", r)
                        : a.attr(
                              "src",
                              "images/shards-dashboards-logo-" + t + ".svg"
                          );
                })(t),
                void 0 !== window.ubdChart &&
                    (function (t) {
                        (t = a[t]),
                            (ubdChart.data.datasets[0].backgroundColor = [
                                o(t, 0.9),
                                o(t, 0.5),
                                o(t, 0.3),
                            ]),
                            ubdChart.update(),
                            e(
                                ".ubd-stats__legend .ubd-stats__item:nth-child(1) i"
                            ).attr("style", "color:" + o(t, 0.9) + ";"),
                            e(
                                ".ubd-stats__legend .ubd-stats__item:nth-child(2) i"
                            ).attr("style", "color:" + o(t, 0.5) + ";"),
                            e(
                                ".ubd-stats__legend .ubd-stats__item:nth-child(3) i"
                            ).attr("style", "color:" + o(t, 0.3) + ";");
                    })(t),
                void 0 !== window.WeeklyPerformanceChart &&
                    ((WeeklyPerformanceChart.data.datasets[0].backgroundColor = o(
                        a[t],
                        1
                    )),
                    (WeeklyPerformanceChart.data.datasets[0].borderColor = o(
                        a[t],
                        1
                    )),
                    WeeklyPerformanceChart.update());
        }),
            e("#social-share").sharrre({
                share: { facebook: !0, twitter: !0 },
                buttons: {
                    facebook: { layout: "button_count", action: "like" },
                    twitter: {
                        count: "horizontal",
                        via: "DesignRevision",
                        hashtags: "bootstrap,uikit",
                    },
                },
                enableTracking: !0,
                enableHover: !1,
                enableCounter: !1,
            }),
            e(".color-switcher-toggle").click(u),
            e(".color-switcher .close").click(u);
        var d = new Date();
        function u() {
            e(".color-switcher").toggleClass("visible"),
                e(".color-switcher").hasClass("visible")
                    ? t.setItem("_sd_cs_visible", !0, d)
                    : t.setItem("_sd_cs_visible", !1, d);
        }
        d.setDate(d.getDate() + 1),
            t.setItem("_sd_demo_page_promo", !0, d),
            null === t.getItem("_sd_cs_visible") &&
                t.setItem("_sd_cs_visible", !0, d),
            "false" !== t.getItem("_sd_cs_visible") &&
                e(".color-switcher").addClass("visible"),
            setTimeout(function () {
                e(".loading-overlay").fadeOut(250);
            }, 2e3),
            e(document).on("click", "a.extra-action", function (t) {
                t.preventDefault(), t.stopPropagation();
                var o = e(this).attr("href");
                !(function () {
                    try {
                        return window.self !== window.top;
                    } catch (e) {
                        return !0;
                    }
                })()
                    ? (window.location = o)
                    : (window.parent.location = o);
            });
    });
})(jQuery);

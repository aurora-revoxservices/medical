/*!
 * pickadate.js v3.6.3, 2019/04/03
 * By Amsul, http://amsul.ca
 * Hosted on http://amsul.github.io/pickadate.js
 * Licensed under MIT
 */
! function (a) {
    "function" == typeof define && define.amd ? define("picker", ["jquery"], a) : "object" == typeof exports ? module.exports = a(require("jquery")) : this.Picker = a(jQuery)
}(function (a) {
    function b(h, i, k, m) {
        function o() {
            return b._.node("div", b._.node("div", b._.node("div", b._.node("div", C.component.nodes(x.open), z.box), z.wrap), z.frame), z.holder, 'tabindex="-1"')
        }

        function p() {
            A.data(i, C).addClass(z.input).val(A.data("value") ? C.get("select", y.format) : h.value).on("focus." + x.id + " click." + x.id, f(function (a) {
                a.preventDefault(), C.open()
            }, 100)).on("mousedown", function () {
                x.handlingOpen = !0;
                var b = function () {
                    setTimeout(function () {
                        a(document).off("mouseup", b), x.handlingOpen = !1
                    }, 0)
                };
                a(document).on("mouseup", b)
            }), y.editable || A.on("keydown." + x.id, v), g(h, {
                haspopup: !0,
                expanded: !1,
                readonly: !1,
                owns: h.id + "_root"
            })
        }

        function q() {
            g(C.$root[0], "hidden", !0)
        }

        function r() {
            C.$holder.on({
                keydown: v,
                "focus.toOpen": u,
                blur: function () {
                    A.removeClass(z.target)
                },
                focusin: function (a) {
                    C.$root.removeClass(z.focused), a.stopPropagation()
                },
                "mousedown click": function (b) {
                    var c = e(b, h);
                    c != C.$holder[0] && (b.stopPropagation(), "mousedown" != b.type || a(c).is("input, select, textarea, button, option") || (b.preventDefault(), C.$holder.eq(0).focus()))
                }
            }).on("click", "[data-pick], [data-nav], [data-clear], [data-close]", function () {
                var b = a(this),
                    c = b.data(),
                    d = b.hasClass(z.navDisabled) || b.hasClass(z.disabled),
                    e = j();
                e = e && (e.type || e.href ? e : null), (d || e && !a.contains(C.$root[0], e)) && C.$holder.eq(0).focus(), !d && c.nav ? C.set("highlight", C.component.item.highlight, {
                    nav: c.nav
                }) : !d && "pick" in c ? (C.set("select", c.pick), y.closeOnSelect && C.close(!0)) : c.clear ? (C.clear(), y.closeOnClear && C.close(!0)) : c.close && C.close(!0)
            })
        }

        function s() {
            var b;
            !0 === y.hiddenName ? (b = h.name, h.name = "") : (b = ["string" == typeof y.hiddenPrefix ? y.hiddenPrefix : "", "string" == typeof y.hiddenSuffix ? y.hiddenSuffix : "_submit"], b = b[0] + h.name + b[1]), C._hidden = a('<input type=hidden name="' + b + '"' + (A.data("value") || h.value ? ' value="' + C.get("select", y.formatSubmit) + '"' : "") + ">")[0], A.on("change." + x.id, function () {
                C._hidden.value = h.value ? C.get("select", y.formatSubmit) : ""
            })
        }

        function t() {
            w && n ? C.$holder.find("." + z.frame).one("transitionend", function () {
                C.$holder.eq(0).focus()
            }) : setTimeout(function () {
                C.$holder.eq(0).focus()
            }, 0)
        }

        function u(a) {
            a.stopPropagation(), A.addClass(z.target), C.$root.addClass(z.focused), C.open()
        }

        function v(a) {
            var b = a.keyCode,
                c = /^(8|46)$/.test(b);
            if (27 == b) return C.close(!0), !1;
            (32 == b || c || !x.open && C.component.key[b]) && (a.preventDefault(), a.stopPropagation(), c ? C.clear().close() : C.open())
        }
        if (!h) return b;
        var w = !1,
            x = {
                id: h.id || "P" + Math.abs(~~(Math.random() * new Date)),
                handlingOpen: !1
            },
            y = k ? a.extend(!0, {}, k.defaults, m) : m || {},
            z = a.extend({}, b.klasses(), y.klass),
            A = a(h),
            B = function () {
                return this.start()
            },
            C = B.prototype = {
                constructor: B,
                $node: A,
                start: function () {
                    return x && x.start ? C : (x.methods = {}, x.start = !0, x.open = !1, x.type = h.type, h.autofocus = h == j(), h.readOnly = !y.editable, h.id = h.id || x.id, "text" != h.type && (h.type = "text"), C.component = new k(C, y), C.$root = a('<div class="' + z.picker + '" id="' + h.id + '_root" />'), q(), C.$holder = a(o()).appendTo(C.$root), r(), y.formatSubmit && s(), p(), y.containerHidden ? a(y.containerHidden).append(C._hidden) : A.after(C._hidden), y.container ? a(y.container).append(C.$root) : A.after(C.$root), C.on({
                        start: C.component.onStart,
                        render: C.component.onRender,
                        stop: C.component.onStop,
                        open: C.component.onOpen,
                        close: C.component.onClose,
                        set: C.component.onSet
                    }).on({
                        start: y.onStart,
                        render: y.onRender,
                        stop: y.onStop,
                        open: y.onOpen,
                        close: y.onClose,
                        set: y.onSet
                    }), w = c(C.$holder[0]), h.autofocus && C.open(), C.trigger("start").trigger("render"))
                },
                render: function (b) {
                    return b ? (C.$holder = a(o()), r(), C.$root.html(C.$holder)) : C.$root.find("." + z.box).html(C.component.nodes(x.open)), C.trigger("render")
                },
                stop: function () {
                    return x.start ? (C.close(), C._hidden && C._hidden.parentNode.removeChild(C._hidden), C.$root.remove(), A.removeClass(z.input).removeData(i), setTimeout(function () {
                        A.off("." + x.id)
                    }, 0), h.type = x.type, h.readOnly = !1, C.trigger("stop"), x.methods = {}, x.start = !1, C) : C
                },
                open: function (c) {
                    return x.open ? C : (A.addClass(z.active), g(h, "expanded", !0), setTimeout(function () {
                        C.$root.addClass(z.opened), g(C.$root[0], "hidden", !1)
                    }, 0), !1 !== c && (x.open = !0, w && a("body").css("overflow", "hidden").css("padding-right", "+=" + d()), t(), l.on("click." + x.id + " focusin." + x.id, function (a) {
                        if (!x.handlingOpen) {
                            var b = e(a, h);
                            a.isSimulated || b == h || b == document || 3 == a.which || C.close(b === C.$holder[0])
                        }
                    }).on("keydown." + x.id, function (c) {
                        var d = c.keyCode,
                            f = C.component.key[d],
                            g = e(c, h);
                        27 == d ? C.close(!0) : g != C.$holder[0] || !f && 13 != d ? a.contains(C.$root[0], g) && 13 == d && (c.preventDefault(), g.click()) : (c.preventDefault(), f ? b._.trigger(C.component.key.go, C, [b._.trigger(f)]) : C.$root.find("." + z.highlighted).hasClass(z.disabled) || (C.set("select", C.component.item.highlight), y.closeOnSelect && C.close(!0)))
                    })), C.trigger("open"))
                },
                close: function (b) {
                    return b && (y.editable ? h.focus() : (C.$holder.off("focus.toOpen").focus(), setTimeout(function () {
                        C.$holder.on("focus.toOpen", u)
                    }, 0))), A.removeClass(z.active), g(h, "expanded", !1), setTimeout(function () {
                        C.$root.removeClass(z.opened + " " + z.focused), g(C.$root[0], "hidden", !0)
                    }, 0), x.open ? (x.open = !1, w && a("body").css("overflow", "").css("padding-right", "-=" + d()), l.off("." + x.id), C.trigger("close")) : C
                },
                clear: function (a) {
                    return C.set("clear", null, a)
                },
                set: function (b, c, d) {
                    var e, f, g = a.isPlainObject(b),
                        h = g ? b : {};
                    if (d = g && a.isPlainObject(c) ? c : d || {}, b) {
                        g || (h[b] = c);
                        for (e in h) f = h[e], e in C.component.item && (void 0 === f && (f = null), C.component.set(e, f, d)), "select" != e && "clear" != e || !y.updateInput || A.val("clear" == e ? "" : C.get(e, y.format)).trigger("change");
                        C.render()
                    }
                    return d.muted ? C : C.trigger("set", h)
                },
                get: function (a, c) {
                    if (a = a || "value", null != x[a]) return x[a];
                    if ("valueSubmit" == a) {
                        if (C._hidden) return C._hidden.value;
                        a = "value"
                    }
                    if ("value" == a) return h.value;
                    if (a in C.component.item) {
                        if ("string" == typeof c) {
                            var d = C.component.get(a);
                            return d ? b._.trigger(C.component.formats.toString, C.component, [c, d]) : ""
                        }
                        return C.component.get(a)
                    }
                },
                on: function (b, c, d) {
                    var e, f, g = a.isPlainObject(b),
                        h = g ? b : {};
                    if (b) {
                        g || (h[b] = c);
                        for (e in h) f = h[e], d && (e = "_" + e), x.methods[e] = x.methods[e] || [], x.methods[e].push(f)
                    }
                    return C
                },
                off: function () {
                    var a, b, c = arguments;
                    for (a = 0, namesCount = c.length; a < namesCount; a += 1)(b = c[a]) in x.methods && delete x.methods[b];
                    return C
                },
                trigger: function (a, c) {
                    var d = function (a) {
                        var d = x.methods[a];
                        d && d.map(function (a) {
                            b._.trigger(a, C, [c])
                        })
                    };
                    return d("_" + a), d(a), C
                }
            };
        return new B
    }

    function c(a) {
        var b, c = "position";
        return a.currentStyle ? b = a.currentStyle[c] : window.getComputedStyle && (b = getComputedStyle(a)[c]), "fixed" == b
    }

    function d() {
        if (m.height() <= k.height()) return 0;
        var b = a('<div style="visibility:hidden;width:100px" />').appendTo("body"),
            c = b[0].offsetWidth;
        b.css("overflow", "scroll");
        var d = a('<div style="width:100%" />').appendTo(b),
            e = d[0].offsetWidth;
        return b.remove(), c - e
    }

    function e(a, b) {
        var c = [];
        return a.path && (c = a.path), a.originalEvent && a.originalEvent.path && (c = a.originalEvent.path), c && c.length > 0 ? b && c.indexOf(b) >= 0 ? b : c[0] : a.target
    }

    function f(a, b, c) {
        var d;
        return function () {
            var e = this,
                f = arguments,
                g = function () {
                    d = null, c || a.apply(e, f)
                },
                h = c && !d;
            clearTimeout(d), d = setTimeout(g, b), h && a.apply(e, f)
        }
    }

    function g(b, c, d) {
        if (a.isPlainObject(c))
            for (var e in c) h(b, e, c[e]);
        else h(b, c, d)
    }

    function h(a, b, c) {
        a.setAttribute(("role" == b ? "" : "aria-") + b, c)
    }

    function i(b, c) {
        a.isPlainObject(b) || (b = {
            attribute: c
        }), c = "";
        for (var d in b) {
            var e = ("role" == d ? "" : "aria-") + d;
            c += null == b[d] ? "" : e + '="' + b[d] + '"'
        }
        return c
    }

    function j() {
        try {
            return document.activeElement
        } catch (a) {}
    }
    var k = a(window),
        l = a(document),
        m = a(document.documentElement),
        n = null != document.documentElement.style.transition;
    return b.klasses = function (a) {
        return a = a || "picker", {
            picker: a,
            opened: a + "--opened",
            focused: a + "--focused",
            input: a + "__input",
            active: a + "__input--active",
            target: a + "__input--target",
            holder: a + "__holder",
            frame: a + "__frame",
            wrap: a + "__wrap",
            box: a + "__box"
        }
    }, b._ = {
        group: function (a) {
            for (var c, d = "", e = b._.trigger(a.min, a); e <= b._.trigger(a.max, a, [e]); e += a.i) c = b._.trigger(a.item, a, [e]), d += b._.node(a.node, c[0], c[1], c[2]);
            return d
        },
        node: function (b, c, d, e) {
            return c ? (c = a.isArray(c) ? c.join("") : c, d = d ? ' class="' + d + '"' : "", e = e ? " " + e : "", "<" + b + d + e + ">" + c + "</" + b + ">") : ""
        },
        lead: function (a) {
            return (a < 10 ? "0" : "") + a
        },
        trigger: function (a, b, c) {
            return "function" == typeof a ? a.apply(b, c || []) : a
        },
        digits: function (a) {
            return /\d/.test(a[1]) ? 2 : 1
        },
        isDate: function (a) {
            return {}.toString.call(a).indexOf("Date") > -1 && this.isInteger(a.getDate())
        },
        isInteger: function (a) {
            return {}.toString.call(a).indexOf("Number") > -1 && a % 1 == 0
        },
        ariaAttr: i
    }, b.extend = function (c, d) {
        a.fn[c] = function (e, f) {
            var g = this.data(c);
            return "picker" == e ? g : g && "string" == typeof e ? b._.trigger(g[e], g, [f]) : this.each(function () {
                a(this).data(c) || new b(this, c, d, e)
            })
        }, a.fn[c].defaults = d.defaults
    }, b
});

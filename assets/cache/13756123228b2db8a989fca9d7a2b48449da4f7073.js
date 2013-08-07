/*! jQuery v1.10.2 | (c) 2005, 2013 jQuery Foundation, Inc. | jquery.org/license
//@ sourceMappingURL=jquery-1.10.2.min.map
*/
(function(e,t){var n,r,i=typeof t,o=e.location,a=e.document,s=a.documentElement,l=e.jQuery,u=e.$,c={},p=[],f="1.10.2",d=p.concat,h=p.push,g=p.slice,m=p.indexOf,y=c.toString,v=c.hasOwnProperty,b=f.trim,x=function(e,t){return new x.fn.init(e,t,r)},w=/[+-]?(?:\d*\.|)\d+(?:[eE][+-]?\d+|)/.source,T=/\S+/g,C=/^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g,N=/^(?:\s*(<[\w\W]+>)[^>]*|#([\w-]*))$/,k=/^<(\w+)\s*\/?>(?:<\/\1>|)$/,E=/^[\],:{}\s]*$/,S=/(?:^|:|,)(?:\s*\[)+/g,A=/\\(?:["\\\/bfnrt]|u[\da-fA-F]{4})/g,j=/"[^"\\\r\n]*"|true|false|null|-?(?:\d+\.|)\d+(?:[eE][+-]?\d+|)/g,D=/^-ms-/,L=/-([\da-z])/gi,H=function(e,t){return t.toUpperCase()},q=function(e){(a.addEventListener||"load"===e.type||"complete"===a.readyState)&&(_(),x.ready())},_=function(){a.addEventListener?(a.removeEventListener("DOMContentLoaded",q,!1),e.removeEventListener("load",q,!1)):(a.detachEvent("onreadystatechange",q),e.detachEvent("onload",q))};x.fn=x.prototype={jquery:f,constructor:x,init:function(e,n,r){var i,o;if(!e)return this;if("string"==typeof e){if(i="<"===e.charAt(0)&&">"===e.charAt(e.length-1)&&e.length>=3?[null,e,null]:N.exec(e),!i||!i[1]&&n)return!n||n.jquery?(n||r).find(e):this.constructor(n).find(e);if(i[1]){if(n=n instanceof x?n[0]:n,x.merge(this,x.parseHTML(i[1],n&&n.nodeType?n.ownerDocument||n:a,!0)),k.test(i[1])&&x.isPlainObject(n))for(i in n)x.isFunction(this[i])?this[i](n[i]):this.attr(i,n[i]);return this}if(o=a.getElementById(i[2]),o&&o.parentNode){if(o.id!==i[2])return r.find(e);this.length=1,this[0]=o}return this.context=a,this.selector=e,this}return e.nodeType?(this.context=this[0]=e,this.length=1,this):x.isFunction(e)?r.ready(e):(e.selector!==t&&(this.selector=e.selector,this.context=e.context),x.makeArray(e,this))},selector:"",length:0,toArray:function(){return g.call(this)},get:function(e){return null==e?this.toArray():0>e?this[this.length+e]:this[e]},pushStack:function(e){var t=x.merge(this.constructor(),e);return t.prevObject=this,t.context=this.context,t},each:function(e,t){return x.each(this,e,t)},ready:function(e){return x.ready.promise().done(e),this},slice:function(){return this.pushStack(g.apply(this,arguments))},first:function(){return this.eq(0)},last:function(){return this.eq(-1)},eq:function(e){var t=this.length,n=+e+(0>e?t:0);return this.pushStack(n>=0&&t>n?[this[n]]:[])},map:function(e){return this.pushStack(x.map(this,function(t,n){return e.call(t,n,t)}))},end:function(){return this.prevObject||this.constructor(null)},push:h,sort:[].sort,splice:[].splice},x.fn.init.prototype=x.fn,x.extend=x.fn.extend=function(){var e,n,r,i,o,a,s=arguments[0]||{},l=1,u=arguments.length,c=!1;for("boolean"==typeof s&&(c=s,s=arguments[1]||{},l=2),"object"==typeof s||x.isFunction(s)||(s={}),u===l&&(s=this,--l);u>l;l++)if(null!=(o=arguments[l]))for(i in o)e=s[i],r=o[i],s!==r&&(c&&r&&(x.isPlainObject(r)||(n=x.isArray(r)))?(n?(n=!1,a=e&&x.isArray(e)?e:[]):a=e&&x.isPlainObject(e)?e:{},s[i]=x.extend(c,a,r)):r!==t&&(s[i]=r));return s},x.extend({expando:"jQuery"+(f+Math.random()).replace(/\D/g,""),noConflict:function(t){return e.$===x&&(e.$=u),t&&e.jQuery===x&&(e.jQuery=l),x},isReady:!1,readyWait:1,holdReady:function(e){e?x.readyWait++:x.ready(!0)},ready:function(e){if(e===!0?!--x.readyWait:!x.isReady){if(!a.body)return setTimeout(x.ready);x.isReady=!0,e!==!0&&--x.readyWait>0||(n.resolveWith(a,[x]),x.fn.trigger&&x(a).trigger("ready").off("ready"))}},isFunction:function(e){return"function"===x.type(e)},isArray:Array.isArray||function(e){return"array"===x.type(e)},isWindow:function(e){return null!=e&&e==e.window},isNumeric:function(e){return!isNaN(parseFloat(e))&&isFinite(e)},type:function(e){return null==e?e+"":"object"==typeof e||"function"==typeof e?c[y.call(e)]||"object":typeof e},isPlainObject:function(e){var n;if(!e||"object"!==x.type(e)||e.nodeType||x.isWindow(e))return!1;try{if(e.constructor&&!v.call(e,"constructor")&&!v.call(e.constructor.prototype,"isPrototypeOf"))return!1}catch(r){return!1}if(x.support.ownLast)for(n in e)return v.call(e,n);for(n in e);return n===t||v.call(e,n)},isEmptyObject:function(e){var t;for(t in e)return!1;return!0},error:function(e){throw Error(e)},parseHTML:function(e,t,n){if(!e||"string"!=typeof e)return null;"boolean"==typeof t&&(n=t,t=!1),t=t||a;var r=k.exec(e),i=!n&&[];return r?[t.createElement(r[1])]:(r=x.buildFragment([e],t,i),i&&x(i).remove(),x.merge([],r.childNodes))},parseJSON:function(n){return e.JSON&&e.JSON.parse?e.JSON.parse(n):null===n?n:"string"==typeof n&&(n=x.trim(n),n&&E.test(n.replace(A,"@").replace(j,"]").replace(S,"")))?Function("return "+n)():(x.error("Invalid JSON: "+n),t)},parseXML:function(n){var r,i;if(!n||"string"!=typeof n)return null;try{e.DOMParser?(i=new DOMParser,r=i.parseFromString(n,"text/xml")):(r=new ActiveXObject("Microsoft.XMLDOM"),r.async="false",r.loadXML(n))}catch(o){r=t}return r&&r.documentElement&&!r.getElementsByTagName("parsererror").length||x.error("Invalid XML: "+n),r},noop:function(){},globalEval:function(t){t&&x.trim(t)&&(e.execScript||function(t){e.eval.call(e,t)})(t)},camelCase:function(e){return e.replace(D,"ms-").replace(L,H)},nodeName:function(e,t){return e.nodeName&&e.nodeName.toLowerCase()===t.toLowerCase()},each:function(e,t,n){var r,i=0,o=e.length,a=M(e);if(n){if(a){for(;o>i;i++)if(r=t.apply(e[i],n),r===!1)break}else for(i in e)if(r=t.apply(e[i],n),r===!1)break}else if(a){for(;o>i;i++)if(r=t.call(e[i],i,e[i]),r===!1)break}else for(i in e)if(r=t.call(e[i],i,e[i]),r===!1)break;return e},trim:b&&!b.call("\ufeff\u00a0")?function(e){return null==e?"":b.call(e)}:function(e){return null==e?"":(e+"").replace(C,"")},makeArray:function(e,t){var n=t||[];return null!=e&&(M(Object(e))?x.merge(n,"string"==typeof e?[e]:e):h.call(n,e)),n},inArray:function(e,t,n){var r;if(t){if(m)return m.call(t,e,n);for(r=t.length,n=n?0>n?Math.max(0,r+n):n:0;r>n;n++)if(n in t&&t[n]===e)return n}return-1},merge:function(e,n){var r=n.length,i=e.length,o=0;if("number"==typeof r)for(;r>o;o++)e[i++]=n[o];else while(n[o]!==t)e[i++]=n[o++];return e.length=i,e},grep:function(e,t,n){var r,i=[],o=0,a=e.length;for(n=!!n;a>o;o++)r=!!t(e[o],o),n!==r&&i.push(e[o]);return i},map:function(e,t,n){var r,i=0,o=e.length,a=M(e),s=[];if(a)for(;o>i;i++)r=t(e[i],i,n),null!=r&&(s[s.length]=r);else for(i in e)r=t(e[i],i,n),null!=r&&(s[s.length]=r);return d.apply([],s)},guid:1,proxy:function(e,n){var r,i,o;return"string"==typeof n&&(o=e[n],n=e,e=o),x.isFunction(e)?(r=g.call(arguments,2),i=function(){return e.apply(n||this,r.concat(g.call(arguments)))},i.guid=e.guid=e.guid||x.guid++,i):t},access:function(e,n,r,i,o,a,s){var l=0,u=e.length,c=null==r;if("object"===x.type(r)){o=!0;for(l in r)x.access(e,n,l,r[l],!0,a,s)}else if(i!==t&&(o=!0,x.isFunction(i)||(s=!0),c&&(s?(n.call(e,i),n=null):(c=n,n=function(e,t,n){return c.call(x(e),n)})),n))for(;u>l;l++)n(e[l],r,s?i:i.call(e[l],l,n(e[l],r)));return o?e:c?n.call(e):u?n(e[0],r):a},now:function(){return(new Date).getTime()},swap:function(e,t,n,r){var i,o,a={};for(o in t)a[o]=e.style[o],e.style[o]=t[o];i=n.apply(e,r||[]);for(o in t)e.style[o]=a[o];return i}}),x.ready.promise=function(t){if(!n)if(n=x.Deferred(),"complete"===a.readyState)setTimeout(x.ready);else if(a.addEventListener)a.addEventListener("DOMContentLoaded",q,!1),e.addEventListener("load",q,!1);else{a.attachEvent("onreadystatechange",q),e.attachEvent("onload",q);var r=!1;try{r=null==e.frameElement&&a.documentElement}catch(i){}r&&r.doScroll&&function o(){if(!x.isReady){try{r.doScroll("left")}catch(e){return setTimeout(o,50)}_(),x.ready()}}()}return n.promise(t)},x.each("Boolean Number String Function Array Date RegExp Object Error".split(" "),function(e,t){c["[object "+t+"]"]=t.toLowerCase()});function M(e){var t=e.length,n=x.type(e);return x.isWindow(e)?!1:1===e.nodeType&&t?!0:"array"===n||"function"!==n&&(0===t||"number"==typeof t&&t>0&&t-1 in e)}r=x(a),function(e,t){var n,r,i,o,a,s,l,u,c,p,f,d,h,g,m,y,v,b="sizzle"+-new Date,w=e.document,T=0,C=0,N=st(),k=st(),E=st(),S=!1,A=function(e,t){return e===t?(S=!0,0):0},j=typeof t,D=1<<31,L={}.hasOwnProperty,H=[],q=H.pop,_=H.push,M=H.push,O=H.slice,F=H.indexOf||function(e){var t=0,n=this.length;for(;n>t;t++)if(this[t]===e)return t;return-1},B="checked|selected|async|autofocus|autoplay|controls|defer|disabled|hidden|ismap|loop|multiple|open|readonly|required|scoped",P="[\\x20\\t\\r\\n\\f]",R="(?:\\\\.|[\\w-]|[^\\x00-\\xa0])+",W=R.replace("w","w#"),$="\\["+P+"*("+R+")"+P+"*(?:([*^$|!~]?=)"+P+"*(?:(['\"])((?:\\\\.|[^\\\\])*?)\\3|("+W+")|)|)"+P+"*\\]",I=":("+R+")(?:\\(((['\"])((?:\\\\.|[^\\\\])*?)\\3|((?:\\\\.|[^\\\\()[\\]]|"+$.replace(3,8)+")*)|.*)\\)|)",z=RegExp("^"+P+"+|((?:^|[^\\\\])(?:\\\\.)*)"+P+"+$","g"),X=RegExp("^"+P+"*,"+P+"*"),U=RegExp("^"+P+"*([>+~]|"+P+")"+P+"*"),V=RegExp(P+"*[+~]"),Y=RegExp("="+P+"*([^\\]'\"]*)"+P+"*\\]","g"),J=RegExp(I),G=RegExp("^"+W+"$"),Q={ID:RegExp("^#("+R+")"),CLASS:RegExp("^\\.("+R+")"),TAG:RegExp("^("+R.replace("w","w*")+")"),ATTR:RegExp("^"+$),PSEUDO:RegExp("^"+I),CHILD:RegExp("^:(only|first|last|nth|nth-last)-(child|of-type)(?:\\("+P+"*(even|odd|(([+-]|)(\\d*)n|)"+P+"*(?:([+-]|)"+P+"*(\\d+)|))"+P+"*\\)|)","i"),bool:RegExp("^(?:"+B+")$","i"),needsContext:RegExp("^"+P+"*[>+~]|:(even|odd|eq|gt|lt|nth|first|last)(?:\\("+P+"*((?:-\\d)?\\d*)"+P+"*\\)|)(?=[^-]|$)","i")},K=/^[^{]+\{\s*\[native \w/,Z=/^(?:#([\w-]+)|(\w+)|\.([\w-]+))$/,et=/^(?:input|select|textarea|button)$/i,tt=/^h\d$/i,nt=/'|\\/g,rt=RegExp("\\\\([\\da-f]{1,6}"+P+"?|("+P+")|.)","ig"),it=function(e,t,n){var r="0x"+t-65536;return r!==r||n?t:0>r?String.fromCharCode(r+65536):String.fromCharCode(55296|r>>10,56320|1023&r)};try{M.apply(H=O.call(w.childNodes),w.childNodes),H[w.childNodes.length].nodeType}catch(ot){M={apply:H.length?function(e,t){_.apply(e,O.call(t))}:function(e,t){var n=e.length,r=0;while(e[n++]=t[r++]);e.length=n-1}}}function at(e,t,n,i){var o,a,s,l,u,c,d,m,y,x;if((t?t.ownerDocument||t:w)!==f&&p(t),t=t||f,n=n||[],!e||"string"!=typeof e)return n;if(1!==(l=t.nodeType)&&9!==l)return[];if(h&&!i){if(o=Z.exec(e))if(s=o[1]){if(9===l){if(a=t.getElementById(s),!a||!a.parentNode)return n;if(a.id===s)return n.push(a),n}else if(t.ownerDocument&&(a=t.ownerDocument.getElementById(s))&&v(t,a)&&a.id===s)return n.push(a),n}else{if(o[2])return M.apply(n,t.getElementsByTagName(e)),n;if((s=o[3])&&r.getElementsByClassName&&t.getElementsByClassName)return M.apply(n,t.getElementsByClassName(s)),n}if(r.qsa&&(!g||!g.test(e))){if(m=d=b,y=t,x=9===l&&e,1===l&&"object"!==t.nodeName.toLowerCase()){c=mt(e),(d=t.getAttribute("id"))?m=d.replace(nt,"\\$&"):t.setAttribute("id",m),m="[id='"+m+"'] ",u=c.length;while(u--)c[u]=m+yt(c[u]);y=V.test(e)&&t.parentNode||t,x=c.join(",")}if(x)try{return M.apply(n,y.querySelectorAll(x)),n}catch(T){}finally{d||t.removeAttribute("id")}}}return kt(e.replace(z,"$1"),t,n,i)}function st(){var e=[];function t(n,r){return e.push(n+=" ")>o.cacheLength&&delete t[e.shift()],t[n]=r}return t}function lt(e){return e[b]=!0,e}function ut(e){var t=f.createElement("div");try{return!!e(t)}catch(n){return!1}finally{t.parentNode&&t.parentNode.removeChild(t),t=null}}function ct(e,t){var n=e.split("|"),r=e.length;while(r--)o.attrHandle[n[r]]=t}function pt(e,t){var n=t&&e,r=n&&1===e.nodeType&&1===t.nodeType&&(~t.sourceIndex||D)-(~e.sourceIndex||D);if(r)return r;if(n)while(n=n.nextSibling)if(n===t)return-1;return e?1:-1}function ft(e){return function(t){var n=t.nodeName.toLowerCase();return"input"===n&&t.type===e}}function dt(e){return function(t){var n=t.nodeName.toLowerCase();return("input"===n||"button"===n)&&t.type===e}}function ht(e){return lt(function(t){return t=+t,lt(function(n,r){var i,o=e([],n.length,t),a=o.length;while(a--)n[i=o[a]]&&(n[i]=!(r[i]=n[i]))})})}s=at.isXML=function(e){var t=e&&(e.ownerDocument||e).documentElement;return t?"HTML"!==t.nodeName:!1},r=at.support={},p=at.setDocument=function(e){var n=e?e.ownerDocument||e:w,i=n.defaultView;return n!==f&&9===n.nodeType&&n.documentElement?(f=n,d=n.documentElement,h=!s(n),i&&i.attachEvent&&i!==i.top&&i.attachEvent("onbeforeunload",function(){p()}),r.attributes=ut(function(e){return e.className="i",!e.getAttribute("className")}),r.getElementsByTagName=ut(function(e){return e.appendChild(n.createComment("")),!e.getElementsByTagName("*").length}),r.getElementsByClassName=ut(function(e){return e.innerHTML="<div class='a'></div><div class='a i'></div>",e.firstChild.className="i",2===e.getElementsByClassName("i").length}),r.getById=ut(function(e){return d.appendChild(e).id=b,!n.getElementsByName||!n.getElementsByName(b).length}),r.getById?(o.find.ID=function(e,t){if(typeof t.getElementById!==j&&h){var n=t.getElementById(e);return n&&n.parentNode?[n]:[]}},o.filter.ID=function(e){var t=e.replace(rt,it);return function(e){return e.getAttribute("id")===t}}):(delete o.find.ID,o.filter.ID=function(e){var t=e.replace(rt,it);return function(e){var n=typeof e.getAttributeNode!==j&&e.getAttributeNode("id");return n&&n.value===t}}),o.find.TAG=r.getElementsByTagName?function(e,n){return typeof n.getElementsByTagName!==j?n.getElementsByTagName(e):t}:function(e,t){var n,r=[],i=0,o=t.getElementsByTagName(e);if("*"===e){while(n=o[i++])1===n.nodeType&&r.push(n);return r}return o},o.find.CLASS=r.getElementsByClassName&&function(e,n){return typeof n.getElementsByClassName!==j&&h?n.getElementsByClassName(e):t},m=[],g=[],(r.qsa=K.test(n.querySelectorAll))&&(ut(function(e){e.innerHTML="<select><option selected=''></option></select>",e.querySelectorAll("[selected]").length||g.push("\\["+P+"*(?:value|"+B+")"),e.querySelectorAll(":checked").length||g.push(":checked")}),ut(function(e){var t=n.createElement("input");t.setAttribute("type","hidden"),e.appendChild(t).setAttribute("t",""),e.querySelectorAll("[t^='']").length&&g.push("[*^$]="+P+"*(?:''|\"\")"),e.querySelectorAll(":enabled").length||g.push(":enabled",":disabled"),e.querySelectorAll("*,:x"),g.push(",.*:")})),(r.matchesSelector=K.test(y=d.webkitMatchesSelector||d.mozMatchesSelector||d.oMatchesSelector||d.msMatchesSelector))&&ut(function(e){r.disconnectedMatch=y.call(e,"div"),y.call(e,"[s!='']:x"),m.push("!=",I)}),g=g.length&&RegExp(g.join("|")),m=m.length&&RegExp(m.join("|")),v=K.test(d.contains)||d.compareDocumentPosition?function(e,t){var n=9===e.nodeType?e.documentElement:e,r=t&&t.parentNode;return e===r||!(!r||1!==r.nodeType||!(n.contains?n.contains(r):e.compareDocumentPosition&&16&e.compareDocumentPosition(r)))}:function(e,t){if(t)while(t=t.parentNode)if(t===e)return!0;return!1},A=d.compareDocumentPosition?function(e,t){if(e===t)return S=!0,0;var i=t.compareDocumentPosition&&e.compareDocumentPosition&&e.compareDocumentPosition(t);return i?1&i||!r.sortDetached&&t.compareDocumentPosition(e)===i?e===n||v(w,e)?-1:t===n||v(w,t)?1:c?F.call(c,e)-F.call(c,t):0:4&i?-1:1:e.compareDocumentPosition?-1:1}:function(e,t){var r,i=0,o=e.parentNode,a=t.parentNode,s=[e],l=[t];if(e===t)return S=!0,0;if(!o||!a)return e===n?-1:t===n?1:o?-1:a?1:c?F.call(c,e)-F.call(c,t):0;if(o===a)return pt(e,t);r=e;while(r=r.parentNode)s.unshift(r);r=t;while(r=r.parentNode)l.unshift(r);while(s[i]===l[i])i++;return i?pt(s[i],l[i]):s[i]===w?-1:l[i]===w?1:0},n):f},at.matches=function(e,t){return at(e,null,null,t)},at.matchesSelector=function(e,t){if((e.ownerDocument||e)!==f&&p(e),t=t.replace(Y,"='$1']"),!(!r.matchesSelector||!h||m&&m.test(t)||g&&g.test(t)))try{var n=y.call(e,t);if(n||r.disconnectedMatch||e.document&&11!==e.document.nodeType)return n}catch(i){}return at(t,f,null,[e]).length>0},at.contains=function(e,t){return(e.ownerDocument||e)!==f&&p(e),v(e,t)},at.attr=function(e,n){(e.ownerDocument||e)!==f&&p(e);var i=o.attrHandle[n.toLowerCase()],a=i&&L.call(o.attrHandle,n.toLowerCase())?i(e,n,!h):t;return a===t?r.attributes||!h?e.getAttribute(n):(a=e.getAttributeNode(n))&&a.specified?a.value:null:a},at.error=function(e){throw Error("Syntax error, unrecognized expression: "+e)},at.uniqueSort=function(e){var t,n=[],i=0,o=0;if(S=!r.detectDuplicates,c=!r.sortStable&&e.slice(0),e.sort(A),S){while(t=e[o++])t===e[o]&&(i=n.push(o));while(i--)e.splice(n[i],1)}return e},a=at.getText=function(e){var t,n="",r=0,i=e.nodeType;if(i){if(1===i||9===i||11===i){if("string"==typeof e.textContent)return e.textContent;for(e=e.firstChild;e;e=e.nextSibling)n+=a(e)}else if(3===i||4===i)return e.nodeValue}else for(;t=e[r];r++)n+=a(t);return n},o=at.selectors={cacheLength:50,createPseudo:lt,match:Q,attrHandle:{},find:{},relative:{">":{dir:"parentNode",first:!0}," ":{dir:"parentNode"},"+":{dir:"previousSibling",first:!0},"~":{dir:"previousSibling"}},preFilter:{ATTR:function(e){return e[1]=e[1].replace(rt,it),e[3]=(e[4]||e[5]||"").replace(rt,it),"~="===e[2]&&(e[3]=" "+e[3]+" "),e.slice(0,4)},CHILD:function(e){return e[1]=e[1].toLowerCase(),"nth"===e[1].slice(0,3)?(e[3]||at.error(e[0]),e[4]=+(e[4]?e[5]+(e[6]||1):2*("even"===e[3]||"odd"===e[3])),e[5]=+(e[7]+e[8]||"odd"===e[3])):e[3]&&at.error(e[0]),e},PSEUDO:function(e){var n,r=!e[5]&&e[2];return Q.CHILD.test(e[0])?null:(e[3]&&e[4]!==t?e[2]=e[4]:r&&J.test(r)&&(n=mt(r,!0))&&(n=r.indexOf(")",r.length-n)-r.length)&&(e[0]=e[0].slice(0,n),e[2]=r.slice(0,n)),e.slice(0,3))}},filter:{TAG:function(e){var t=e.replace(rt,it).toLowerCase();return"*"===e?function(){return!0}:function(e){return e.nodeName&&e.nodeName.toLowerCase()===t}},CLASS:function(e){var t=N[e+" "];return t||(t=RegExp("(^|"+P+")"+e+"("+P+"|$)"))&&N(e,function(e){return t.test("string"==typeof e.className&&e.className||typeof e.getAttribute!==j&&e.getAttribute("class")||"")})},ATTR:function(e,t,n){return function(r){var i=at.attr(r,e);return null==i?"!="===t:t?(i+="","="===t?i===n:"!="===t?i!==n:"^="===t?n&&0===i.indexOf(n):"*="===t?n&&i.indexOf(n)>-1:"$="===t?n&&i.slice(-n.length)===n:"~="===t?(" "+i+" ").indexOf(n)>-1:"|="===t?i===n||i.slice(0,n.length+1)===n+"-":!1):!0}},CHILD:function(e,t,n,r,i){var o="nth"!==e.slice(0,3),a="last"!==e.slice(-4),s="of-type"===t;return 1===r&&0===i?function(e){return!!e.parentNode}:function(t,n,l){var u,c,p,f,d,h,g=o!==a?"nextSibling":"previousSibling",m=t.parentNode,y=s&&t.nodeName.toLowerCase(),v=!l&&!s;if(m){if(o){while(g){p=t;while(p=p[g])if(s?p.nodeName.toLowerCase()===y:1===p.nodeType)return!1;h=g="only"===e&&!h&&"nextSibling"}return!0}if(h=[a?m.firstChild:m.lastChild],a&&v){c=m[b]||(m[b]={}),u=c[e]||[],d=u[0]===T&&u[1],f=u[0]===T&&u[2],p=d&&m.childNodes[d];while(p=++d&&p&&p[g]||(f=d=0)||h.pop())if(1===p.nodeType&&++f&&p===t){c[e]=[T,d,f];break}}else if(v&&(u=(t[b]||(t[b]={}))[e])&&u[0]===T)f=u[1];else while(p=++d&&p&&p[g]||(f=d=0)||h.pop())if((s?p.nodeName.toLowerCase()===y:1===p.nodeType)&&++f&&(v&&((p[b]||(p[b]={}))[e]=[T,f]),p===t))break;return f-=i,f===r||0===f%r&&f/r>=0}}},PSEUDO:function(e,t){var n,r=o.pseudos[e]||o.setFilters[e.toLowerCase()]||at.error("unsupported pseudo: "+e);return r[b]?r(t):r.length>1?(n=[e,e,"",t],o.setFilters.hasOwnProperty(e.toLowerCase())?lt(function(e,n){var i,o=r(e,t),a=o.length;while(a--)i=F.call(e,o[a]),e[i]=!(n[i]=o[a])}):function(e){return r(e,0,n)}):r}},pseudos:{not:lt(function(e){var t=[],n=[],r=l(e.replace(z,"$1"));return r[b]?lt(function(e,t,n,i){var o,a=r(e,null,i,[]),s=e.length;while(s--)(o=a[s])&&(e[s]=!(t[s]=o))}):function(e,i,o){return t[0]=e,r(t,null,o,n),!n.pop()}}),has:lt(function(e){return function(t){return at(e,t).length>0}}),contains:lt(function(e){return function(t){return(t.textContent||t.innerText||a(t)).indexOf(e)>-1}}),lang:lt(function(e){return G.test(e||"")||at.error("unsupported lang: "+e),e=e.replace(rt,it).toLowerCase(),function(t){var n;do if(n=h?t.lang:t.getAttribute("xml:lang")||t.getAttribute("lang"))return n=n.toLowerCase(),n===e||0===n.indexOf(e+"-");while((t=t.parentNode)&&1===t.nodeType);return!1}}),target:function(t){var n=e.location&&e.location.hash;return n&&n.slice(1)===t.id},root:function(e){return e===d},focus:function(e){return e===f.activeElement&&(!f.hasFocus||f.hasFocus())&&!!(e.type||e.href||~e.tabIndex)},enabled:function(e){return e.disabled===!1},disabled:function(e){return e.disabled===!0},checked:function(e){var t=e.nodeName.toLowerCase();return"input"===t&&!!e.checked||"option"===t&&!!e.selected},selected:function(e){return e.parentNode&&e.parentNode.selectedIndex,e.selected===!0},empty:function(e){for(e=e.firstChild;e;e=e.nextSibling)if(e.nodeName>"@"||3===e.nodeType||4===e.nodeType)return!1;return!0},parent:function(e){return!o.pseudos.empty(e)},header:function(e){return tt.test(e.nodeName)},input:function(e){return et.test(e.nodeName)},button:function(e){var t=e.nodeName.toLowerCase();return"input"===t&&"button"===e.type||"button"===t},text:function(e){var t;return"input"===e.nodeName.toLowerCase()&&"text"===e.type&&(null==(t=e.getAttribute("type"))||t.toLowerCase()===e.type)},first:ht(function(){return[0]}),last:ht(function(e,t){return[t-1]}),eq:ht(function(e,t,n){return[0>n?n+t:n]}),even:ht(function(e,t){var n=0;for(;t>n;n+=2)e.push(n);return e}),odd:ht(function(e,t){var n=1;for(;t>n;n+=2)e.push(n);return e}),lt:ht(function(e,t,n){var r=0>n?n+t:n;for(;--r>=0;)e.push(r);return e}),gt:ht(function(e,t,n){var r=0>n?n+t:n;for(;t>++r;)e.push(r);return e})}},o.pseudos.nth=o.pseudos.eq;for(n in{radio:!0,checkbox:!0,file:!0,password:!0,image:!0})o.pseudos[n]=ft(n);for(n in{submit:!0,reset:!0})o.pseudos[n]=dt(n);function gt(){}gt.prototype=o.filters=o.pseudos,o.setFilters=new gt;function mt(e,t){var n,r,i,a,s,l,u,c=k[e+" "];if(c)return t?0:c.slice(0);s=e,l=[],u=o.preFilter;while(s){(!n||(r=X.exec(s)))&&(r&&(s=s.slice(r[0].length)||s),l.push(i=[])),n=!1,(r=U.exec(s))&&(n=r.shift(),i.push({value:n,type:r[0].replace(z," ")}),s=s.slice(n.length));for(a in o.filter)!(r=Q[a].exec(s))||u[a]&&!(r=u[a](r))||(n=r.shift(),i.push({value:n,type:a,matches:r}),s=s.slice(n.length));if(!n)break}return t?s.length:s?at.error(e):k(e,l).slice(0)}function yt(e){var t=0,n=e.length,r="";for(;n>t;t++)r+=e[t].value;return r}function vt(e,t,n){var r=t.dir,o=n&&"parentNode"===r,a=C++;return t.first?function(t,n,i){while(t=t[r])if(1===t.nodeType||o)return e(t,n,i)}:function(t,n,s){var l,u,c,p=T+" "+a;if(s){while(t=t[r])if((1===t.nodeType||o)&&e(t,n,s))return!0}else while(t=t[r])if(1===t.nodeType||o)if(c=t[b]||(t[b]={}),(u=c[r])&&u[0]===p){if((l=u[1])===!0||l===i)return l===!0}else if(u=c[r]=[p],u[1]=e(t,n,s)||i,u[1]===!0)return!0}}function bt(e){return e.length>1?function(t,n,r){var i=e.length;while(i--)if(!e[i](t,n,r))return!1;return!0}:e[0]}function xt(e,t,n,r,i){var o,a=[],s=0,l=e.length,u=null!=t;for(;l>s;s++)(o=e[s])&&(!n||n(o,r,i))&&(a.push(o),u&&t.push(s));return a}function wt(e,t,n,r,i,o){return r&&!r[b]&&(r=wt(r)),i&&!i[b]&&(i=wt(i,o)),lt(function(o,a,s,l){var u,c,p,f=[],d=[],h=a.length,g=o||Nt(t||"*",s.nodeType?[s]:s,[]),m=!e||!o&&t?g:xt(g,f,e,s,l),y=n?i||(o?e:h||r)?[]:a:m;if(n&&n(m,y,s,l),r){u=xt(y,d),r(u,[],s,l),c=u.length;while(c--)(p=u[c])&&(y[d[c]]=!(m[d[c]]=p))}if(o){if(i||e){if(i){u=[],c=y.length;while(c--)(p=y[c])&&u.push(m[c]=p);i(null,y=[],u,l)}c=y.length;while(c--)(p=y[c])&&(u=i?F.call(o,p):f[c])>-1&&(o[u]=!(a[u]=p))}}else y=xt(y===a?y.splice(h,y.length):y),i?i(null,a,y,l):M.apply(a,y)})}function Tt(e){var t,n,r,i=e.length,a=o.relative[e[0].type],s=a||o.relative[" "],l=a?1:0,c=vt(function(e){return e===t},s,!0),p=vt(function(e){return F.call(t,e)>-1},s,!0),f=[function(e,n,r){return!a&&(r||n!==u)||((t=n).nodeType?c(e,n,r):p(e,n,r))}];for(;i>l;l++)if(n=o.relative[e[l].type])f=[vt(bt(f),n)];else{if(n=o.filter[e[l].type].apply(null,e[l].matches),n[b]){for(r=++l;i>r;r++)if(o.relative[e[r].type])break;return wt(l>1&&bt(f),l>1&&yt(e.slice(0,l-1).concat({value:" "===e[l-2].type?"*":""})).replace(z,"$1"),n,r>l&&Tt(e.slice(l,r)),i>r&&Tt(e=e.slice(r)),i>r&&yt(e))}f.push(n)}return bt(f)}function Ct(e,t){var n=0,r=t.length>0,a=e.length>0,s=function(s,l,c,p,d){var h,g,m,y=[],v=0,b="0",x=s&&[],w=null!=d,C=u,N=s||a&&o.find.TAG("*",d&&l.parentNode||l),k=T+=null==C?1:Math.random()||.1;for(w&&(u=l!==f&&l,i=n);null!=(h=N[b]);b++){if(a&&h){g=0;while(m=e[g++])if(m(h,l,c)){p.push(h);break}w&&(T=k,i=++n)}r&&((h=!m&&h)&&v--,s&&x.push(h))}if(v+=b,r&&b!==v){g=0;while(m=t[g++])m(x,y,l,c);if(s){if(v>0)while(b--)x[b]||y[b]||(y[b]=q.call(p));y=xt(y)}M.apply(p,y),w&&!s&&y.length>0&&v+t.length>1&&at.uniqueSort(p)}return w&&(T=k,u=C),x};return r?lt(s):s}l=at.compile=function(e,t){var n,r=[],i=[],o=E[e+" "];if(!o){t||(t=mt(e)),n=t.length;while(n--)o=Tt(t[n]),o[b]?r.push(o):i.push(o);o=E(e,Ct(i,r))}return o};function Nt(e,t,n){var r=0,i=t.length;for(;i>r;r++)at(e,t[r],n);return n}function kt(e,t,n,i){var a,s,u,c,p,f=mt(e);if(!i&&1===f.length){if(s=f[0]=f[0].slice(0),s.length>2&&"ID"===(u=s[0]).type&&r.getById&&9===t.nodeType&&h&&o.relative[s[1].type]){if(t=(o.find.ID(u.matches[0].replace(rt,it),t)||[])[0],!t)return n;e=e.slice(s.shift().value.length)}a=Q.needsContext.test(e)?0:s.length;while(a--){if(u=s[a],o.relative[c=u.type])break;if((p=o.find[c])&&(i=p(u.matches[0].replace(rt,it),V.test(s[0].type)&&t.parentNode||t))){if(s.splice(a,1),e=i.length&&yt(s),!e)return M.apply(n,i),n;break}}}return l(e,f)(i,t,!h,n,V.test(e)),n}r.sortStable=b.split("").sort(A).join("")===b,r.detectDuplicates=S,p(),r.sortDetached=ut(function(e){return 1&e.compareDocumentPosition(f.createElement("div"))}),ut(function(e){return e.innerHTML="<a href='#'></a>","#"===e.firstChild.getAttribute("href")})||ct("type|href|height|width",function(e,n,r){return r?t:e.getAttribute(n,"type"===n.toLowerCase()?1:2)}),r.attributes&&ut(function(e){return e.innerHTML="<input/>",e.firstChild.setAttribute("value",""),""===e.firstChild.getAttribute("value")})||ct("value",function(e,n,r){return r||"input"!==e.nodeName.toLowerCase()?t:e.defaultValue}),ut(function(e){return null==e.getAttribute("disabled")})||ct(B,function(e,n,r){var i;return r?t:(i=e.getAttributeNode(n))&&i.specified?i.value:e[n]===!0?n.toLowerCase():null}),x.find=at,x.expr=at.selectors,x.expr[":"]=x.expr.pseudos,x.unique=at.uniqueSort,x.text=at.getText,x.isXMLDoc=at.isXML,x.contains=at.contains}(e);var O={};function F(e){var t=O[e]={};return x.each(e.match(T)||[],function(e,n){t[n]=!0}),t}x.Callbacks=function(e){e="string"==typeof e?O[e]||F(e):x.extend({},e);var n,r,i,o,a,s,l=[],u=!e.once&&[],c=function(t){for(r=e.memory&&t,i=!0,a=s||0,s=0,o=l.length,n=!0;l&&o>a;a++)if(l[a].apply(t[0],t[1])===!1&&e.stopOnFalse){r=!1;break}n=!1,l&&(u?u.length&&c(u.shift()):r?l=[]:p.disable())},p={add:function(){if(l){var t=l.length;(function i(t){x.each(t,function(t,n){var r=x.type(n);"function"===r?e.unique&&p.has(n)||l.push(n):n&&n.length&&"string"!==r&&i(n)})})(arguments),n?o=l.length:r&&(s=t,c(r))}return this},remove:function(){return l&&x.each(arguments,function(e,t){var r;while((r=x.inArray(t,l,r))>-1)l.splice(r,1),n&&(o>=r&&o--,a>=r&&a--)}),this},has:function(e){return e?x.inArray(e,l)>-1:!(!l||!l.length)},empty:function(){return l=[],o=0,this},disable:function(){return l=u=r=t,this},disabled:function(){return!l},lock:function(){return u=t,r||p.disable(),this},locked:function(){return!u},fireWith:function(e,t){return!l||i&&!u||(t=t||[],t=[e,t.slice?t.slice():t],n?u.push(t):c(t)),this},fire:function(){return p.fireWith(this,arguments),this},fired:function(){return!!i}};return p},x.extend({Deferred:function(e){var t=[["resolve","done",x.Callbacks("once memory"),"resolved"],["reject","fail",x.Callbacks("once memory"),"rejected"],["notify","progress",x.Callbacks("memory")]],n="pending",r={state:function(){return n},always:function(){return i.done(arguments).fail(arguments),this},then:function(){var e=arguments;return x.Deferred(function(n){x.each(t,function(t,o){var a=o[0],s=x.isFunction(e[t])&&e[t];i[o[1]](function(){var e=s&&s.apply(this,arguments);e&&x.isFunction(e.promise)?e.promise().done(n.resolve).fail(n.reject).progress(n.notify):n[a+"With"](this===r?n.promise():this,s?[e]:arguments)})}),e=null}).promise()},promise:function(e){return null!=e?x.extend(e,r):r}},i={};return r.pipe=r.then,x.each(t,function(e,o){var a=o[2],s=o[3];r[o[1]]=a.add,s&&a.add(function(){n=s},t[1^e][2].disable,t[2][2].lock),i[o[0]]=function(){return i[o[0]+"With"](this===i?r:this,arguments),this},i[o[0]+"With"]=a.fireWith}),r.promise(i),e&&e.call(i,i),i},when:function(e){var t=0,n=g.call(arguments),r=n.length,i=1!==r||e&&x.isFunction(e.promise)?r:0,o=1===i?e:x.Deferred(),a=function(e,t,n){return function(r){t[e]=this,n[e]=arguments.length>1?g.call(arguments):r,n===s?o.notifyWith(t,n):--i||o.resolveWith(t,n)}},s,l,u;if(r>1)for(s=Array(r),l=Array(r),u=Array(r);r>t;t++)n[t]&&x.isFunction(n[t].promise)?n[t].promise().done(a(t,u,n)).fail(o.reject).progress(a(t,l,s)):--i;return i||o.resolveWith(u,n),o.promise()}}),x.support=function(t){var n,r,o,s,l,u,c,p,f,d=a.createElement("div");if(d.setAttribute("className","t"),d.innerHTML="  <link/><table></table><a href='/a'>a</a><input type='checkbox'/>",n=d.getElementsByTagName("*")||[],r=d.getElementsByTagName("a")[0],!r||!r.style||!n.length)return t;s=a.createElement("select"),u=s.appendChild(a.createElement("option")),o=d.getElementsByTagName("input")[0],r.style.cssText="top:1px;float:left;opacity:.5",t.getSetAttribute="t"!==d.className,t.leadingWhitespace=3===d.firstChild.nodeType,t.tbody=!d.getElementsByTagName("tbody").length,t.htmlSerialize=!!d.getElementsByTagName("link").length,t.style=/top/.test(r.getAttribute("style")),t.hrefNormalized="/a"===r.getAttribute("href"),t.opacity=/^0.5/.test(r.style.opacity),t.cssFloat=!!r.style.cssFloat,t.checkOn=!!o.value,t.optSelected=u.selected,t.enctype=!!a.createElement("form").enctype,t.html5Clone="<:nav></:nav>"!==a.createElement("nav").cloneNode(!0).outerHTML,t.inlineBlockNeedsLayout=!1,t.shrinkWrapBlocks=!1,t.pixelPosition=!1,t.deleteExpando=!0,t.noCloneEvent=!0,t.reliableMarginRight=!0,t.boxSizingReliable=!0,o.checked=!0,t.noCloneChecked=o.cloneNode(!0).checked,s.disabled=!0,t.optDisabled=!u.disabled;try{delete d.test}catch(h){t.deleteExpando=!1}o=a.createElement("input"),o.setAttribute("value",""),t.input=""===o.getAttribute("value"),o.value="t",o.setAttribute("type","radio"),t.radioValue="t"===o.value,o.setAttribute("checked","t"),o.setAttribute("name","t"),l=a.createDocumentFragment(),l.appendChild(o),t.appendChecked=o.checked,t.checkClone=l.cloneNode(!0).cloneNode(!0).lastChild.checked,d.attachEvent&&(d.attachEvent("onclick",function(){t.noCloneEvent=!1}),d.cloneNode(!0).click());for(f in{submit:!0,change:!0,focusin:!0})d.setAttribute(c="on"+f,"t"),t[f+"Bubbles"]=c in e||d.attributes[c].expando===!1;d.style.backgroundClip="content-box",d.cloneNode(!0).style.backgroundClip="",t.clearCloneStyle="content-box"===d.style.backgroundClip;for(f in x(t))break;return t.ownLast="0"!==f,x(function(){var n,r,o,s="padding:0;margin:0;border:0;display:block;box-sizing:content-box;-moz-box-sizing:content-box;-webkit-box-sizing:content-box;",l=a.getElementsByTagName("body")[0];l&&(n=a.createElement("div"),n.style.cssText="border:0;width:0;height:0;position:absolute;top:0;left:-9999px;margin-top:1px",l.appendChild(n).appendChild(d),d.innerHTML="<table><tr><td></td><td>t</td></tr></table>",o=d.getElementsByTagName("td"),o[0].style.cssText="padding:0;margin:0;border:0;display:none",p=0===o[0].offsetHeight,o[0].style.display="",o[1].style.display="none",t.reliableHiddenOffsets=p&&0===o[0].offsetHeight,d.innerHTML="",d.style.cssText="box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;padding:1px;border:1px;display:block;width:4px;margin-top:1%;position:absolute;top:1%;",x.swap(l,null!=l.style.zoom?{zoom:1}:{},function(){t.boxSizing=4===d.offsetWidth}),e.getComputedStyle&&(t.pixelPosition="1%"!==(e.getComputedStyle(d,null)||{}).top,t.boxSizingReliable="4px"===(e.getComputedStyle(d,null)||{width:"4px"}).width,r=d.appendChild(a.createElement("div")),r.style.cssText=d.style.cssText=s,r.style.marginRight=r.style.width="0",d.style.width="1px",t.reliableMarginRight=!parseFloat((e.getComputedStyle(r,null)||{}).marginRight)),typeof d.style.zoom!==i&&(d.innerHTML="",d.style.cssText=s+"width:1px;padding:1px;display:inline;zoom:1",t.inlineBlockNeedsLayout=3===d.offsetWidth,d.style.display="block",d.innerHTML="<div></div>",d.firstChild.style.width="5px",t.shrinkWrapBlocks=3!==d.offsetWidth,t.inlineBlockNeedsLayout&&(l.style.zoom=1)),l.removeChild(n),n=d=o=r=null)}),n=s=l=u=r=o=null,t
}({});var B=/(?:\{[\s\S]*\}|\[[\s\S]*\])$/,P=/([A-Z])/g;function R(e,n,r,i){if(x.acceptData(e)){var o,a,s=x.expando,l=e.nodeType,u=l?x.cache:e,c=l?e[s]:e[s]&&s;if(c&&u[c]&&(i||u[c].data)||r!==t||"string"!=typeof n)return c||(c=l?e[s]=p.pop()||x.guid++:s),u[c]||(u[c]=l?{}:{toJSON:x.noop}),("object"==typeof n||"function"==typeof n)&&(i?u[c]=x.extend(u[c],n):u[c].data=x.extend(u[c].data,n)),a=u[c],i||(a.data||(a.data={}),a=a.data),r!==t&&(a[x.camelCase(n)]=r),"string"==typeof n?(o=a[n],null==o&&(o=a[x.camelCase(n)])):o=a,o}}function W(e,t,n){if(x.acceptData(e)){var r,i,o=e.nodeType,a=o?x.cache:e,s=o?e[x.expando]:x.expando;if(a[s]){if(t&&(r=n?a[s]:a[s].data)){x.isArray(t)?t=t.concat(x.map(t,x.camelCase)):t in r?t=[t]:(t=x.camelCase(t),t=t in r?[t]:t.split(" ")),i=t.length;while(i--)delete r[t[i]];if(n?!I(r):!x.isEmptyObject(r))return}(n||(delete a[s].data,I(a[s])))&&(o?x.cleanData([e],!0):x.support.deleteExpando||a!=a.window?delete a[s]:a[s]=null)}}}x.extend({cache:{},noData:{applet:!0,embed:!0,object:"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000"},hasData:function(e){return e=e.nodeType?x.cache[e[x.expando]]:e[x.expando],!!e&&!I(e)},data:function(e,t,n){return R(e,t,n)},removeData:function(e,t){return W(e,t)},_data:function(e,t,n){return R(e,t,n,!0)},_removeData:function(e,t){return W(e,t,!0)},acceptData:function(e){if(e.nodeType&&1!==e.nodeType&&9!==e.nodeType)return!1;var t=e.nodeName&&x.noData[e.nodeName.toLowerCase()];return!t||t!==!0&&e.getAttribute("classid")===t}}),x.fn.extend({data:function(e,n){var r,i,o=null,a=0,s=this[0];if(e===t){if(this.length&&(o=x.data(s),1===s.nodeType&&!x._data(s,"parsedAttrs"))){for(r=s.attributes;r.length>a;a++)i=r[a].name,0===i.indexOf("data-")&&(i=x.camelCase(i.slice(5)),$(s,i,o[i]));x._data(s,"parsedAttrs",!0)}return o}return"object"==typeof e?this.each(function(){x.data(this,e)}):arguments.length>1?this.each(function(){x.data(this,e,n)}):s?$(s,e,x.data(s,e)):null},removeData:function(e){return this.each(function(){x.removeData(this,e)})}});function $(e,n,r){if(r===t&&1===e.nodeType){var i="data-"+n.replace(P,"-$1").toLowerCase();if(r=e.getAttribute(i),"string"==typeof r){try{r="true"===r?!0:"false"===r?!1:"null"===r?null:+r+""===r?+r:B.test(r)?x.parseJSON(r):r}catch(o){}x.data(e,n,r)}else r=t}return r}function I(e){var t;for(t in e)if(("data"!==t||!x.isEmptyObject(e[t]))&&"toJSON"!==t)return!1;return!0}x.extend({queue:function(e,n,r){var i;return e?(n=(n||"fx")+"queue",i=x._data(e,n),r&&(!i||x.isArray(r)?i=x._data(e,n,x.makeArray(r)):i.push(r)),i||[]):t},dequeue:function(e,t){t=t||"fx";var n=x.queue(e,t),r=n.length,i=n.shift(),o=x._queueHooks(e,t),a=function(){x.dequeue(e,t)};"inprogress"===i&&(i=n.shift(),r--),i&&("fx"===t&&n.unshift("inprogress"),delete o.stop,i.call(e,a,o)),!r&&o&&o.empty.fire()},_queueHooks:function(e,t){var n=t+"queueHooks";return x._data(e,n)||x._data(e,n,{empty:x.Callbacks("once memory").add(function(){x._removeData(e,t+"queue"),x._removeData(e,n)})})}}),x.fn.extend({queue:function(e,n){var r=2;return"string"!=typeof e&&(n=e,e="fx",r--),r>arguments.length?x.queue(this[0],e):n===t?this:this.each(function(){var t=x.queue(this,e,n);x._queueHooks(this,e),"fx"===e&&"inprogress"!==t[0]&&x.dequeue(this,e)})},dequeue:function(e){return this.each(function(){x.dequeue(this,e)})},delay:function(e,t){return e=x.fx?x.fx.speeds[e]||e:e,t=t||"fx",this.queue(t,function(t,n){var r=setTimeout(t,e);n.stop=function(){clearTimeout(r)}})},clearQueue:function(e){return this.queue(e||"fx",[])},promise:function(e,n){var r,i=1,o=x.Deferred(),a=this,s=this.length,l=function(){--i||o.resolveWith(a,[a])};"string"!=typeof e&&(n=e,e=t),e=e||"fx";while(s--)r=x._data(a[s],e+"queueHooks"),r&&r.empty&&(i++,r.empty.add(l));return l(),o.promise(n)}});var z,X,U=/[\t\r\n\f]/g,V=/\r/g,Y=/^(?:input|select|textarea|button|object)$/i,J=/^(?:a|area)$/i,G=/^(?:checked|selected)$/i,Q=x.support.getSetAttribute,K=x.support.input;x.fn.extend({attr:function(e,t){return x.access(this,x.attr,e,t,arguments.length>1)},removeAttr:function(e){return this.each(function(){x.removeAttr(this,e)})},prop:function(e,t){return x.access(this,x.prop,e,t,arguments.length>1)},removeProp:function(e){return e=x.propFix[e]||e,this.each(function(){try{this[e]=t,delete this[e]}catch(n){}})},addClass:function(e){var t,n,r,i,o,a=0,s=this.length,l="string"==typeof e&&e;if(x.isFunction(e))return this.each(function(t){x(this).addClass(e.call(this,t,this.className))});if(l)for(t=(e||"").match(T)||[];s>a;a++)if(n=this[a],r=1===n.nodeType&&(n.className?(" "+n.className+" ").replace(U," "):" ")){o=0;while(i=t[o++])0>r.indexOf(" "+i+" ")&&(r+=i+" ");n.className=x.trim(r)}return this},removeClass:function(e){var t,n,r,i,o,a=0,s=this.length,l=0===arguments.length||"string"==typeof e&&e;if(x.isFunction(e))return this.each(function(t){x(this).removeClass(e.call(this,t,this.className))});if(l)for(t=(e||"").match(T)||[];s>a;a++)if(n=this[a],r=1===n.nodeType&&(n.className?(" "+n.className+" ").replace(U," "):"")){o=0;while(i=t[o++])while(r.indexOf(" "+i+" ")>=0)r=r.replace(" "+i+" "," ");n.className=e?x.trim(r):""}return this},toggleClass:function(e,t){var n=typeof e;return"boolean"==typeof t&&"string"===n?t?this.addClass(e):this.removeClass(e):x.isFunction(e)?this.each(function(n){x(this).toggleClass(e.call(this,n,this.className,t),t)}):this.each(function(){if("string"===n){var t,r=0,o=x(this),a=e.match(T)||[];while(t=a[r++])o.hasClass(t)?o.removeClass(t):o.addClass(t)}else(n===i||"boolean"===n)&&(this.className&&x._data(this,"__className__",this.className),this.className=this.className||e===!1?"":x._data(this,"__className__")||"")})},hasClass:function(e){var t=" "+e+" ",n=0,r=this.length;for(;r>n;n++)if(1===this[n].nodeType&&(" "+this[n].className+" ").replace(U," ").indexOf(t)>=0)return!0;return!1},val:function(e){var n,r,i,o=this[0];{if(arguments.length)return i=x.isFunction(e),this.each(function(n){var o;1===this.nodeType&&(o=i?e.call(this,n,x(this).val()):e,null==o?o="":"number"==typeof o?o+="":x.isArray(o)&&(o=x.map(o,function(e){return null==e?"":e+""})),r=x.valHooks[this.type]||x.valHooks[this.nodeName.toLowerCase()],r&&"set"in r&&r.set(this,o,"value")!==t||(this.value=o))});if(o)return r=x.valHooks[o.type]||x.valHooks[o.nodeName.toLowerCase()],r&&"get"in r&&(n=r.get(o,"value"))!==t?n:(n=o.value,"string"==typeof n?n.replace(V,""):null==n?"":n)}}}),x.extend({valHooks:{option:{get:function(e){var t=x.find.attr(e,"value");return null!=t?t:e.text}},select:{get:function(e){var t,n,r=e.options,i=e.selectedIndex,o="select-one"===e.type||0>i,a=o?null:[],s=o?i+1:r.length,l=0>i?s:o?i:0;for(;s>l;l++)if(n=r[l],!(!n.selected&&l!==i||(x.support.optDisabled?n.disabled:null!==n.getAttribute("disabled"))||n.parentNode.disabled&&x.nodeName(n.parentNode,"optgroup"))){if(t=x(n).val(),o)return t;a.push(t)}return a},set:function(e,t){var n,r,i=e.options,o=x.makeArray(t),a=i.length;while(a--)r=i[a],(r.selected=x.inArray(x(r).val(),o)>=0)&&(n=!0);return n||(e.selectedIndex=-1),o}}},attr:function(e,n,r){var o,a,s=e.nodeType;if(e&&3!==s&&8!==s&&2!==s)return typeof e.getAttribute===i?x.prop(e,n,r):(1===s&&x.isXMLDoc(e)||(n=n.toLowerCase(),o=x.attrHooks[n]||(x.expr.match.bool.test(n)?X:z)),r===t?o&&"get"in o&&null!==(a=o.get(e,n))?a:(a=x.find.attr(e,n),null==a?t:a):null!==r?o&&"set"in o&&(a=o.set(e,r,n))!==t?a:(e.setAttribute(n,r+""),r):(x.removeAttr(e,n),t))},removeAttr:function(e,t){var n,r,i=0,o=t&&t.match(T);if(o&&1===e.nodeType)while(n=o[i++])r=x.propFix[n]||n,x.expr.match.bool.test(n)?K&&Q||!G.test(n)?e[r]=!1:e[x.camelCase("default-"+n)]=e[r]=!1:x.attr(e,n,""),e.removeAttribute(Q?n:r)},attrHooks:{type:{set:function(e,t){if(!x.support.radioValue&&"radio"===t&&x.nodeName(e,"input")){var n=e.value;return e.setAttribute("type",t),n&&(e.value=n),t}}}},propFix:{"for":"htmlFor","class":"className"},prop:function(e,n,r){var i,o,a,s=e.nodeType;if(e&&3!==s&&8!==s&&2!==s)return a=1!==s||!x.isXMLDoc(e),a&&(n=x.propFix[n]||n,o=x.propHooks[n]),r!==t?o&&"set"in o&&(i=o.set(e,r,n))!==t?i:e[n]=r:o&&"get"in o&&null!==(i=o.get(e,n))?i:e[n]},propHooks:{tabIndex:{get:function(e){var t=x.find.attr(e,"tabindex");return t?parseInt(t,10):Y.test(e.nodeName)||J.test(e.nodeName)&&e.href?0:-1}}}}),X={set:function(e,t,n){return t===!1?x.removeAttr(e,n):K&&Q||!G.test(n)?e.setAttribute(!Q&&x.propFix[n]||n,n):e[x.camelCase("default-"+n)]=e[n]=!0,n}},x.each(x.expr.match.bool.source.match(/\w+/g),function(e,n){var r=x.expr.attrHandle[n]||x.find.attr;x.expr.attrHandle[n]=K&&Q||!G.test(n)?function(e,n,i){var o=x.expr.attrHandle[n],a=i?t:(x.expr.attrHandle[n]=t)!=r(e,n,i)?n.toLowerCase():null;return x.expr.attrHandle[n]=o,a}:function(e,n,r){return r?t:e[x.camelCase("default-"+n)]?n.toLowerCase():null}}),K&&Q||(x.attrHooks.value={set:function(e,n,r){return x.nodeName(e,"input")?(e.defaultValue=n,t):z&&z.set(e,n,r)}}),Q||(z={set:function(e,n,r){var i=e.getAttributeNode(r);return i||e.setAttributeNode(i=e.ownerDocument.createAttribute(r)),i.value=n+="","value"===r||n===e.getAttribute(r)?n:t}},x.expr.attrHandle.id=x.expr.attrHandle.name=x.expr.attrHandle.coords=function(e,n,r){var i;return r?t:(i=e.getAttributeNode(n))&&""!==i.value?i.value:null},x.valHooks.button={get:function(e,n){var r=e.getAttributeNode(n);return r&&r.specified?r.value:t},set:z.set},x.attrHooks.contenteditable={set:function(e,t,n){z.set(e,""===t?!1:t,n)}},x.each(["width","height"],function(e,n){x.attrHooks[n]={set:function(e,r){return""===r?(e.setAttribute(n,"auto"),r):t}}})),x.support.hrefNormalized||x.each(["href","src"],function(e,t){x.propHooks[t]={get:function(e){return e.getAttribute(t,4)}}}),x.support.style||(x.attrHooks.style={get:function(e){return e.style.cssText||t},set:function(e,t){return e.style.cssText=t+""}}),x.support.optSelected||(x.propHooks.selected={get:function(e){var t=e.parentNode;return t&&(t.selectedIndex,t.parentNode&&t.parentNode.selectedIndex),null}}),x.each(["tabIndex","readOnly","maxLength","cellSpacing","cellPadding","rowSpan","colSpan","useMap","frameBorder","contentEditable"],function(){x.propFix[this.toLowerCase()]=this}),x.support.enctype||(x.propFix.enctype="encoding"),x.each(["radio","checkbox"],function(){x.valHooks[this]={set:function(e,n){return x.isArray(n)?e.checked=x.inArray(x(e).val(),n)>=0:t}},x.support.checkOn||(x.valHooks[this].get=function(e){return null===e.getAttribute("value")?"on":e.value})});var Z=/^(?:input|select|textarea)$/i,et=/^key/,tt=/^(?:mouse|contextmenu)|click/,nt=/^(?:focusinfocus|focusoutblur)$/,rt=/^([^.]*)(?:\.(.+)|)$/;function it(){return!0}function ot(){return!1}function at(){try{return a.activeElement}catch(e){}}x.event={global:{},add:function(e,n,r,o,a){var s,l,u,c,p,f,d,h,g,m,y,v=x._data(e);if(v){r.handler&&(c=r,r=c.handler,a=c.selector),r.guid||(r.guid=x.guid++),(l=v.events)||(l=v.events={}),(f=v.handle)||(f=v.handle=function(e){return typeof x===i||e&&x.event.triggered===e.type?t:x.event.dispatch.apply(f.elem,arguments)},f.elem=e),n=(n||"").match(T)||[""],u=n.length;while(u--)s=rt.exec(n[u])||[],g=y=s[1],m=(s[2]||"").split(".").sort(),g&&(p=x.event.special[g]||{},g=(a?p.delegateType:p.bindType)||g,p=x.event.special[g]||{},d=x.extend({type:g,origType:y,data:o,handler:r,guid:r.guid,selector:a,needsContext:a&&x.expr.match.needsContext.test(a),namespace:m.join(".")},c),(h=l[g])||(h=l[g]=[],h.delegateCount=0,p.setup&&p.setup.call(e,o,m,f)!==!1||(e.addEventListener?e.addEventListener(g,f,!1):e.attachEvent&&e.attachEvent("on"+g,f))),p.add&&(p.add.call(e,d),d.handler.guid||(d.handler.guid=r.guid)),a?h.splice(h.delegateCount++,0,d):h.push(d),x.event.global[g]=!0);e=null}},remove:function(e,t,n,r,i){var o,a,s,l,u,c,p,f,d,h,g,m=x.hasData(e)&&x._data(e);if(m&&(c=m.events)){t=(t||"").match(T)||[""],u=t.length;while(u--)if(s=rt.exec(t[u])||[],d=g=s[1],h=(s[2]||"").split(".").sort(),d){p=x.event.special[d]||{},d=(r?p.delegateType:p.bindType)||d,f=c[d]||[],s=s[2]&&RegExp("(^|\\.)"+h.join("\\.(?:.*\\.|)")+"(\\.|$)"),l=o=f.length;while(o--)a=f[o],!i&&g!==a.origType||n&&n.guid!==a.guid||s&&!s.test(a.namespace)||r&&r!==a.selector&&("**"!==r||!a.selector)||(f.splice(o,1),a.selector&&f.delegateCount--,p.remove&&p.remove.call(e,a));l&&!f.length&&(p.teardown&&p.teardown.call(e,h,m.handle)!==!1||x.removeEvent(e,d,m.handle),delete c[d])}else for(d in c)x.event.remove(e,d+t[u],n,r,!0);x.isEmptyObject(c)&&(delete m.handle,x._removeData(e,"events"))}},trigger:function(n,r,i,o){var s,l,u,c,p,f,d,h=[i||a],g=v.call(n,"type")?n.type:n,m=v.call(n,"namespace")?n.namespace.split("."):[];if(u=f=i=i||a,3!==i.nodeType&&8!==i.nodeType&&!nt.test(g+x.event.triggered)&&(g.indexOf(".")>=0&&(m=g.split("."),g=m.shift(),m.sort()),l=0>g.indexOf(":")&&"on"+g,n=n[x.expando]?n:new x.Event(g,"object"==typeof n&&n),n.isTrigger=o?2:3,n.namespace=m.join("."),n.namespace_re=n.namespace?RegExp("(^|\\.)"+m.join("\\.(?:.*\\.|)")+"(\\.|$)"):null,n.result=t,n.target||(n.target=i),r=null==r?[n]:x.makeArray(r,[n]),p=x.event.special[g]||{},o||!p.trigger||p.trigger.apply(i,r)!==!1)){if(!o&&!p.noBubble&&!x.isWindow(i)){for(c=p.delegateType||g,nt.test(c+g)||(u=u.parentNode);u;u=u.parentNode)h.push(u),f=u;f===(i.ownerDocument||a)&&h.push(f.defaultView||f.parentWindow||e)}d=0;while((u=h[d++])&&!n.isPropagationStopped())n.type=d>1?c:p.bindType||g,s=(x._data(u,"events")||{})[n.type]&&x._data(u,"handle"),s&&s.apply(u,r),s=l&&u[l],s&&x.acceptData(u)&&s.apply&&s.apply(u,r)===!1&&n.preventDefault();if(n.type=g,!o&&!n.isDefaultPrevented()&&(!p._default||p._default.apply(h.pop(),r)===!1)&&x.acceptData(i)&&l&&i[g]&&!x.isWindow(i)){f=i[l],f&&(i[l]=null),x.event.triggered=g;try{i[g]()}catch(y){}x.event.triggered=t,f&&(i[l]=f)}return n.result}},dispatch:function(e){e=x.event.fix(e);var n,r,i,o,a,s=[],l=g.call(arguments),u=(x._data(this,"events")||{})[e.type]||[],c=x.event.special[e.type]||{};if(l[0]=e,e.delegateTarget=this,!c.preDispatch||c.preDispatch.call(this,e)!==!1){s=x.event.handlers.call(this,e,u),n=0;while((o=s[n++])&&!e.isPropagationStopped()){e.currentTarget=o.elem,a=0;while((i=o.handlers[a++])&&!e.isImmediatePropagationStopped())(!e.namespace_re||e.namespace_re.test(i.namespace))&&(e.handleObj=i,e.data=i.data,r=((x.event.special[i.origType]||{}).handle||i.handler).apply(o.elem,l),r!==t&&(e.result=r)===!1&&(e.preventDefault(),e.stopPropagation()))}return c.postDispatch&&c.postDispatch.call(this,e),e.result}},handlers:function(e,n){var r,i,o,a,s=[],l=n.delegateCount,u=e.target;if(l&&u.nodeType&&(!e.button||"click"!==e.type))for(;u!=this;u=u.parentNode||this)if(1===u.nodeType&&(u.disabled!==!0||"click"!==e.type)){for(o=[],a=0;l>a;a++)i=n[a],r=i.selector+" ",o[r]===t&&(o[r]=i.needsContext?x(r,this).index(u)>=0:x.find(r,this,null,[u]).length),o[r]&&o.push(i);o.length&&s.push({elem:u,handlers:o})}return n.length>l&&s.push({elem:this,handlers:n.slice(l)}),s},fix:function(e){if(e[x.expando])return e;var t,n,r,i=e.type,o=e,s=this.fixHooks[i];s||(this.fixHooks[i]=s=tt.test(i)?this.mouseHooks:et.test(i)?this.keyHooks:{}),r=s.props?this.props.concat(s.props):this.props,e=new x.Event(o),t=r.length;while(t--)n=r[t],e[n]=o[n];return e.target||(e.target=o.srcElement||a),3===e.target.nodeType&&(e.target=e.target.parentNode),e.metaKey=!!e.metaKey,s.filter?s.filter(e,o):e},props:"altKey bubbles cancelable ctrlKey currentTarget eventPhase metaKey relatedTarget shiftKey target timeStamp view which".split(" "),fixHooks:{},keyHooks:{props:"char charCode key keyCode".split(" "),filter:function(e,t){return null==e.which&&(e.which=null!=t.charCode?t.charCode:t.keyCode),e}},mouseHooks:{props:"button buttons clientX clientY fromElement offsetX offsetY pageX pageY screenX screenY toElement".split(" "),filter:function(e,n){var r,i,o,s=n.button,l=n.fromElement;return null==e.pageX&&null!=n.clientX&&(i=e.target.ownerDocument||a,o=i.documentElement,r=i.body,e.pageX=n.clientX+(o&&o.scrollLeft||r&&r.scrollLeft||0)-(o&&o.clientLeft||r&&r.clientLeft||0),e.pageY=n.clientY+(o&&o.scrollTop||r&&r.scrollTop||0)-(o&&o.clientTop||r&&r.clientTop||0)),!e.relatedTarget&&l&&(e.relatedTarget=l===e.target?n.toElement:l),e.which||s===t||(e.which=1&s?1:2&s?3:4&s?2:0),e}},special:{load:{noBubble:!0},focus:{trigger:function(){if(this!==at()&&this.focus)try{return this.focus(),!1}catch(e){}},delegateType:"focusin"},blur:{trigger:function(){return this===at()&&this.blur?(this.blur(),!1):t},delegateType:"focusout"},click:{trigger:function(){return x.nodeName(this,"input")&&"checkbox"===this.type&&this.click?(this.click(),!1):t},_default:function(e){return x.nodeName(e.target,"a")}},beforeunload:{postDispatch:function(e){e.result!==t&&(e.originalEvent.returnValue=e.result)}}},simulate:function(e,t,n,r){var i=x.extend(new x.Event,n,{type:e,isSimulated:!0,originalEvent:{}});r?x.event.trigger(i,null,t):x.event.dispatch.call(t,i),i.isDefaultPrevented()&&n.preventDefault()}},x.removeEvent=a.removeEventListener?function(e,t,n){e.removeEventListener&&e.removeEventListener(t,n,!1)}:function(e,t,n){var r="on"+t;e.detachEvent&&(typeof e[r]===i&&(e[r]=null),e.detachEvent(r,n))},x.Event=function(e,n){return this instanceof x.Event?(e&&e.type?(this.originalEvent=e,this.type=e.type,this.isDefaultPrevented=e.defaultPrevented||e.returnValue===!1||e.getPreventDefault&&e.getPreventDefault()?it:ot):this.type=e,n&&x.extend(this,n),this.timeStamp=e&&e.timeStamp||x.now(),this[x.expando]=!0,t):new x.Event(e,n)},x.Event.prototype={isDefaultPrevented:ot,isPropagationStopped:ot,isImmediatePropagationStopped:ot,preventDefault:function(){var e=this.originalEvent;this.isDefaultPrevented=it,e&&(e.preventDefault?e.preventDefault():e.returnValue=!1)},stopPropagation:function(){var e=this.originalEvent;this.isPropagationStopped=it,e&&(e.stopPropagation&&e.stopPropagation(),e.cancelBubble=!0)},stopImmediatePropagation:function(){this.isImmediatePropagationStopped=it,this.stopPropagation()}},x.each({mouseenter:"mouseover",mouseleave:"mouseout"},function(e,t){x.event.special[e]={delegateType:t,bindType:t,handle:function(e){var n,r=this,i=e.relatedTarget,o=e.handleObj;return(!i||i!==r&&!x.contains(r,i))&&(e.type=o.origType,n=o.handler.apply(this,arguments),e.type=t),n}}}),x.support.submitBubbles||(x.event.special.submit={setup:function(){return x.nodeName(this,"form")?!1:(x.event.add(this,"click._submit keypress._submit",function(e){var n=e.target,r=x.nodeName(n,"input")||x.nodeName(n,"button")?n.form:t;r&&!x._data(r,"submitBubbles")&&(x.event.add(r,"submit._submit",function(e){e._submit_bubble=!0}),x._data(r,"submitBubbles",!0))}),t)},postDispatch:function(e){e._submit_bubble&&(delete e._submit_bubble,this.parentNode&&!e.isTrigger&&x.event.simulate("submit",this.parentNode,e,!0))},teardown:function(){return x.nodeName(this,"form")?!1:(x.event.remove(this,"._submit"),t)}}),x.support.changeBubbles||(x.event.special.change={setup:function(){return Z.test(this.nodeName)?(("checkbox"===this.type||"radio"===this.type)&&(x.event.add(this,"propertychange._change",function(e){"checked"===e.originalEvent.propertyName&&(this._just_changed=!0)}),x.event.add(this,"click._change",function(e){this._just_changed&&!e.isTrigger&&(this._just_changed=!1),x.event.simulate("change",this,e,!0)})),!1):(x.event.add(this,"beforeactivate._change",function(e){var t=e.target;Z.test(t.nodeName)&&!x._data(t,"changeBubbles")&&(x.event.add(t,"change._change",function(e){!this.parentNode||e.isSimulated||e.isTrigger||x.event.simulate("change",this.parentNode,e,!0)}),x._data(t,"changeBubbles",!0))}),t)},handle:function(e){var n=e.target;return this!==n||e.isSimulated||e.isTrigger||"radio"!==n.type&&"checkbox"!==n.type?e.handleObj.handler.apply(this,arguments):t},teardown:function(){return x.event.remove(this,"._change"),!Z.test(this.nodeName)}}),x.support.focusinBubbles||x.each({focus:"focusin",blur:"focusout"},function(e,t){var n=0,r=function(e){x.event.simulate(t,e.target,x.event.fix(e),!0)};x.event.special[t]={setup:function(){0===n++&&a.addEventListener(e,r,!0)},teardown:function(){0===--n&&a.removeEventListener(e,r,!0)}}}),x.fn.extend({on:function(e,n,r,i,o){var a,s;if("object"==typeof e){"string"!=typeof n&&(r=r||n,n=t);for(a in e)this.on(a,n,r,e[a],o);return this}if(null==r&&null==i?(i=n,r=n=t):null==i&&("string"==typeof n?(i=r,r=t):(i=r,r=n,n=t)),i===!1)i=ot;else if(!i)return this;return 1===o&&(s=i,i=function(e){return x().off(e),s.apply(this,arguments)},i.guid=s.guid||(s.guid=x.guid++)),this.each(function(){x.event.add(this,e,i,r,n)})},one:function(e,t,n,r){return this.on(e,t,n,r,1)},off:function(e,n,r){var i,o;if(e&&e.preventDefault&&e.handleObj)return i=e.handleObj,x(e.delegateTarget).off(i.namespace?i.origType+"."+i.namespace:i.origType,i.selector,i.handler),this;if("object"==typeof e){for(o in e)this.off(o,n,e[o]);return this}return(n===!1||"function"==typeof n)&&(r=n,n=t),r===!1&&(r=ot),this.each(function(){x.event.remove(this,e,r,n)})},trigger:function(e,t){return this.each(function(){x.event.trigger(e,t,this)})},triggerHandler:function(e,n){var r=this[0];return r?x.event.trigger(e,n,r,!0):t}});var st=/^.[^:#\[\.,]*$/,lt=/^(?:parents|prev(?:Until|All))/,ut=x.expr.match.needsContext,ct={children:!0,contents:!0,next:!0,prev:!0};x.fn.extend({find:function(e){var t,n=[],r=this,i=r.length;if("string"!=typeof e)return this.pushStack(x(e).filter(function(){for(t=0;i>t;t++)if(x.contains(r[t],this))return!0}));for(t=0;i>t;t++)x.find(e,r[t],n);return n=this.pushStack(i>1?x.unique(n):n),n.selector=this.selector?this.selector+" "+e:e,n},has:function(e){var t,n=x(e,this),r=n.length;return this.filter(function(){for(t=0;r>t;t++)if(x.contains(this,n[t]))return!0})},not:function(e){return this.pushStack(ft(this,e||[],!0))},filter:function(e){return this.pushStack(ft(this,e||[],!1))},is:function(e){return!!ft(this,"string"==typeof e&&ut.test(e)?x(e):e||[],!1).length},closest:function(e,t){var n,r=0,i=this.length,o=[],a=ut.test(e)||"string"!=typeof e?x(e,t||this.context):0;for(;i>r;r++)for(n=this[r];n&&n!==t;n=n.parentNode)if(11>n.nodeType&&(a?a.index(n)>-1:1===n.nodeType&&x.find.matchesSelector(n,e))){n=o.push(n);break}return this.pushStack(o.length>1?x.unique(o):o)},index:function(e){return e?"string"==typeof e?x.inArray(this[0],x(e)):x.inArray(e.jquery?e[0]:e,this):this[0]&&this[0].parentNode?this.first().prevAll().length:-1},add:function(e,t){var n="string"==typeof e?x(e,t):x.makeArray(e&&e.nodeType?[e]:e),r=x.merge(this.get(),n);return this.pushStack(x.unique(r))},addBack:function(e){return this.add(null==e?this.prevObject:this.prevObject.filter(e))}});function pt(e,t){do e=e[t];while(e&&1!==e.nodeType);return e}x.each({parent:function(e){var t=e.parentNode;return t&&11!==t.nodeType?t:null},parents:function(e){return x.dir(e,"parentNode")},parentsUntil:function(e,t,n){return x.dir(e,"parentNode",n)},next:function(e){return pt(e,"nextSibling")},prev:function(e){return pt(e,"previousSibling")},nextAll:function(e){return x.dir(e,"nextSibling")},prevAll:function(e){return x.dir(e,"previousSibling")},nextUntil:function(e,t,n){return x.dir(e,"nextSibling",n)},prevUntil:function(e,t,n){return x.dir(e,"previousSibling",n)},siblings:function(e){return x.sibling((e.parentNode||{}).firstChild,e)},children:function(e){return x.sibling(e.firstChild)},contents:function(e){return x.nodeName(e,"iframe")?e.contentDocument||e.contentWindow.document:x.merge([],e.childNodes)}},function(e,t){x.fn[e]=function(n,r){var i=x.map(this,t,n);return"Until"!==e.slice(-5)&&(r=n),r&&"string"==typeof r&&(i=x.filter(r,i)),this.length>1&&(ct[e]||(i=x.unique(i)),lt.test(e)&&(i=i.reverse())),this.pushStack(i)}}),x.extend({filter:function(e,t,n){var r=t[0];return n&&(e=":not("+e+")"),1===t.length&&1===r.nodeType?x.find.matchesSelector(r,e)?[r]:[]:x.find.matches(e,x.grep(t,function(e){return 1===e.nodeType}))},dir:function(e,n,r){var i=[],o=e[n];while(o&&9!==o.nodeType&&(r===t||1!==o.nodeType||!x(o).is(r)))1===o.nodeType&&i.push(o),o=o[n];return i},sibling:function(e,t){var n=[];for(;e;e=e.nextSibling)1===e.nodeType&&e!==t&&n.push(e);return n}});function ft(e,t,n){if(x.isFunction(t))return x.grep(e,function(e,r){return!!t.call(e,r,e)!==n});if(t.nodeType)return x.grep(e,function(e){return e===t!==n});if("string"==typeof t){if(st.test(t))return x.filter(t,e,n);t=x.filter(t,e)}return x.grep(e,function(e){return x.inArray(e,t)>=0!==n})}function dt(e){var t=ht.split("|"),n=e.createDocumentFragment();if(n.createElement)while(t.length)n.createElement(t.pop());return n}var ht="abbr|article|aside|audio|bdi|canvas|data|datalist|details|figcaption|figure|footer|header|hgroup|mark|meter|nav|output|progress|section|summary|time|video",gt=/ jQuery\d+="(?:null|\d+)"/g,mt=RegExp("<(?:"+ht+")[\\s/>]","i"),yt=/^\s+/,vt=/<(?!area|br|col|embed|hr|img|input|link|meta|param)(([\w:]+)[^>]*)\/>/gi,bt=/<([\w:]+)/,xt=/<tbody/i,wt=/<|&#?\w+;/,Tt=/<(?:script|style|link)/i,Ct=/^(?:checkbox|radio)$/i,Nt=/checked\s*(?:[^=]|=\s*.checked.)/i,kt=/^$|\/(?:java|ecma)script/i,Et=/^true\/(.*)/,St=/^\s*<!(?:\[CDATA\[|--)|(?:\]\]|--)>\s*$/g,At={option:[1,"<select multiple='multiple'>","</select>"],legend:[1,"<fieldset>","</fieldset>"],area:[1,"<map>","</map>"],param:[1,"<object>","</object>"],thead:[1,"<table>","</table>"],tr:[2,"<table><tbody>","</tbody></table>"],col:[2,"<table><tbody></tbody><colgroup>","</colgroup></table>"],td:[3,"<table><tbody><tr>","</tr></tbody></table>"],_default:x.support.htmlSerialize?[0,"",""]:[1,"X<div>","</div>"]},jt=dt(a),Dt=jt.appendChild(a.createElement("div"));At.optgroup=At.option,At.tbody=At.tfoot=At.colgroup=At.caption=At.thead,At.th=At.td,x.fn.extend({text:function(e){return x.access(this,function(e){return e===t?x.text(this):this.empty().append((this[0]&&this[0].ownerDocument||a).createTextNode(e))},null,e,arguments.length)},append:function(){return this.domManip(arguments,function(e){if(1===this.nodeType||11===this.nodeType||9===this.nodeType){var t=Lt(this,e);t.appendChild(e)}})},prepend:function(){return this.domManip(arguments,function(e){if(1===this.nodeType||11===this.nodeType||9===this.nodeType){var t=Lt(this,e);t.insertBefore(e,t.firstChild)}})},before:function(){return this.domManip(arguments,function(e){this.parentNode&&this.parentNode.insertBefore(e,this)})},after:function(){return this.domManip(arguments,function(e){this.parentNode&&this.parentNode.insertBefore(e,this.nextSibling)})},remove:function(e,t){var n,r=e?x.filter(e,this):this,i=0;for(;null!=(n=r[i]);i++)t||1!==n.nodeType||x.cleanData(Ft(n)),n.parentNode&&(t&&x.contains(n.ownerDocument,n)&&_t(Ft(n,"script")),n.parentNode.removeChild(n));return this},empty:function(){var e,t=0;for(;null!=(e=this[t]);t++){1===e.nodeType&&x.cleanData(Ft(e,!1));while(e.firstChild)e.removeChild(e.firstChild);e.options&&x.nodeName(e,"select")&&(e.options.length=0)}return this},clone:function(e,t){return e=null==e?!1:e,t=null==t?e:t,this.map(function(){return x.clone(this,e,t)})},html:function(e){return x.access(this,function(e){var n=this[0]||{},r=0,i=this.length;if(e===t)return 1===n.nodeType?n.innerHTML.replace(gt,""):t;if(!("string"!=typeof e||Tt.test(e)||!x.support.htmlSerialize&&mt.test(e)||!x.support.leadingWhitespace&&yt.test(e)||At[(bt.exec(e)||["",""])[1].toLowerCase()])){e=e.replace(vt,"<$1></$2>");try{for(;i>r;r++)n=this[r]||{},1===n.nodeType&&(x.cleanData(Ft(n,!1)),n.innerHTML=e);n=0}catch(o){}}n&&this.empty().append(e)},null,e,arguments.length)},replaceWith:function(){var e=x.map(this,function(e){return[e.nextSibling,e.parentNode]}),t=0;return this.domManip(arguments,function(n){var r=e[t++],i=e[t++];i&&(r&&r.parentNode!==i&&(r=this.nextSibling),x(this).remove(),i.insertBefore(n,r))},!0),t?this:this.remove()},detach:function(e){return this.remove(e,!0)},domManip:function(e,t,n){e=d.apply([],e);var r,i,o,a,s,l,u=0,c=this.length,p=this,f=c-1,h=e[0],g=x.isFunction(h);if(g||!(1>=c||"string"!=typeof h||x.support.checkClone)&&Nt.test(h))return this.each(function(r){var i=p.eq(r);g&&(e[0]=h.call(this,r,i.html())),i.domManip(e,t,n)});if(c&&(l=x.buildFragment(e,this[0].ownerDocument,!1,!n&&this),r=l.firstChild,1===l.childNodes.length&&(l=r),r)){for(a=x.map(Ft(l,"script"),Ht),o=a.length;c>u;u++)i=l,u!==f&&(i=x.clone(i,!0,!0),o&&x.merge(a,Ft(i,"script"))),t.call(this[u],i,u);if(o)for(s=a[a.length-1].ownerDocument,x.map(a,qt),u=0;o>u;u++)i=a[u],kt.test(i.type||"")&&!x._data(i,"globalEval")&&x.contains(s,i)&&(i.src?x._evalUrl(i.src):x.globalEval((i.text||i.textContent||i.innerHTML||"").replace(St,"")));l=r=null}return this}});function Lt(e,t){return x.nodeName(e,"table")&&x.nodeName(1===t.nodeType?t:t.firstChild,"tr")?e.getElementsByTagName("tbody")[0]||e.appendChild(e.ownerDocument.createElement("tbody")):e}function Ht(e){return e.type=(null!==x.find.attr(e,"type"))+"/"+e.type,e}function qt(e){var t=Et.exec(e.type);return t?e.type=t[1]:e.removeAttribute("type"),e}function _t(e,t){var n,r=0;for(;null!=(n=e[r]);r++)x._data(n,"globalEval",!t||x._data(t[r],"globalEval"))}function Mt(e,t){if(1===t.nodeType&&x.hasData(e)){var n,r,i,o=x._data(e),a=x._data(t,o),s=o.events;if(s){delete a.handle,a.events={};for(n in s)for(r=0,i=s[n].length;i>r;r++)x.event.add(t,n,s[n][r])}a.data&&(a.data=x.extend({},a.data))}}function Ot(e,t){var n,r,i;if(1===t.nodeType){if(n=t.nodeName.toLowerCase(),!x.support.noCloneEvent&&t[x.expando]){i=x._data(t);for(r in i.events)x.removeEvent(t,r,i.handle);t.removeAttribute(x.expando)}"script"===n&&t.text!==e.text?(Ht(t).text=e.text,qt(t)):"object"===n?(t.parentNode&&(t.outerHTML=e.outerHTML),x.support.html5Clone&&e.innerHTML&&!x.trim(t.innerHTML)&&(t.innerHTML=e.innerHTML)):"input"===n&&Ct.test(e.type)?(t.defaultChecked=t.checked=e.checked,t.value!==e.value&&(t.value=e.value)):"option"===n?t.defaultSelected=t.selected=e.defaultSelected:("input"===n||"textarea"===n)&&(t.defaultValue=e.defaultValue)}}x.each({appendTo:"append",prependTo:"prepend",insertBefore:"before",insertAfter:"after",replaceAll:"replaceWith"},function(e,t){x.fn[e]=function(e){var n,r=0,i=[],o=x(e),a=o.length-1;for(;a>=r;r++)n=r===a?this:this.clone(!0),x(o[r])[t](n),h.apply(i,n.get());return this.pushStack(i)}});function Ft(e,n){var r,o,a=0,s=typeof e.getElementsByTagName!==i?e.getElementsByTagName(n||"*"):typeof e.querySelectorAll!==i?e.querySelectorAll(n||"*"):t;if(!s)for(s=[],r=e.childNodes||e;null!=(o=r[a]);a++)!n||x.nodeName(o,n)?s.push(o):x.merge(s,Ft(o,n));return n===t||n&&x.nodeName(e,n)?x.merge([e],s):s}function Bt(e){Ct.test(e.type)&&(e.defaultChecked=e.checked)}x.extend({clone:function(e,t,n){var r,i,o,a,s,l=x.contains(e.ownerDocument,e);if(x.support.html5Clone||x.isXMLDoc(e)||!mt.test("<"+e.nodeName+">")?o=e.cloneNode(!0):(Dt.innerHTML=e.outerHTML,Dt.removeChild(o=Dt.firstChild)),!(x.support.noCloneEvent&&x.support.noCloneChecked||1!==e.nodeType&&11!==e.nodeType||x.isXMLDoc(e)))for(r=Ft(o),s=Ft(e),a=0;null!=(i=s[a]);++a)r[a]&&Ot(i,r[a]);if(t)if(n)for(s=s||Ft(e),r=r||Ft(o),a=0;null!=(i=s[a]);a++)Mt(i,r[a]);else Mt(e,o);return r=Ft(o,"script"),r.length>0&&_t(r,!l&&Ft(e,"script")),r=s=i=null,o},buildFragment:function(e,t,n,r){var i,o,a,s,l,u,c,p=e.length,f=dt(t),d=[],h=0;for(;p>h;h++)if(o=e[h],o||0===o)if("object"===x.type(o))x.merge(d,o.nodeType?[o]:o);else if(wt.test(o)){s=s||f.appendChild(t.createElement("div")),l=(bt.exec(o)||["",""])[1].toLowerCase(),c=At[l]||At._default,s.innerHTML=c[1]+o.replace(vt,"<$1></$2>")+c[2],i=c[0];while(i--)s=s.lastChild;if(!x.support.leadingWhitespace&&yt.test(o)&&d.push(t.createTextNode(yt.exec(o)[0])),!x.support.tbody){o="table"!==l||xt.test(o)?"<table>"!==c[1]||xt.test(o)?0:s:s.firstChild,i=o&&o.childNodes.length;while(i--)x.nodeName(u=o.childNodes[i],"tbody")&&!u.childNodes.length&&o.removeChild(u)}x.merge(d,s.childNodes),s.textContent="";while(s.firstChild)s.removeChild(s.firstChild);s=f.lastChild}else d.push(t.createTextNode(o));s&&f.removeChild(s),x.support.appendChecked||x.grep(Ft(d,"input"),Bt),h=0;while(o=d[h++])if((!r||-1===x.inArray(o,r))&&(a=x.contains(o.ownerDocument,o),s=Ft(f.appendChild(o),"script"),a&&_t(s),n)){i=0;while(o=s[i++])kt.test(o.type||"")&&n.push(o)}return s=null,f},cleanData:function(e,t){var n,r,o,a,s=0,l=x.expando,u=x.cache,c=x.support.deleteExpando,f=x.event.special;for(;null!=(n=e[s]);s++)if((t||x.acceptData(n))&&(o=n[l],a=o&&u[o])){if(a.events)for(r in a.events)f[r]?x.event.remove(n,r):x.removeEvent(n,r,a.handle);
u[o]&&(delete u[o],c?delete n[l]:typeof n.removeAttribute!==i?n.removeAttribute(l):n[l]=null,p.push(o))}},_evalUrl:function(e){return x.ajax({url:e,type:"GET",dataType:"script",async:!1,global:!1,"throws":!0})}}),x.fn.extend({wrapAll:function(e){if(x.isFunction(e))return this.each(function(t){x(this).wrapAll(e.call(this,t))});if(this[0]){var t=x(e,this[0].ownerDocument).eq(0).clone(!0);this[0].parentNode&&t.insertBefore(this[0]),t.map(function(){var e=this;while(e.firstChild&&1===e.firstChild.nodeType)e=e.firstChild;return e}).append(this)}return this},wrapInner:function(e){return x.isFunction(e)?this.each(function(t){x(this).wrapInner(e.call(this,t))}):this.each(function(){var t=x(this),n=t.contents();n.length?n.wrapAll(e):t.append(e)})},wrap:function(e){var t=x.isFunction(e);return this.each(function(n){x(this).wrapAll(t?e.call(this,n):e)})},unwrap:function(){return this.parent().each(function(){x.nodeName(this,"body")||x(this).replaceWith(this.childNodes)}).end()}});var Pt,Rt,Wt,$t=/alpha\([^)]*\)/i,It=/opacity\s*=\s*([^)]*)/,zt=/^(top|right|bottom|left)$/,Xt=/^(none|table(?!-c[ea]).+)/,Ut=/^margin/,Vt=RegExp("^("+w+")(.*)$","i"),Yt=RegExp("^("+w+")(?!px)[a-z%]+$","i"),Jt=RegExp("^([+-])=("+w+")","i"),Gt={BODY:"block"},Qt={position:"absolute",visibility:"hidden",display:"block"},Kt={letterSpacing:0,fontWeight:400},Zt=["Top","Right","Bottom","Left"],en=["Webkit","O","Moz","ms"];function tn(e,t){if(t in e)return t;var n=t.charAt(0).toUpperCase()+t.slice(1),r=t,i=en.length;while(i--)if(t=en[i]+n,t in e)return t;return r}function nn(e,t){return e=t||e,"none"===x.css(e,"display")||!x.contains(e.ownerDocument,e)}function rn(e,t){var n,r,i,o=[],a=0,s=e.length;for(;s>a;a++)r=e[a],r.style&&(o[a]=x._data(r,"olddisplay"),n=r.style.display,t?(o[a]||"none"!==n||(r.style.display=""),""===r.style.display&&nn(r)&&(o[a]=x._data(r,"olddisplay",ln(r.nodeName)))):o[a]||(i=nn(r),(n&&"none"!==n||!i)&&x._data(r,"olddisplay",i?n:x.css(r,"display"))));for(a=0;s>a;a++)r=e[a],r.style&&(t&&"none"!==r.style.display&&""!==r.style.display||(r.style.display=t?o[a]||"":"none"));return e}x.fn.extend({css:function(e,n){return x.access(this,function(e,n,r){var i,o,a={},s=0;if(x.isArray(n)){for(o=Rt(e),i=n.length;i>s;s++)a[n[s]]=x.css(e,n[s],!1,o);return a}return r!==t?x.style(e,n,r):x.css(e,n)},e,n,arguments.length>1)},show:function(){return rn(this,!0)},hide:function(){return rn(this)},toggle:function(e){return"boolean"==typeof e?e?this.show():this.hide():this.each(function(){nn(this)?x(this).show():x(this).hide()})}}),x.extend({cssHooks:{opacity:{get:function(e,t){if(t){var n=Wt(e,"opacity");return""===n?"1":n}}}},cssNumber:{columnCount:!0,fillOpacity:!0,fontWeight:!0,lineHeight:!0,opacity:!0,order:!0,orphans:!0,widows:!0,zIndex:!0,zoom:!0},cssProps:{"float":x.support.cssFloat?"cssFloat":"styleFloat"},style:function(e,n,r,i){if(e&&3!==e.nodeType&&8!==e.nodeType&&e.style){var o,a,s,l=x.camelCase(n),u=e.style;if(n=x.cssProps[l]||(x.cssProps[l]=tn(u,l)),s=x.cssHooks[n]||x.cssHooks[l],r===t)return s&&"get"in s&&(o=s.get(e,!1,i))!==t?o:u[n];if(a=typeof r,"string"===a&&(o=Jt.exec(r))&&(r=(o[1]+1)*o[2]+parseFloat(x.css(e,n)),a="number"),!(null==r||"number"===a&&isNaN(r)||("number"!==a||x.cssNumber[l]||(r+="px"),x.support.clearCloneStyle||""!==r||0!==n.indexOf("background")||(u[n]="inherit"),s&&"set"in s&&(r=s.set(e,r,i))===t)))try{u[n]=r}catch(c){}}},css:function(e,n,r,i){var o,a,s,l=x.camelCase(n);return n=x.cssProps[l]||(x.cssProps[l]=tn(e.style,l)),s=x.cssHooks[n]||x.cssHooks[l],s&&"get"in s&&(a=s.get(e,!0,r)),a===t&&(a=Wt(e,n,i)),"normal"===a&&n in Kt&&(a=Kt[n]),""===r||r?(o=parseFloat(a),r===!0||x.isNumeric(o)?o||0:a):a}}),e.getComputedStyle?(Rt=function(t){return e.getComputedStyle(t,null)},Wt=function(e,n,r){var i,o,a,s=r||Rt(e),l=s?s.getPropertyValue(n)||s[n]:t,u=e.style;return s&&(""!==l||x.contains(e.ownerDocument,e)||(l=x.style(e,n)),Yt.test(l)&&Ut.test(n)&&(i=u.width,o=u.minWidth,a=u.maxWidth,u.minWidth=u.maxWidth=u.width=l,l=s.width,u.width=i,u.minWidth=o,u.maxWidth=a)),l}):a.documentElement.currentStyle&&(Rt=function(e){return e.currentStyle},Wt=function(e,n,r){var i,o,a,s=r||Rt(e),l=s?s[n]:t,u=e.style;return null==l&&u&&u[n]&&(l=u[n]),Yt.test(l)&&!zt.test(n)&&(i=u.left,o=e.runtimeStyle,a=o&&o.left,a&&(o.left=e.currentStyle.left),u.left="fontSize"===n?"1em":l,l=u.pixelLeft+"px",u.left=i,a&&(o.left=a)),""===l?"auto":l});function on(e,t,n){var r=Vt.exec(t);return r?Math.max(0,r[1]-(n||0))+(r[2]||"px"):t}function an(e,t,n,r,i){var o=n===(r?"border":"content")?4:"width"===t?1:0,a=0;for(;4>o;o+=2)"margin"===n&&(a+=x.css(e,n+Zt[o],!0,i)),r?("content"===n&&(a-=x.css(e,"padding"+Zt[o],!0,i)),"margin"!==n&&(a-=x.css(e,"border"+Zt[o]+"Width",!0,i))):(a+=x.css(e,"padding"+Zt[o],!0,i),"padding"!==n&&(a+=x.css(e,"border"+Zt[o]+"Width",!0,i)));return a}function sn(e,t,n){var r=!0,i="width"===t?e.offsetWidth:e.offsetHeight,o=Rt(e),a=x.support.boxSizing&&"border-box"===x.css(e,"boxSizing",!1,o);if(0>=i||null==i){if(i=Wt(e,t,o),(0>i||null==i)&&(i=e.style[t]),Yt.test(i))return i;r=a&&(x.support.boxSizingReliable||i===e.style[t]),i=parseFloat(i)||0}return i+an(e,t,n||(a?"border":"content"),r,o)+"px"}function ln(e){var t=a,n=Gt[e];return n||(n=un(e,t),"none"!==n&&n||(Pt=(Pt||x("<iframe frameborder='0' width='0' height='0'/>").css("cssText","display:block !important")).appendTo(t.documentElement),t=(Pt[0].contentWindow||Pt[0].contentDocument).document,t.write("<!doctype html><html><body>"),t.close(),n=un(e,t),Pt.detach()),Gt[e]=n),n}function un(e,t){var n=x(t.createElement(e)).appendTo(t.body),r=x.css(n[0],"display");return n.remove(),r}x.each(["height","width"],function(e,n){x.cssHooks[n]={get:function(e,r,i){return r?0===e.offsetWidth&&Xt.test(x.css(e,"display"))?x.swap(e,Qt,function(){return sn(e,n,i)}):sn(e,n,i):t},set:function(e,t,r){var i=r&&Rt(e);return on(e,t,r?an(e,n,r,x.support.boxSizing&&"border-box"===x.css(e,"boxSizing",!1,i),i):0)}}}),x.support.opacity||(x.cssHooks.opacity={get:function(e,t){return It.test((t&&e.currentStyle?e.currentStyle.filter:e.style.filter)||"")?.01*parseFloat(RegExp.$1)+"":t?"1":""},set:function(e,t){var n=e.style,r=e.currentStyle,i=x.isNumeric(t)?"alpha(opacity="+100*t+")":"",o=r&&r.filter||n.filter||"";n.zoom=1,(t>=1||""===t)&&""===x.trim(o.replace($t,""))&&n.removeAttribute&&(n.removeAttribute("filter"),""===t||r&&!r.filter)||(n.filter=$t.test(o)?o.replace($t,i):o+" "+i)}}),x(function(){x.support.reliableMarginRight||(x.cssHooks.marginRight={get:function(e,n){return n?x.swap(e,{display:"inline-block"},Wt,[e,"marginRight"]):t}}),!x.support.pixelPosition&&x.fn.position&&x.each(["top","left"],function(e,n){x.cssHooks[n]={get:function(e,r){return r?(r=Wt(e,n),Yt.test(r)?x(e).position()[n]+"px":r):t}}})}),x.expr&&x.expr.filters&&(x.expr.filters.hidden=function(e){return 0>=e.offsetWidth&&0>=e.offsetHeight||!x.support.reliableHiddenOffsets&&"none"===(e.style&&e.style.display||x.css(e,"display"))},x.expr.filters.visible=function(e){return!x.expr.filters.hidden(e)}),x.each({margin:"",padding:"",border:"Width"},function(e,t){x.cssHooks[e+t]={expand:function(n){var r=0,i={},o="string"==typeof n?n.split(" "):[n];for(;4>r;r++)i[e+Zt[r]+t]=o[r]||o[r-2]||o[0];return i}},Ut.test(e)||(x.cssHooks[e+t].set=on)});var cn=/%20/g,pn=/\[\]$/,fn=/\r?\n/g,dn=/^(?:submit|button|image|reset|file)$/i,hn=/^(?:input|select|textarea|keygen)/i;x.fn.extend({serialize:function(){return x.param(this.serializeArray())},serializeArray:function(){return this.map(function(){var e=x.prop(this,"elements");return e?x.makeArray(e):this}).filter(function(){var e=this.type;return this.name&&!x(this).is(":disabled")&&hn.test(this.nodeName)&&!dn.test(e)&&(this.checked||!Ct.test(e))}).map(function(e,t){var n=x(this).val();return null==n?null:x.isArray(n)?x.map(n,function(e){return{name:t.name,value:e.replace(fn,"\r\n")}}):{name:t.name,value:n.replace(fn,"\r\n")}}).get()}}),x.param=function(e,n){var r,i=[],o=function(e,t){t=x.isFunction(t)?t():null==t?"":t,i[i.length]=encodeURIComponent(e)+"="+encodeURIComponent(t)};if(n===t&&(n=x.ajaxSettings&&x.ajaxSettings.traditional),x.isArray(e)||e.jquery&&!x.isPlainObject(e))x.each(e,function(){o(this.name,this.value)});else for(r in e)gn(r,e[r],n,o);return i.join("&").replace(cn,"+")};function gn(e,t,n,r){var i;if(x.isArray(t))x.each(t,function(t,i){n||pn.test(e)?r(e,i):gn(e+"["+("object"==typeof i?t:"")+"]",i,n,r)});else if(n||"object"!==x.type(t))r(e,t);else for(i in t)gn(e+"["+i+"]",t[i],n,r)}x.each("blur focus focusin focusout load resize scroll unload click dblclick mousedown mouseup mousemove mouseover mouseout mouseenter mouseleave change select submit keydown keypress keyup error contextmenu".split(" "),function(e,t){x.fn[t]=function(e,n){return arguments.length>0?this.on(t,null,e,n):this.trigger(t)}}),x.fn.extend({hover:function(e,t){return this.mouseenter(e).mouseleave(t||e)},bind:function(e,t,n){return this.on(e,null,t,n)},unbind:function(e,t){return this.off(e,null,t)},delegate:function(e,t,n,r){return this.on(t,e,n,r)},undelegate:function(e,t,n){return 1===arguments.length?this.off(e,"**"):this.off(t,e||"**",n)}});var mn,yn,vn=x.now(),bn=/\?/,xn=/#.*$/,wn=/([?&])_=[^&]*/,Tn=/^(.*?):[ \t]*([^\r\n]*)\r?$/gm,Cn=/^(?:about|app|app-storage|.+-extension|file|res|widget):$/,Nn=/^(?:GET|HEAD)$/,kn=/^\/\//,En=/^([\w.+-]+:)(?:\/\/([^\/?#:]*)(?::(\d+)|)|)/,Sn=x.fn.load,An={},jn={},Dn="*/".concat("*");try{yn=o.href}catch(Ln){yn=a.createElement("a"),yn.href="",yn=yn.href}mn=En.exec(yn.toLowerCase())||[];function Hn(e){return function(t,n){"string"!=typeof t&&(n=t,t="*");var r,i=0,o=t.toLowerCase().match(T)||[];if(x.isFunction(n))while(r=o[i++])"+"===r[0]?(r=r.slice(1)||"*",(e[r]=e[r]||[]).unshift(n)):(e[r]=e[r]||[]).push(n)}}function qn(e,n,r,i){var o={},a=e===jn;function s(l){var u;return o[l]=!0,x.each(e[l]||[],function(e,l){var c=l(n,r,i);return"string"!=typeof c||a||o[c]?a?!(u=c):t:(n.dataTypes.unshift(c),s(c),!1)}),u}return s(n.dataTypes[0])||!o["*"]&&s("*")}function _n(e,n){var r,i,o=x.ajaxSettings.flatOptions||{};for(i in n)n[i]!==t&&((o[i]?e:r||(r={}))[i]=n[i]);return r&&x.extend(!0,e,r),e}x.fn.load=function(e,n,r){if("string"!=typeof e&&Sn)return Sn.apply(this,arguments);var i,o,a,s=this,l=e.indexOf(" ");return l>=0&&(i=e.slice(l,e.length),e=e.slice(0,l)),x.isFunction(n)?(r=n,n=t):n&&"object"==typeof n&&(a="POST"),s.length>0&&x.ajax({url:e,type:a,dataType:"html",data:n}).done(function(e){o=arguments,s.html(i?x("<div>").append(x.parseHTML(e)).find(i):e)}).complete(r&&function(e,t){s.each(r,o||[e.responseText,t,e])}),this},x.each(["ajaxStart","ajaxStop","ajaxComplete","ajaxError","ajaxSuccess","ajaxSend"],function(e,t){x.fn[t]=function(e){return this.on(t,e)}}),x.extend({active:0,lastModified:{},etag:{},ajaxSettings:{url:yn,type:"GET",isLocal:Cn.test(mn[1]),global:!0,processData:!0,async:!0,contentType:"application/x-www-form-urlencoded; charset=UTF-8",accepts:{"*":Dn,text:"text/plain",html:"text/html",xml:"application/xml, text/xml",json:"application/json, text/javascript"},contents:{xml:/xml/,html:/html/,json:/json/},responseFields:{xml:"responseXML",text:"responseText",json:"responseJSON"},converters:{"* text":String,"text html":!0,"text json":x.parseJSON,"text xml":x.parseXML},flatOptions:{url:!0,context:!0}},ajaxSetup:function(e,t){return t?_n(_n(e,x.ajaxSettings),t):_n(x.ajaxSettings,e)},ajaxPrefilter:Hn(An),ajaxTransport:Hn(jn),ajax:function(e,n){"object"==typeof e&&(n=e,e=t),n=n||{};var r,i,o,a,s,l,u,c,p=x.ajaxSetup({},n),f=p.context||p,d=p.context&&(f.nodeType||f.jquery)?x(f):x.event,h=x.Deferred(),g=x.Callbacks("once memory"),m=p.statusCode||{},y={},v={},b=0,w="canceled",C={readyState:0,getResponseHeader:function(e){var t;if(2===b){if(!c){c={};while(t=Tn.exec(a))c[t[1].toLowerCase()]=t[2]}t=c[e.toLowerCase()]}return null==t?null:t},getAllResponseHeaders:function(){return 2===b?a:null},setRequestHeader:function(e,t){var n=e.toLowerCase();return b||(e=v[n]=v[n]||e,y[e]=t),this},overrideMimeType:function(e){return b||(p.mimeType=e),this},statusCode:function(e){var t;if(e)if(2>b)for(t in e)m[t]=[m[t],e[t]];else C.always(e[C.status]);return this},abort:function(e){var t=e||w;return u&&u.abort(t),k(0,t),this}};if(h.promise(C).complete=g.add,C.success=C.done,C.error=C.fail,p.url=((e||p.url||yn)+"").replace(xn,"").replace(kn,mn[1]+"//"),p.type=n.method||n.type||p.method||p.type,p.dataTypes=x.trim(p.dataType||"*").toLowerCase().match(T)||[""],null==p.crossDomain&&(r=En.exec(p.url.toLowerCase()),p.crossDomain=!(!r||r[1]===mn[1]&&r[2]===mn[2]&&(r[3]||("http:"===r[1]?"80":"443"))===(mn[3]||("http:"===mn[1]?"80":"443")))),p.data&&p.processData&&"string"!=typeof p.data&&(p.data=x.param(p.data,p.traditional)),qn(An,p,n,C),2===b)return C;l=p.global,l&&0===x.active++&&x.event.trigger("ajaxStart"),p.type=p.type.toUpperCase(),p.hasContent=!Nn.test(p.type),o=p.url,p.hasContent||(p.data&&(o=p.url+=(bn.test(o)?"&":"?")+p.data,delete p.data),p.cache===!1&&(p.url=wn.test(o)?o.replace(wn,"$1_="+vn++):o+(bn.test(o)?"&":"?")+"_="+vn++)),p.ifModified&&(x.lastModified[o]&&C.setRequestHeader("If-Modified-Since",x.lastModified[o]),x.etag[o]&&C.setRequestHeader("If-None-Match",x.etag[o])),(p.data&&p.hasContent&&p.contentType!==!1||n.contentType)&&C.setRequestHeader("Content-Type",p.contentType),C.setRequestHeader("Accept",p.dataTypes[0]&&p.accepts[p.dataTypes[0]]?p.accepts[p.dataTypes[0]]+("*"!==p.dataTypes[0]?", "+Dn+"; q=0.01":""):p.accepts["*"]);for(i in p.headers)C.setRequestHeader(i,p.headers[i]);if(p.beforeSend&&(p.beforeSend.call(f,C,p)===!1||2===b))return C.abort();w="abort";for(i in{success:1,error:1,complete:1})C[i](p[i]);if(u=qn(jn,p,n,C)){C.readyState=1,l&&d.trigger("ajaxSend",[C,p]),p.async&&p.timeout>0&&(s=setTimeout(function(){C.abort("timeout")},p.timeout));try{b=1,u.send(y,k)}catch(N){if(!(2>b))throw N;k(-1,N)}}else k(-1,"No Transport");function k(e,n,r,i){var c,y,v,w,T,N=n;2!==b&&(b=2,s&&clearTimeout(s),u=t,a=i||"",C.readyState=e>0?4:0,c=e>=200&&300>e||304===e,r&&(w=Mn(p,C,r)),w=On(p,w,C,c),c?(p.ifModified&&(T=C.getResponseHeader("Last-Modified"),T&&(x.lastModified[o]=T),T=C.getResponseHeader("etag"),T&&(x.etag[o]=T)),204===e||"HEAD"===p.type?N="nocontent":304===e?N="notmodified":(N=w.state,y=w.data,v=w.error,c=!v)):(v=N,(e||!N)&&(N="error",0>e&&(e=0))),C.status=e,C.statusText=(n||N)+"",c?h.resolveWith(f,[y,N,C]):h.rejectWith(f,[C,N,v]),C.statusCode(m),m=t,l&&d.trigger(c?"ajaxSuccess":"ajaxError",[C,p,c?y:v]),g.fireWith(f,[C,N]),l&&(d.trigger("ajaxComplete",[C,p]),--x.active||x.event.trigger("ajaxStop")))}return C},getJSON:function(e,t,n){return x.get(e,t,n,"json")},getScript:function(e,n){return x.get(e,t,n,"script")}}),x.each(["get","post"],function(e,n){x[n]=function(e,r,i,o){return x.isFunction(r)&&(o=o||i,i=r,r=t),x.ajax({url:e,type:n,dataType:o,data:r,success:i})}});function Mn(e,n,r){var i,o,a,s,l=e.contents,u=e.dataTypes;while("*"===u[0])u.shift(),o===t&&(o=e.mimeType||n.getResponseHeader("Content-Type"));if(o)for(s in l)if(l[s]&&l[s].test(o)){u.unshift(s);break}if(u[0]in r)a=u[0];else{for(s in r){if(!u[0]||e.converters[s+" "+u[0]]){a=s;break}i||(i=s)}a=a||i}return a?(a!==u[0]&&u.unshift(a),r[a]):t}function On(e,t,n,r){var i,o,a,s,l,u={},c=e.dataTypes.slice();if(c[1])for(a in e.converters)u[a.toLowerCase()]=e.converters[a];o=c.shift();while(o)if(e.responseFields[o]&&(n[e.responseFields[o]]=t),!l&&r&&e.dataFilter&&(t=e.dataFilter(t,e.dataType)),l=o,o=c.shift())if("*"===o)o=l;else if("*"!==l&&l!==o){if(a=u[l+" "+o]||u["* "+o],!a)for(i in u)if(s=i.split(" "),s[1]===o&&(a=u[l+" "+s[0]]||u["* "+s[0]])){a===!0?a=u[i]:u[i]!==!0&&(o=s[0],c.unshift(s[1]));break}if(a!==!0)if(a&&e["throws"])t=a(t);else try{t=a(t)}catch(p){return{state:"parsererror",error:a?p:"No conversion from "+l+" to "+o}}}return{state:"success",data:t}}x.ajaxSetup({accepts:{script:"text/javascript, application/javascript, application/ecmascript, application/x-ecmascript"},contents:{script:/(?:java|ecma)script/},converters:{"text script":function(e){return x.globalEval(e),e}}}),x.ajaxPrefilter("script",function(e){e.cache===t&&(e.cache=!1),e.crossDomain&&(e.type="GET",e.global=!1)}),x.ajaxTransport("script",function(e){if(e.crossDomain){var n,r=a.head||x("head")[0]||a.documentElement;return{send:function(t,i){n=a.createElement("script"),n.async=!0,e.scriptCharset&&(n.charset=e.scriptCharset),n.src=e.url,n.onload=n.onreadystatechange=function(e,t){(t||!n.readyState||/loaded|complete/.test(n.readyState))&&(n.onload=n.onreadystatechange=null,n.parentNode&&n.parentNode.removeChild(n),n=null,t||i(200,"success"))},r.insertBefore(n,r.firstChild)},abort:function(){n&&n.onload(t,!0)}}}});var Fn=[],Bn=/(=)\?(?=&|$)|\?\?/;x.ajaxSetup({jsonp:"callback",jsonpCallback:function(){var e=Fn.pop()||x.expando+"_"+vn++;return this[e]=!0,e}}),x.ajaxPrefilter("json jsonp",function(n,r,i){var o,a,s,l=n.jsonp!==!1&&(Bn.test(n.url)?"url":"string"==typeof n.data&&!(n.contentType||"").indexOf("application/x-www-form-urlencoded")&&Bn.test(n.data)&&"data");return l||"jsonp"===n.dataTypes[0]?(o=n.jsonpCallback=x.isFunction(n.jsonpCallback)?n.jsonpCallback():n.jsonpCallback,l?n[l]=n[l].replace(Bn,"$1"+o):n.jsonp!==!1&&(n.url+=(bn.test(n.url)?"&":"?")+n.jsonp+"="+o),n.converters["script json"]=function(){return s||x.error(o+" was not called"),s[0]},n.dataTypes[0]="json",a=e[o],e[o]=function(){s=arguments},i.always(function(){e[o]=a,n[o]&&(n.jsonpCallback=r.jsonpCallback,Fn.push(o)),s&&x.isFunction(a)&&a(s[0]),s=a=t}),"script"):t});var Pn,Rn,Wn=0,$n=e.ActiveXObject&&function(){var e;for(e in Pn)Pn[e](t,!0)};function In(){try{return new e.XMLHttpRequest}catch(t){}}function zn(){try{return new e.ActiveXObject("Microsoft.XMLHTTP")}catch(t){}}x.ajaxSettings.xhr=e.ActiveXObject?function(){return!this.isLocal&&In()||zn()}:In,Rn=x.ajaxSettings.xhr(),x.support.cors=!!Rn&&"withCredentials"in Rn,Rn=x.support.ajax=!!Rn,Rn&&x.ajaxTransport(function(n){if(!n.crossDomain||x.support.cors){var r;return{send:function(i,o){var a,s,l=n.xhr();if(n.username?l.open(n.type,n.url,n.async,n.username,n.password):l.open(n.type,n.url,n.async),n.xhrFields)for(s in n.xhrFields)l[s]=n.xhrFields[s];n.mimeType&&l.overrideMimeType&&l.overrideMimeType(n.mimeType),n.crossDomain||i["X-Requested-With"]||(i["X-Requested-With"]="XMLHttpRequest");try{for(s in i)l.setRequestHeader(s,i[s])}catch(u){}l.send(n.hasContent&&n.data||null),r=function(e,i){var s,u,c,p;try{if(r&&(i||4===l.readyState))if(r=t,a&&(l.onreadystatechange=x.noop,$n&&delete Pn[a]),i)4!==l.readyState&&l.abort();else{p={},s=l.status,u=l.getAllResponseHeaders(),"string"==typeof l.responseText&&(p.text=l.responseText);try{c=l.statusText}catch(f){c=""}s||!n.isLocal||n.crossDomain?1223===s&&(s=204):s=p.text?200:404}}catch(d){i||o(-1,d)}p&&o(s,c,p,u)},n.async?4===l.readyState?setTimeout(r):(a=++Wn,$n&&(Pn||(Pn={},x(e).unload($n)),Pn[a]=r),l.onreadystatechange=r):r()},abort:function(){r&&r(t,!0)}}}});var Xn,Un,Vn=/^(?:toggle|show|hide)$/,Yn=RegExp("^(?:([+-])=|)("+w+")([a-z%]*)$","i"),Jn=/queueHooks$/,Gn=[nr],Qn={"*":[function(e,t){var n=this.createTween(e,t),r=n.cur(),i=Yn.exec(t),o=i&&i[3]||(x.cssNumber[e]?"":"px"),a=(x.cssNumber[e]||"px"!==o&&+r)&&Yn.exec(x.css(n.elem,e)),s=1,l=20;if(a&&a[3]!==o){o=o||a[3],i=i||[],a=+r||1;do s=s||".5",a/=s,x.style(n.elem,e,a+o);while(s!==(s=n.cur()/r)&&1!==s&&--l)}return i&&(a=n.start=+a||+r||0,n.unit=o,n.end=i[1]?a+(i[1]+1)*i[2]:+i[2]),n}]};function Kn(){return setTimeout(function(){Xn=t}),Xn=x.now()}function Zn(e,t,n){var r,i=(Qn[t]||[]).concat(Qn["*"]),o=0,a=i.length;for(;a>o;o++)if(r=i[o].call(n,t,e))return r}function er(e,t,n){var r,i,o=0,a=Gn.length,s=x.Deferred().always(function(){delete l.elem}),l=function(){if(i)return!1;var t=Xn||Kn(),n=Math.max(0,u.startTime+u.duration-t),r=n/u.duration||0,o=1-r,a=0,l=u.tweens.length;for(;l>a;a++)u.tweens[a].run(o);return s.notifyWith(e,[u,o,n]),1>o&&l?n:(s.resolveWith(e,[u]),!1)},u=s.promise({elem:e,props:x.extend({},t),opts:x.extend(!0,{specialEasing:{}},n),originalProperties:t,originalOptions:n,startTime:Xn||Kn(),duration:n.duration,tweens:[],createTween:function(t,n){var r=x.Tween(e,u.opts,t,n,u.opts.specialEasing[t]||u.opts.easing);return u.tweens.push(r),r},stop:function(t){var n=0,r=t?u.tweens.length:0;if(i)return this;for(i=!0;r>n;n++)u.tweens[n].run(1);return t?s.resolveWith(e,[u,t]):s.rejectWith(e,[u,t]),this}}),c=u.props;for(tr(c,u.opts.specialEasing);a>o;o++)if(r=Gn[o].call(u,e,c,u.opts))return r;return x.map(c,Zn,u),x.isFunction(u.opts.start)&&u.opts.start.call(e,u),x.fx.timer(x.extend(l,{elem:e,anim:u,queue:u.opts.queue})),u.progress(u.opts.progress).done(u.opts.done,u.opts.complete).fail(u.opts.fail).always(u.opts.always)}function tr(e,t){var n,r,i,o,a;for(n in e)if(r=x.camelCase(n),i=t[r],o=e[n],x.isArray(o)&&(i=o[1],o=e[n]=o[0]),n!==r&&(e[r]=o,delete e[n]),a=x.cssHooks[r],a&&"expand"in a){o=a.expand(o),delete e[r];for(n in o)n in e||(e[n]=o[n],t[n]=i)}else t[r]=i}x.Animation=x.extend(er,{tweener:function(e,t){x.isFunction(e)?(t=e,e=["*"]):e=e.split(" ");var n,r=0,i=e.length;for(;i>r;r++)n=e[r],Qn[n]=Qn[n]||[],Qn[n].unshift(t)},prefilter:function(e,t){t?Gn.unshift(e):Gn.push(e)}});function nr(e,t,n){var r,i,o,a,s,l,u=this,c={},p=e.style,f=e.nodeType&&nn(e),d=x._data(e,"fxshow");n.queue||(s=x._queueHooks(e,"fx"),null==s.unqueued&&(s.unqueued=0,l=s.empty.fire,s.empty.fire=function(){s.unqueued||l()}),s.unqueued++,u.always(function(){u.always(function(){s.unqueued--,x.queue(e,"fx").length||s.empty.fire()})})),1===e.nodeType&&("height"in t||"width"in t)&&(n.overflow=[p.overflow,p.overflowX,p.overflowY],"inline"===x.css(e,"display")&&"none"===x.css(e,"float")&&(x.support.inlineBlockNeedsLayout&&"inline"!==ln(e.nodeName)?p.zoom=1:p.display="inline-block")),n.overflow&&(p.overflow="hidden",x.support.shrinkWrapBlocks||u.always(function(){p.overflow=n.overflow[0],p.overflowX=n.overflow[1],p.overflowY=n.overflow[2]}));for(r in t)if(i=t[r],Vn.exec(i)){if(delete t[r],o=o||"toggle"===i,i===(f?"hide":"show"))continue;c[r]=d&&d[r]||x.style(e,r)}if(!x.isEmptyObject(c)){d?"hidden"in d&&(f=d.hidden):d=x._data(e,"fxshow",{}),o&&(d.hidden=!f),f?x(e).show():u.done(function(){x(e).hide()}),u.done(function(){var t;x._removeData(e,"fxshow");for(t in c)x.style(e,t,c[t])});for(r in c)a=Zn(f?d[r]:0,r,u),r in d||(d[r]=a.start,f&&(a.end=a.start,a.start="width"===r||"height"===r?1:0))}}function rr(e,t,n,r,i){return new rr.prototype.init(e,t,n,r,i)}x.Tween=rr,rr.prototype={constructor:rr,init:function(e,t,n,r,i,o){this.elem=e,this.prop=n,this.easing=i||"swing",this.options=t,this.start=this.now=this.cur(),this.end=r,this.unit=o||(x.cssNumber[n]?"":"px")},cur:function(){var e=rr.propHooks[this.prop];return e&&e.get?e.get(this):rr.propHooks._default.get(this)},run:function(e){var t,n=rr.propHooks[this.prop];return this.pos=t=this.options.duration?x.easing[this.easing](e,this.options.duration*e,0,1,this.options.duration):e,this.now=(this.end-this.start)*t+this.start,this.options.step&&this.options.step.call(this.elem,this.now,this),n&&n.set?n.set(this):rr.propHooks._default.set(this),this}},rr.prototype.init.prototype=rr.prototype,rr.propHooks={_default:{get:function(e){var t;return null==e.elem[e.prop]||e.elem.style&&null!=e.elem.style[e.prop]?(t=x.css(e.elem,e.prop,""),t&&"auto"!==t?t:0):e.elem[e.prop]},set:function(e){x.fx.step[e.prop]?x.fx.step[e.prop](e):e.elem.style&&(null!=e.elem.style[x.cssProps[e.prop]]||x.cssHooks[e.prop])?x.style(e.elem,e.prop,e.now+e.unit):e.elem[e.prop]=e.now}}},rr.propHooks.scrollTop=rr.propHooks.scrollLeft={set:function(e){e.elem.nodeType&&e.elem.parentNode&&(e.elem[e.prop]=e.now)}},x.each(["toggle","show","hide"],function(e,t){var n=x.fn[t];x.fn[t]=function(e,r,i){return null==e||"boolean"==typeof e?n.apply(this,arguments):this.animate(ir(t,!0),e,r,i)}}),x.fn.extend({fadeTo:function(e,t,n,r){return this.filter(nn).css("opacity",0).show().end().animate({opacity:t},e,n,r)},animate:function(e,t,n,r){var i=x.isEmptyObject(e),o=x.speed(t,n,r),a=function(){var t=er(this,x.extend({},e),o);(i||x._data(this,"finish"))&&t.stop(!0)};return a.finish=a,i||o.queue===!1?this.each(a):this.queue(o.queue,a)},stop:function(e,n,r){var i=function(e){var t=e.stop;delete e.stop,t(r)};return"string"!=typeof e&&(r=n,n=e,e=t),n&&e!==!1&&this.queue(e||"fx",[]),this.each(function(){var t=!0,n=null!=e&&e+"queueHooks",o=x.timers,a=x._data(this);if(n)a[n]&&a[n].stop&&i(a[n]);else for(n in a)a[n]&&a[n].stop&&Jn.test(n)&&i(a[n]);for(n=o.length;n--;)o[n].elem!==this||null!=e&&o[n].queue!==e||(o[n].anim.stop(r),t=!1,o.splice(n,1));(t||!r)&&x.dequeue(this,e)})},finish:function(e){return e!==!1&&(e=e||"fx"),this.each(function(){var t,n=x._data(this),r=n[e+"queue"],i=n[e+"queueHooks"],o=x.timers,a=r?r.length:0;for(n.finish=!0,x.queue(this,e,[]),i&&i.stop&&i.stop.call(this,!0),t=o.length;t--;)o[t].elem===this&&o[t].queue===e&&(o[t].anim.stop(!0),o.splice(t,1));for(t=0;a>t;t++)r[t]&&r[t].finish&&r[t].finish.call(this);delete n.finish})}});function ir(e,t){var n,r={height:e},i=0;for(t=t?1:0;4>i;i+=2-t)n=Zt[i],r["margin"+n]=r["padding"+n]=e;return t&&(r.opacity=r.width=e),r}x.each({slideDown:ir("show"),slideUp:ir("hide"),slideToggle:ir("toggle"),fadeIn:{opacity:"show"},fadeOut:{opacity:"hide"},fadeToggle:{opacity:"toggle"}},function(e,t){x.fn[e]=function(e,n,r){return this.animate(t,e,n,r)}}),x.speed=function(e,t,n){var r=e&&"object"==typeof e?x.extend({},e):{complete:n||!n&&t||x.isFunction(e)&&e,duration:e,easing:n&&t||t&&!x.isFunction(t)&&t};return r.duration=x.fx.off?0:"number"==typeof r.duration?r.duration:r.duration in x.fx.speeds?x.fx.speeds[r.duration]:x.fx.speeds._default,(null==r.queue||r.queue===!0)&&(r.queue="fx"),r.old=r.complete,r.complete=function(){x.isFunction(r.old)&&r.old.call(this),r.queue&&x.dequeue(this,r.queue)},r},x.easing={linear:function(e){return e},swing:function(e){return.5-Math.cos(e*Math.PI)/2}},x.timers=[],x.fx=rr.prototype.init,x.fx.tick=function(){var e,n=x.timers,r=0;for(Xn=x.now();n.length>r;r++)e=n[r],e()||n[r]!==e||n.splice(r--,1);n.length||x.fx.stop(),Xn=t},x.fx.timer=function(e){e()&&x.timers.push(e)&&x.fx.start()},x.fx.interval=13,x.fx.start=function(){Un||(Un=setInterval(x.fx.tick,x.fx.interval))},x.fx.stop=function(){clearInterval(Un),Un=null},x.fx.speeds={slow:600,fast:200,_default:400},x.fx.step={},x.expr&&x.expr.filters&&(x.expr.filters.animated=function(e){return x.grep(x.timers,function(t){return e===t.elem}).length}),x.fn.offset=function(e){if(arguments.length)return e===t?this:this.each(function(t){x.offset.setOffset(this,e,t)});var n,r,o={top:0,left:0},a=this[0],s=a&&a.ownerDocument;if(s)return n=s.documentElement,x.contains(n,a)?(typeof a.getBoundingClientRect!==i&&(o=a.getBoundingClientRect()),r=or(s),{top:o.top+(r.pageYOffset||n.scrollTop)-(n.clientTop||0),left:o.left+(r.pageXOffset||n.scrollLeft)-(n.clientLeft||0)}):o},x.offset={setOffset:function(e,t,n){var r=x.css(e,"position");"static"===r&&(e.style.position="relative");var i=x(e),o=i.offset(),a=x.css(e,"top"),s=x.css(e,"left"),l=("absolute"===r||"fixed"===r)&&x.inArray("auto",[a,s])>-1,u={},c={},p,f;l?(c=i.position(),p=c.top,f=c.left):(p=parseFloat(a)||0,f=parseFloat(s)||0),x.isFunction(t)&&(t=t.call(e,n,o)),null!=t.top&&(u.top=t.top-o.top+p),null!=t.left&&(u.left=t.left-o.left+f),"using"in t?t.using.call(e,u):i.css(u)}},x.fn.extend({position:function(){if(this[0]){var e,t,n={top:0,left:0},r=this[0];return"fixed"===x.css(r,"position")?t=r.getBoundingClientRect():(e=this.offsetParent(),t=this.offset(),x.nodeName(e[0],"html")||(n=e.offset()),n.top+=x.css(e[0],"borderTopWidth",!0),n.left+=x.css(e[0],"borderLeftWidth",!0)),{top:t.top-n.top-x.css(r,"marginTop",!0),left:t.left-n.left-x.css(r,"marginLeft",!0)}}},offsetParent:function(){return this.map(function(){var e=this.offsetParent||s;while(e&&!x.nodeName(e,"html")&&"static"===x.css(e,"position"))e=e.offsetParent;return e||s})}}),x.each({scrollLeft:"pageXOffset",scrollTop:"pageYOffset"},function(e,n){var r=/Y/.test(n);x.fn[e]=function(i){return x.access(this,function(e,i,o){var a=or(e);return o===t?a?n in a?a[n]:a.document.documentElement[i]:e[i]:(a?a.scrollTo(r?x(a).scrollLeft():o,r?o:x(a).scrollTop()):e[i]=o,t)},e,i,arguments.length,null)}});function or(e){return x.isWindow(e)?e:9===e.nodeType?e.defaultView||e.parentWindow:!1}x.each({Height:"height",Width:"width"},function(e,n){x.each({padding:"inner"+e,content:n,"":"outer"+e},function(r,i){x.fn[i]=function(i,o){var a=arguments.length&&(r||"boolean"!=typeof i),s=r||(i===!0||o===!0?"margin":"border");return x.access(this,function(n,r,i){var o;return x.isWindow(n)?n.document.documentElement["client"+e]:9===n.nodeType?(o=n.documentElement,Math.max(n.body["scroll"+e],o["scroll"+e],n.body["offset"+e],o["offset"+e],o["client"+e])):i===t?x.css(n,r,s):x.style(n,r,i,s)},n,a?i:t,a,null)}})}),x.fn.size=function(){return this.length},x.fn.andSelf=x.fn.addBack,"object"==typeof module&&module&&"object"==typeof module.exports?module.exports=x:(e.jQuery=e.$=x,"function"==typeof define&&define.amd&&define("jquery",[],function(){return x}))})(window);


(function(){function v(a,b){var c;a||(a={});for(c in b)a[c]=b[c];return a}function x(){var a,b=arguments.length,c={},d=function(a,b){var c,h;for(h in b)b.hasOwnProperty(h)&&(c=b[h],typeof a!=="object"&&(a={}),a[h]=c&&typeof c==="object"&&Object.prototype.toString.call(c)!=="[object Array]"&&typeof c.nodeType!=="number"?d(a[h]||{},c):b[h]);return a};for(a=0;a<b;a++)c=d(c,arguments[a]);return c}function u(a,b){return parseInt(a,b||10)}function fa(a){return typeof a==="string"}function V(a){return typeof a===
"object"}function Da(a){return Object.prototype.toString.call(a)==="[object Array]"}function Ea(a){return typeof a==="number"}function ka(a){return I.log(a)/I.LN10}function da(a){return I.pow(10,a)}function ga(a,b){for(var c=a.length;c--;)if(a[c]===b){a.splice(c,1);break}}function r(a){return a!==y&&a!==null}function A(a,b,c){var d,e;if(fa(b))r(c)?a.setAttribute(b,c):a&&a.getAttribute&&(e=a.getAttribute(b));else if(r(b)&&V(b))for(d in b)a.setAttribute(d,b[d]);return e}function ha(a){return Da(a)?
a:[a]}function o(){var a=arguments,b,c,d=a.length;for(b=0;b<d;b++)if(c=a[b],typeof c!=="undefined"&&c!==null)return c}function L(a,b){if(Fa&&b&&b.opacity!==y)b.filter="alpha(opacity="+b.opacity*100+")";v(a.style,b)}function U(a,b,c,d,e){a=z.createElement(a);b&&v(a,b);e&&L(a,{padding:0,border:S,margin:0});c&&L(a,c);d&&d.appendChild(a);return a}function ea(a,b){var c=function(){};c.prototype=new a;v(c.prototype,b);return c}function ua(a,b,c,d){var e=N.lang,f=b===-1?((a||0).toString().split(".")[1]||
"").length:isNaN(b=Q(b))?2:b,b=c===void 0?e.decimalPoint:c,d=d===void 0?e.thousandsSep:d,e=a<0?"-":"",c=String(u(a=Q(+a||0).toFixed(f))),g=c.length>3?c.length%3:0;return e+(g?c.substr(0,g)+d:"")+c.substr(g).replace(/(\d{3})(?=\d)/g,"$1"+d)+(f?b+Q(a-c).toFixed(f).slice(2):"")}function va(a,b){return Array((b||2)+1-String(a).length).join(0)+a}function zb(a,b,c){var d=a[b];a[b]=function(){var a=Array.prototype.slice.call(arguments);a.unshift(d);return c.apply(this,a)}}function wa(a,b){for(var c="{",
d=!1,e,f,g,h,i,j=[];(c=a.indexOf(c))!==-1;){e=a.slice(0,c);if(d){f=e.split(":");g=f.shift().split(".");i=g.length;e=b;for(h=0;h<i;h++)e=e[g[h]];if(f.length)f=f.join(":"),g=/\.([0-9])/,h=N.lang,i=void 0,/f$/.test(f)?(i=(i=f.match(g))?i[1]:-1,e=ua(e,i,h.decimalPoint,f.indexOf(",")>-1?h.thousandsSep:"")):e=Ua(f,e)}j.push(e);a=a.slice(c+1);c=(d=!d)?"}":"{"}j.push(a);return j.join("")}function ib(a,b,c,d){var e,c=o(c,1);e=a/c;b||(b=[1,2,2.5,5,10],d&&d.allowDecimals===!1&&(c===1?b=[1,2,5,10]:c<=0.1&&(b=
[1/c])));for(d=0;d<b.length;d++)if(a=b[d],e<=(b[d]+(b[d+1]||b[d]))/2)break;a*=c;return a}function Ab(a,b){var c=b||[[Bb,[1,2,5,10,20,25,50,100,200,500]],[jb,[1,2,5,10,15,30]],[Va,[1,2,5,10,15,30]],[Oa,[1,2,3,4,6,8,12]],[oa,[1,2]],[Wa,[1,2]],[Pa,[1,2,3,4,6]],[xa,null]],d=c[c.length-1],e=E[d[0]],f=d[1],g;for(g=0;g<c.length;g++)if(d=c[g],e=E[d[0]],f=d[1],c[g+1]&&a<=(e*f[f.length-1]+E[c[g+1][0]])/2)break;e===E[xa]&&a<5*e&&(f=[1,2,5]);e===E[xa]&&a<5*e&&(f=[1,2,5]);c=ib(a/e,f);return{unitRange:e,count:c,
unitName:d[0]}}function Cb(a,b,c,d){var e=[],f={},g=N.global.useUTC,h,i=new Date(b),j=a.unitRange,k=a.count;if(r(b)){j>=E[jb]&&(i.setMilliseconds(0),i.setSeconds(j>=E[Va]?0:k*T(i.getSeconds()/k)));if(j>=E[Va])i[Db](j>=E[Oa]?0:k*T(i[kb]()/k));if(j>=E[Oa])i[Eb](j>=E[oa]?0:k*T(i[lb]()/k));if(j>=E[oa])i[mb](j>=E[Pa]?1:k*T(i[Qa]()/k));j>=E[Pa]&&(i[Fb](j>=E[xa]?0:k*T(i[Xa]()/k)),h=i[Ya]());j>=E[xa]&&(h-=h%k,i[Gb](h));if(j===E[Wa])i[mb](i[Qa]()-i[nb]()+o(d,1));b=1;h=i[Ya]();for(var d=i.getTime(),m=i[Xa](),
l=i[Qa](),p=g?0:(864E5+i.getTimezoneOffset()*6E4)%864E5;d<c;)e.push(d),j===E[xa]?d=Za(h+b*k,0):j===E[Pa]?d=Za(h,m+b*k):!g&&(j===E[oa]||j===E[Wa])?d=Za(h,m,l+b*k*(j===E[oa]?1:7)):d+=j*k,b++;e.push(d);n(ob(e,function(a){return j<=E[Oa]&&a%E[oa]===p}),function(a){f[a]=oa})}e.info=v(a,{higherRanks:f,totalRange:j*k});return e}function Hb(){this.symbol=this.color=0}function Ib(a,b){var c=a.length,d,e;for(e=0;e<c;e++)a[e].ss_i=e;a.sort(function(a,c){d=b(a,c);return d===0?a.ss_i-c.ss_i:d});for(e=0;e<c;e++)delete a[e].ss_i}
function Ga(a){for(var b=a.length,c=a[0];b--;)a[b]<c&&(c=a[b]);return c}function pa(a){for(var b=a.length,c=a[0];b--;)a[b]>c&&(c=a[b]);return c}function Ha(a,b){for(var c in a)a[c]&&a[c]!==b&&a[c].destroy&&a[c].destroy(),delete a[c]}function Ra(a){$a||($a=U(ya));a&&$a.appendChild(a);$a.innerHTML=""}function qa(a,b){var c="Highcharts error #"+a+": www.highcharts.com/errors/"+a;if(b)throw c;else O.console&&console.log(c)}function ia(a){return parseFloat(a.toPrecision(14))}function Ia(a,b){za=o(a,b.animation)}
function Jb(){var a=N.global.useUTC,b=a?"getUTC":"get",c=a?"setUTC":"set";Za=a?Date.UTC:function(a,b,c,g,h,i){return(new Date(a,b,o(c,1),o(g,0),o(h,0),o(i,0))).getTime()};kb=b+"Minutes";lb=b+"Hours";nb=b+"Day";Qa=b+"Date";Xa=b+"Month";Ya=b+"FullYear";Db=c+"Minutes";Eb=c+"Hours";mb=c+"Date";Fb=c+"Month";Gb=c+"FullYear"}function ra(){}function Ja(a,b,c,d){this.axis=a;this.pos=b;this.type=c||"";this.isNew=!0;!c&&!d&&this.addLabel()}function pb(a,b){this.axis=a;if(b)this.options=b,this.id=b.id}function Kb(a,
b,c,d,e,f){var g=a.chart.inverted;this.axis=a;this.isNegative=c;this.options=b;this.x=d;this.stack=e;this.percent=f==="percent";this.alignOptions={align:b.align||(g?c?"left":"right":"center"),verticalAlign:b.verticalAlign||(g?"middle":c?"bottom":"top"),y:o(b.y,g?4:c?14:-6),x:o(b.x,g?c?-6:6:0)};this.textAlign=b.textAlign||(g?c?"right":"left":"center")}function ab(){this.init.apply(this,arguments)}function qb(){this.init.apply(this,arguments)}function rb(a,b){this.init(a,b)}function sb(a,b){this.init(a,
b)}function tb(){this.init.apply(this,arguments)}var y,z=document,O=window,I=Math,t=I.round,T=I.floor,ja=I.ceil,q=I.max,K=I.min,Q=I.abs,Y=I.cos,ca=I.sin,Ka=I.PI,bb=Ka*2/360,Aa=navigator.userAgent,Lb=O.opera,Fa=/msie/i.test(Aa)&&!Lb,cb=z.documentMode===8,db=/AppleWebKit/.test(Aa),eb=/Firefox/.test(Aa),Mb=/(Mobile|Android|Windows Phone)/.test(Aa),sa="http://www.w3.org/2000/svg",Z=!!z.createElementNS&&!!z.createElementNS(sa,"svg").createSVGRect,Sb=eb&&parseInt(Aa.split("Firefox/")[1],10)<4,$=!Z&&!Fa&&
!!z.createElement("canvas").getContext,Sa,fb=z.documentElement.ontouchstart!==y,Nb={},ub=0,$a,N,Ua,za,vb,E,ta=function(){},Ba=[],ya="div",S="none",Ob="rgba(192,192,192,"+(Z?1.0E-4:0.002)+")",Bb="millisecond",jb="second",Va="minute",Oa="hour",oa="day",Wa="week",Pa="month",xa="year",Pb="stroke-width",Za,kb,lb,nb,Qa,Xa,Ya,Db,Eb,mb,Fb,Gb,aa={};O.Highcharts=O.Highcharts?qa(16,!0):{};Ua=function(a,b,c){if(!r(b)||isNaN(b))return"Invalid date";var a=o(a,"%Y-%m-%d %H:%M:%S"),d=new Date(b),e,f=d[lb](),g=d[nb](),
h=d[Qa](),i=d[Xa](),j=d[Ya](),k=N.lang,m=k.weekdays,d=v({a:m[g].substr(0,3),A:m[g],d:va(h),e:h,b:k.shortMonths[i],B:k.months[i],m:va(i+1),y:j.toString().substr(2,2),Y:j,H:va(f),I:va(f%12||12),l:f%12||12,M:va(d[kb]()),p:f<12?"AM":"PM",P:f<12?"am":"pm",S:va(d.getSeconds()),L:va(t(b%1E3),3)},Highcharts.dateFormats);for(e in d)for(;a.indexOf("%"+e)!==-1;)a=a.replace("%"+e,typeof d[e]==="function"?d[e](b):d[e]);return c?a.substr(0,1).toUpperCase()+a.substr(1):a};Hb.prototype={wrapColor:function(a){if(this.color>=
a)this.color=0},wrapSymbol:function(a){if(this.symbol>=a)this.symbol=0}};E=function(){for(var a=0,b=arguments,c=b.length,d={};a<c;a++)d[b[a++]]=b[a];return d}(Bb,1,jb,1E3,Va,6E4,Oa,36E5,oa,864E5,Wa,6048E5,Pa,26784E5,xa,31556952E3);vb={init:function(a,b,c){var b=b||"",d=a.shift,e=b.indexOf("C")>-1,f=e?7:3,g,b=b.split(" "),c=[].concat(c),h,i,j=function(a){for(g=a.length;g--;)a[g]==="M"&&a.splice(g+1,0,a[g+1],a[g+2],a[g+1],a[g+2])};e&&(j(b),j(c));a.isArea&&(h=b.splice(b.length-6,6),i=c.splice(c.length-
6,6));if(d<=c.length/f)for(;d--;)c=[].concat(c).splice(0,f).concat(c);a.shift=0;if(b.length)for(a=c.length;b.length<a;)d=[].concat(b).splice(b.length-f,f),e&&(d[f-6]=d[f-2],d[f-5]=d[f-1]),b=b.concat(d);h&&(b=b.concat(h),c=c.concat(i));return[b,c]},step:function(a,b,c,d){var e=[],f=a.length;if(c===1)e=d;else if(f===b.length&&c<1)for(;f--;)d=parseFloat(a[f]),e[f]=isNaN(d)?a[f]:c*parseFloat(b[f]-d)+d;else e=b;return e}};(function(a){O.HighchartsAdapter=O.HighchartsAdapter||a&&{init:function(b){var c=
a.fx,d=c.step,e,f=a.Tween,g=f&&f.propHooks;e=a.cssHooks.opacity;a.extend(a.easing,{easeOutQuad:function(a,b,c,d,e){return-d*(b/=e)*(b-2)+c}});a.each(["cur","_default","width","height","opacity"],function(a,b){var e=d,k,m;b==="cur"?e=c.prototype:b==="_default"&&f&&(e=g[b],b="set");(k=e[b])&&(e[b]=function(c){c=a?c:this;m=c.elem;return m.attr?m.attr(c.prop,b==="cur"?y:c.now):k.apply(this,arguments)})});zb(e,"get",function(a,b,c){return b.attr?b.opacity||0:a.call(this,b,c)});e=function(a){var c=a.elem,
d;if(!a.started)d=b.init(c,c.d,c.toD),a.start=d[0],a.end=d[1],a.started=!0;c.attr("d",b.step(a.start,a.end,a.pos,c.toD))};f?g.d={set:e}:d.d=e;this.each=Array.prototype.forEach?function(a,b){return Array.prototype.forEach.call(a,b)}:function(a,b){for(var c=0,d=a.length;c<d;c++)if(b.call(a[c],a[c],c,a)===!1)return c};a.fn.highcharts=function(){var a="Chart",b=arguments,c,d;fa(b[0])&&(a=b[0],b=Array.prototype.slice.call(b,1));c=b[0];if(c!==y)c.chart=c.chart||{},c.chart.renderTo=this[0],new Highcharts[a](c,
b[1]),d=this;c===y&&(d=Ba[A(this[0],"data-highcharts-chart")]);return d}},getScript:a.getScript,inArray:a.inArray,adapterRun:function(b,c){return a(b)[c]()},grep:a.grep,map:function(a,c){for(var d=[],e=0,f=a.length;e<f;e++)d[e]=c.call(a[e],a[e],e,a);return d},offset:function(b){return a(b).offset()},addEvent:function(b,c,d){a(b).bind(c,d)},removeEvent:function(b,c,d){var e=z.removeEventListener?"removeEventListener":"detachEvent";z[e]&&b&&!b[e]&&(b[e]=function(){});a(b).unbind(c,d)},fireEvent:function(b,
c,d,e){var f=a.Event(c),g="detached"+c,h;!Fa&&d&&(delete d.layerX,delete d.layerY);v(f,d);b[c]&&(b[g]=b[c],b[c]=null);a.each(["preventDefault","stopPropagation"],function(a,b){var c=f[b];f[b]=function(){try{c.call(f)}catch(a){b==="preventDefault"&&(h=!0)}}});a(b).trigger(f);b[g]&&(b[c]=b[g],b[g]=null);e&&!f.isDefaultPrevented()&&!h&&e(f)},washMouseEvent:function(a){var c=a.originalEvent||a;if(c.pageX===y)c.pageX=a.pageX,c.pageY=a.pageY;return c},animate:function(b,c,d){var e=a(b);if(!b.style)b.style=
{};if(c.d)b.toD=c.d,c.d=1;e.stop();e.animate(c,d)},stop:function(b){a(b).stop()}}})(O.jQuery);var W=O.HighchartsAdapter,M=W||{};W&&W.init.call(W,vb);var gb=M.adapterRun,Tb=M.getScript,la=M.inArray,n=M.each,ob=M.grep,Ub=M.offset,La=M.map,J=M.addEvent,ba=M.removeEvent,D=M.fireEvent,Qb=M.washMouseEvent,wb=M.animate,Ta=M.stop,M={enabled:!0,align:"center",x:0,y:15,style:{color:"#666",cursor:"default",fontSize:"11px",lineHeight:"14px"}};N={colors:"#2f7ed8,#0d233a,#8bbc21,#910000,#1aadce,#492970,#f28f43,#77a1e5,#c42525,#a6c96a".split(","),
symbols:["circle","diamond","square","triangle","triangle-down"],lang:{loading:"Loading...",months:"January,February,March,April,May,June,July,August,September,October,November,December".split(","),shortMonths:"Jan,Feb,Mar,Apr,May,Jun,Jul,Aug,Sep,Oct,Nov,Dec".split(","),weekdays:"Sunday,Monday,Tuesday,Wednesday,Thursday,Friday,Saturday".split(","),decimalPoint:".",numericSymbols:"k,M,G,T,P,E".split(","),resetZoom:"Reset zoom",resetZoomTitle:"Reset zoom level 1:1",thousandsSep:","},global:{useUTC:!0,
canvasToolsURL:"http://code.highcharts.com/3.0.2/modules/canvas-tools.js",VMLRadialGradientURL:"http://code.highcharts.com/3.0.2/gfx/vml-radial-gradient.png"},chart:{borderColor:"#4572A7",borderRadius:5,defaultSeriesType:"line",ignoreHiddenSeries:!0,spacingTop:10,spacingRight:10,spacingBottom:15,spacingLeft:10,style:{fontFamily:'"Lucida Grande", "Lucida Sans Unicode", Verdana, Arial, Helvetica, sans-serif',fontSize:"12px"},backgroundColor:"#FFFFFF",plotBorderColor:"#C0C0C0",resetZoomButton:{theme:{zIndex:20},
position:{align:"right",x:-10,y:10}}},title:{text:"Chart title",align:"center",y:15,style:{color:"#274b6d",fontSize:"16px"}},subtitle:{text:"",align:"center",y:30,style:{color:"#4d759e"}},plotOptions:{line:{allowPointSelect:!1,showCheckbox:!1,animation:{duration:1E3},events:{},lineWidth:2,marker:{enabled:!0,lineWidth:0,radius:4,lineColor:"#FFFFFF",states:{hover:{enabled:!0},select:{fillColor:"#FFFFFF",lineColor:"#000000",lineWidth:2}}},point:{events:{}},dataLabels:x(M,{enabled:!1,formatter:function(){return ua(this.y,
-1)},verticalAlign:"bottom",y:0}),cropThreshold:300,pointRange:0,showInLegend:!0,states:{hover:{marker:{}},select:{marker:{}}},stickyTracking:!0}},labels:{style:{position:"absolute",color:"#3E576F"}},legend:{enabled:!0,align:"center",layout:"horizontal",labelFormatter:function(){return this.name},borderWidth:1,borderColor:"#909090",borderRadius:5,navigation:{activeColor:"#274b6d",inactiveColor:"#CCC"},shadow:!1,itemStyle:{cursor:"pointer",color:"#274b6d",fontSize:"12px"},itemHoverStyle:{color:"#000"},
itemHiddenStyle:{color:"#CCC"},itemCheckboxStyle:{position:"absolute",width:"13px",height:"13px"},symbolWidth:16,symbolPadding:5,verticalAlign:"bottom",x:0,y:0,title:{style:{fontWeight:"bold"}}},loading:{labelStyle:{fontWeight:"bold",position:"relative",top:"1em"},style:{position:"absolute",backgroundColor:"white",opacity:0.5,textAlign:"center"}},tooltip:{enabled:!0,animation:Z,backgroundColor:"rgba(255, 255, 255, .85)",borderWidth:1,borderRadius:3,dateTimeLabelFormats:{millisecond:"%A, %b %e, %H:%M:%S.%L",
second:"%A, %b %e, %H:%M:%S",minute:"%A, %b %e, %H:%M",hour:"%A, %b %e, %H:%M",day:"%A, %b %e, %Y",week:"Week from %A, %b %e, %Y",month:"%B %Y",year:"%Y"},headerFormat:'<span style="font-size: 10px">{point.key}</span><br/>',pointFormat:'<span style="color:{series.color}">{series.name}</span>: <b>{point.y}</b><br/>',shadow:!0,snap:Mb?25:10,style:{color:"#333333",cursor:"default",fontSize:"12px",padding:"8px",whiteSpace:"nowrap"}},credits:{enabled:!0,text:"Highcharts.com",href:"http://www.highcharts.com",
position:{align:"right",x:-10,verticalAlign:"bottom",y:-5},style:{cursor:"pointer",color:"#909090",fontSize:"9px"}}};var X=N.plotOptions,W=X.line;Jb();var ma=function(a){var b=[],c,d;(function(a){a&&a.stops?d=La(a.stops,function(a){return ma(a[1])}):(c=/rgba\(\s*([0-9]{1,3})\s*,\s*([0-9]{1,3})\s*,\s*([0-9]{1,3})\s*,\s*([0-9]?(?:\.[0-9]+)?)\s*\)/.exec(a))?b=[u(c[1]),u(c[2]),u(c[3]),parseFloat(c[4],10)]:(c=/#([a-fA-F0-9]{2})([a-fA-F0-9]{2})([a-fA-F0-9]{2})/.exec(a))?b=[u(c[1],16),u(c[2],16),u(c[3],
16),1]:(c=/rgb\(\s*([0-9]{1,3})\s*,\s*([0-9]{1,3})\s*,\s*([0-9]{1,3})\s*\)/.exec(a))&&(b=[u(c[1]),u(c[2]),u(c[3]),1])})(a);return{get:function(c){var f;d?(f=x(a),f.stops=[].concat(f.stops),n(d,function(a,b){f.stops[b]=[f.stops[b][0],a.get(c)]})):f=b&&!isNaN(b[0])?c==="rgb"?"rgb("+b[0]+","+b[1]+","+b[2]+")":c==="a"?b[3]:"rgba("+b.join(",")+")":a;return f},brighten:function(a){if(d)n(d,function(b){b.brighten(a)});else if(Ea(a)&&a!==0){var c;for(c=0;c<3;c++)b[c]+=u(a*255),b[c]<0&&(b[c]=0),b[c]>255&&
(b[c]=255)}return this},rgba:b,setOpacity:function(a){b[3]=a;return this}}};ra.prototype={init:function(a,b){this.element=b==="span"?U(b):z.createElementNS(sa,b);this.renderer=a;this.attrSetters={}},opacity:1,animate:function(a,b,c){b=o(b,za,!0);Ta(this);if(b){b=x(b);if(c)b.complete=c;wb(this,a,b)}else this.attr(a),c&&c()},attr:function(a,b){var c,d,e,f,g=this.element,h=g.nodeName.toLowerCase(),i=this.renderer,j,k=this.attrSetters,m=this.shadows,l,p,s=this;fa(a)&&r(b)&&(c=a,a={},a[c]=b);if(fa(a))c=
a,h==="circle"?c={x:"cx",y:"cy"}[c]||c:c==="strokeWidth"&&(c="stroke-width"),s=A(g,c)||this[c]||0,c!=="d"&&c!=="visibility"&&(s=parseFloat(s));else{for(c in a)if(j=!1,d=a[c],e=k[c]&&k[c].call(this,d,c),e!==!1){e!==y&&(d=e);if(c==="d")d&&d.join&&(d=d.join(" ")),/(NaN| {2}|^$)/.test(d)&&(d="M 0 0");else if(c==="x"&&h==="text")for(e=0;e<g.childNodes.length;e++)f=g.childNodes[e],A(f,"x")===A(g,"x")&&A(f,"x",d);else if(this.rotation&&(c==="x"||c==="y"))p=!0;else if(c==="fill")d=i.color(d,g,c);else if(h===
"circle"&&(c==="x"||c==="y"))c={x:"cx",y:"cy"}[c]||c;else if(h==="rect"&&c==="r")A(g,{rx:d,ry:d}),j=!0;else if(c==="translateX"||c==="translateY"||c==="rotation"||c==="verticalAlign"||c==="scaleX"||c==="scaleY")j=p=!0;else if(c==="stroke")d=i.color(d,g,c);else if(c==="dashstyle")if(c="stroke-dasharray",d=d&&d.toLowerCase(),d==="solid")d=S;else{if(d){d=d.replace("shortdashdotdot","3,1,1,1,1,1,").replace("shortdashdot","3,1,1,1").replace("shortdot","1,1,").replace("shortdash","3,1,").replace("longdash",
"8,3,").replace(/dot/g,"1,3,").replace("dash","4,3,").replace(/,$/,"").split(",");for(e=d.length;e--;)d[e]=u(d[e])*a["stroke-width"];d=d.join(",")}}else if(c==="width")d=u(d);else if(c==="align")c="text-anchor",d={left:"start",center:"middle",right:"end"}[d];else if(c==="title")e=g.getElementsByTagName("title")[0],e||(e=z.createElementNS(sa,"title"),g.appendChild(e)),e.textContent=d;c==="strokeWidth"&&(c="stroke-width");if(c==="stroke-width"||c==="stroke"){this[c]=d;if(this.stroke&&this["stroke-width"])A(g,
"stroke",this.stroke),A(g,"stroke-width",this["stroke-width"]),this.hasStroke=!0;else if(c==="stroke-width"&&d===0&&this.hasStroke)g.removeAttribute("stroke"),this.hasStroke=!1;j=!0}this.symbolName&&/^(x|y|width|height|r|start|end|innerR|anchorX|anchorY)/.test(c)&&(l||(this.symbolAttr(a),l=!0),j=!0);if(m&&/^(width|height|visibility|x|y|d|transform)$/.test(c))for(e=m.length;e--;)A(m[e],c,c==="height"?q(d-(m[e].cutHeight||0),0):d);if((c==="width"||c==="height")&&h==="rect"&&d<0)d=0;this[c]=d;c==="text"?
(d!==this.textStr&&delete this.bBox,this.textStr=d,this.added&&i.buildText(this)):j||A(g,c,d)}p&&this.updateTransform()}return s},addClass:function(a){A(this.element,"class",A(this.element,"class")+" "+a);return this},symbolAttr:function(a){var b=this;n("x,y,r,start,end,width,height,innerR,anchorX,anchorY".split(","),function(c){b[c]=o(a[c],b[c])});b.attr({d:b.renderer.symbols[b.symbolName](b.x,b.y,b.width,b.height,b)})},clip:function(a){return this.attr("clip-path",a?"url("+this.renderer.url+"#"+
a.id+")":S)},crisp:function(a,b,c,d,e){var f,g={},h={},i,a=a||this.strokeWidth||this.attr&&this.attr("stroke-width")||0;i=t(a)%2/2;h.x=T(b||this.x||0)+i;h.y=T(c||this.y||0)+i;h.width=T((d||this.width||0)-2*i);h.height=T((e||this.height||0)-2*i);h.strokeWidth=a;for(f in h)this[f]!==h[f]&&(this[f]=g[f]=h[f]);return g},css:function(a){var b=this.element,c=a&&a.width&&b.nodeName.toLowerCase()==="text",d,e="",f=function(a,b){return"-"+b.toLowerCase()};if(a&&a.color)a.fill=a.color;this.styles=a=v(this.styles,
a);$&&c&&delete a.width;if(Fa&&!Z)c&&delete a.width,L(this.element,a);else{for(d in a)e+=d.replace(/([A-Z])/g,f)+":"+a[d]+";";A(b,"style",e)}c&&this.added&&this.renderer.buildText(this);return this},on:function(a,b){if(fb&&a==="click")this.element.ontouchstart=function(a){a.preventDefault();b()};this.element["on"+a]=b;return this},setRadialReference:function(a){this.element.radialReference=a;return this},translate:function(a,b){return this.attr({translateX:a,translateY:b})},invert:function(){this.inverted=
!0;this.updateTransform();return this},htmlCss:function(a){var b=this.element;if(b=a&&b.tagName==="SPAN"&&a.width)delete a.width,this.textWidth=b,this.updateTransform();this.styles=v(this.styles,a);L(this.element,a);return this},htmlGetBBox:function(){var a=this.element,b=this.bBox;if(!b){if(a.nodeName==="text")a.style.position="absolute";b=this.bBox={x:a.offsetLeft,y:a.offsetTop,width:a.offsetWidth,height:a.offsetHeight}}return b},htmlUpdateTransform:function(){if(this.added){var a=this.renderer,
b=this.element,c=this.translateX||0,d=this.translateY||0,e=this.x||0,f=this.y||0,g=this.textAlign||"left",h={left:0,center:0.5,right:1}[g],i=g&&g!=="left",j=this.shadows;L(b,{marginLeft:c,marginTop:d});j&&n(j,function(a){L(a,{marginLeft:c+1,marginTop:d+1})});this.inverted&&n(b.childNodes,function(c){a.invertChild(c,b)});if(b.tagName==="SPAN"){var k,m,j=this.rotation,l,p=0,s=1,p=0,xb;l=u(this.textWidth);var B=this.xCorr||0,w=this.yCorr||0,G=[j,g,b.innerHTML,this.textWidth].join(",");k={};if(G!==this.cTT){if(r(j))a.isSVG?
(B=Fa?"-ms-transform":db?"-webkit-transform":eb?"MozTransform":Lb?"-o-transform":"",k[B]=k.transform="rotate("+j+"deg)"):(p=j*bb,s=Y(p),p=ca(p),k.filter=j?["progid:DXImageTransform.Microsoft.Matrix(M11=",s,", M12=",-p,", M21=",p,", M22=",s,", sizingMethod='auto expand')"].join(""):S),L(b,k);k=o(this.elemWidth,b.offsetWidth);m=o(this.elemHeight,b.offsetHeight);if(k>l&&/[ \-]/.test(b.textContent||b.innerText))L(b,{width:l+"px",display:"block",whiteSpace:"normal"}),k=l;l=a.fontMetrics(b.style.fontSize).b;
B=s<0&&-k;w=p<0&&-m;xb=s*p<0;B+=p*l*(xb?1-h:h);w-=s*l*(j?xb?h:1-h:1);i&&(B-=k*h*(s<0?-1:1),j&&(w-=m*h*(p<0?-1:1)),L(b,{textAlign:g}));this.xCorr=B;this.yCorr=w}L(b,{left:e+B+"px",top:f+w+"px"});if(db)m=b.offsetHeight;this.cTT=G}}else this.alignOnAdd=!0},updateTransform:function(){var a=this.translateX||0,b=this.translateY||0,c=this.scaleX,d=this.scaleY,e=this.inverted,f=this.rotation;e&&(a+=this.attr("width"),b+=this.attr("height"));a=["translate("+a+","+b+")"];e?a.push("rotate(90) scale(-1,1)"):
f&&a.push("rotate("+f+" "+(this.x||0)+" "+(this.y||0)+")");(r(c)||r(d))&&a.push("scale("+o(c,1)+" "+o(d,1)+")");a.length&&A(this.element,"transform",a.join(" "))},toFront:function(){var a=this.element;a.parentNode.appendChild(a);return this},align:function(a,b,c){var d,e,f,g,h={};e=this.renderer;f=e.alignedObjects;if(a){if(this.alignOptions=a,this.alignByTranslate=b,!c||fa(c))this.alignTo=d=c||"renderer",ga(f,this),f.push(this),c=null}else a=this.alignOptions,b=this.alignByTranslate,d=this.alignTo;
c=o(c,e[d],e);d=a.align;e=a.verticalAlign;f=(c.x||0)+(a.x||0);g=(c.y||0)+(a.y||0);if(d==="right"||d==="center")f+=(c.width-(a.width||0))/{right:1,center:2}[d];h[b?"translateX":"x"]=t(f);if(e==="bottom"||e==="middle")g+=(c.height-(a.height||0))/({bottom:1,middle:2}[e]||1);h[b?"translateY":"y"]=t(g);this[this.placed?"animate":"attr"](h);this.placed=!0;this.alignAttr=h;return this},getBBox:function(){var a=this.bBox,b=this.renderer,c,d=this.rotation;c=this.element;var e=this.styles,f=d*bb;if(!a){if(c.namespaceURI===
sa||b.forExport){try{a=c.getBBox?v({},c.getBBox()):{width:c.offsetWidth,height:c.offsetHeight}}catch(g){}if(!a||a.width<0)a={width:0,height:0}}else a=this.htmlGetBBox();if(b.isSVG){b=a.width;c=a.height;if(Fa&&e&&e.fontSize==="11px"&&c.toPrecision(3)==="22.7")a.height=c=14;if(d)a.width=Q(c*ca(f))+Q(b*Y(f)),a.height=Q(c*Y(f))+Q(b*ca(f))}this.bBox=a}return a},show:function(){return this.attr({visibility:"visible"})},hide:function(){return this.attr({visibility:"hidden"})},fadeOut:function(a){var b=this;
b.animate({opacity:0},{duration:a||150,complete:function(){b.hide()}})},add:function(a){var b=this.renderer,c=a||b,d=c.element||b.box,e=d.childNodes,f=this.element,g=A(f,"zIndex"),h;if(a)this.parentGroup=a;this.parentInverted=a&&a.inverted;this.textStr!==void 0&&b.buildText(this);if(g)c.handleZ=!0,g=u(g);if(c.handleZ)for(c=0;c<e.length;c++)if(a=e[c],b=A(a,"zIndex"),a!==f&&(u(b)>g||!r(g)&&r(b))){d.insertBefore(f,a);h=!0;break}h||d.appendChild(f);this.added=!0;D(this,"add");return this},safeRemoveChild:function(a){var b=
a.parentNode;b&&b.removeChild(a)},destroy:function(){var a=this,b=a.element||{},c=a.shadows,d,e;b.onclick=b.onmouseout=b.onmouseover=b.onmousemove=b.point=null;Ta(a);if(a.clipPath)a.clipPath=a.clipPath.destroy();if(a.stops){for(e=0;e<a.stops.length;e++)a.stops[e]=a.stops[e].destroy();a.stops=null}a.safeRemoveChild(b);c&&n(c,function(b){a.safeRemoveChild(b)});a.alignTo&&ga(a.renderer.alignedObjects,a);for(d in a)delete a[d];return null},shadow:function(a,b,c){var d=[],e,f,g=this.element,h,i,j,k;if(a){i=
o(a.width,3);j=(a.opacity||0.15)/i;k=this.parentInverted?"(-1,-1)":"("+o(a.offsetX,1)+", "+o(a.offsetY,1)+")";for(e=1;e<=i;e++){f=g.cloneNode(0);h=i*2+1-2*e;A(f,{isShadow:"true",stroke:a.color||"black","stroke-opacity":j*e,"stroke-width":h,transform:"translate"+k,fill:S});if(c)A(f,"height",q(A(f,"height")-h,0)),f.cutHeight=h;b?b.element.appendChild(f):g.parentNode.insertBefore(f,g);d.push(f)}this.shadows=d}return this}};var Ca=function(){this.init.apply(this,arguments)};Ca.prototype={Element:ra,init:function(a,
b,c,d){var e=location,f;f=this.createElement("svg").attr({xmlns:sa,version:"1.1"});a.appendChild(f.element);this.isSVG=!0;this.box=f.element;this.boxWrapper=f;this.alignedObjects=[];this.url=(eb||db)&&z.getElementsByTagName("base").length?e.href.replace(/#.*?$/,"").replace(/([\('\)])/g,"\\$1").replace(/ /g,"%20"):"";this.createElement("desc").add().element.appendChild(z.createTextNode("Created with Highcharts 3.0.2"));this.defs=this.createElement("defs").add();this.forExport=d;this.gradients={};this.setSize(b,
c,!1);var g;if(eb&&a.getBoundingClientRect)this.subPixelFix=b=function(){L(a,{left:0,top:0});g=a.getBoundingClientRect();L(a,{left:ja(g.left)-g.left+"px",top:ja(g.top)-g.top+"px"})},b(),J(O,"resize",b)},isHidden:function(){return!this.boxWrapper.getBBox().width},destroy:function(){var a=this.defs;this.box=null;this.boxWrapper=this.boxWrapper.destroy();Ha(this.gradients||{});this.gradients=null;if(a)this.defs=a.destroy();this.subPixelFix&&ba(O,"resize",this.subPixelFix);return this.alignedObjects=
null},createElement:function(a){var b=new this.Element;b.init(this,a);return b},draw:function(){},buildText:function(a){for(var b=a.element,c=this,d=c.forExport,e=o(a.textStr,"").toString().replace(/<(b|strong)>/g,'<span style="font-weight:bold">').replace(/<(i|em)>/g,'<span style="font-style:italic">').replace(/<a/g,"<span").replace(/<\/(b|strong|i|em|a)>/g,"</span>").split(/<br.*?>/g),f=b.childNodes,g=/style="([^"]+)"/,h=/href="([^"]+)"/,i=A(b,"x"),j=a.styles,k=j&&j.width&&u(j.width),m=j&&j.lineHeight,
l=f.length;l--;)b.removeChild(f[l]);k&&!a.added&&this.box.appendChild(b);e[e.length-1]===""&&e.pop();n(e,function(e,f){var l,o=0,e=e.replace(/<span/g,"|||<span").replace(/<\/span>/g,"</span>|||");l=e.split("|||");n(l,function(e){if(e!==""||l.length===1){var p={},n=z.createElementNS(sa,"tspan"),q;g.test(e)&&(q=e.match(g)[1].replace(/(;| |^)color([ :])/,"$1fill$2"),A(n,"style",q));h.test(e)&&!d&&(A(n,"onclick",'location.href="'+e.match(h)[1]+'"'),L(n,{cursor:"pointer"}));e=(e.replace(/<(.|\n)*?>/g,
"")||" ").replace(/&lt;/g,"<").replace(/&gt;/g,">");n.appendChild(z.createTextNode(e));o?p.dx=0:p.x=i;A(n,p);!o&&f&&(!Z&&d&&L(n,{display:"block"}),A(n,"dy",m||c.fontMetrics(/px$/.test(n.style.fontSize)?n.style.fontSize:j.fontSize).h,db&&n.offsetHeight));b.appendChild(n);o++;if(k)for(var e=e.replace(/([^\^])-/g,"$1- ").split(" "),r,t=[];e.length||t.length;)delete a.bBox,r=a.getBBox().width,p=r>k,!p||e.length===1?(e=t,t=[],e.length&&(n=z.createElementNS(sa,"tspan"),A(n,{dy:m||16,x:i}),q&&A(n,"style",
q),b.appendChild(n),r>k&&(k=r))):(n.removeChild(n.firstChild),t.unshift(e.pop())),e.length&&n.appendChild(z.createTextNode(e.join(" ").replace(/- /g,"-")))}})})},button:function(a,b,c,d,e,f,g){var h=this.label(a,b,c,null,null,null,null,null,"button"),i=0,j,k,m,l,p,a={x1:0,y1:0,x2:0,y2:1},e=x({"stroke-width":1,stroke:"#CCCCCC",fill:{linearGradient:a,stops:[[0,"#FEFEFE"],[1,"#F6F6F6"]]},r:2,padding:5,style:{color:"black"}},e);m=e.style;delete e.style;f=x(e,{stroke:"#68A",fill:{linearGradient:a,stops:[[0,
"#FFF"],[1,"#ACF"]]}},f);l=f.style;delete f.style;g=x(e,{stroke:"#68A",fill:{linearGradient:a,stops:[[0,"#9BD"],[1,"#CDF"]]}},g);p=g.style;delete g.style;J(h.element,"mouseenter",function(){h.attr(f).css(l)});J(h.element,"mouseleave",function(){j=[e,f,g][i];k=[m,l,p][i];h.attr(j).css(k)});h.setState=function(a){(i=a)?a===2&&h.attr(g).css(p):h.attr(e).css(m)};return h.on("click",function(){d.call(h)}).attr(e).css(v({cursor:"default"},m))},crispLine:function(a,b){a[1]===a[4]&&(a[1]=a[4]=t(a[1])-b%2/
2);a[2]===a[5]&&(a[2]=a[5]=t(a[2])+b%2/2);return a},path:function(a){var b={fill:S};Da(a)?b.d=a:V(a)&&v(b,a);return this.createElement("path").attr(b)},circle:function(a,b,c){a=V(a)?a:{x:a,y:b,r:c};return this.createElement("circle").attr(a)},arc:function(a,b,c,d,e,f){if(V(a))b=a.y,c=a.r,d=a.innerR,e=a.start,f=a.end,a=a.x;return this.symbol("arc",a||0,b||0,c||0,c||0,{innerR:d||0,start:e||0,end:f||0})},rect:function(a,b,c,d,e,f){e=V(a)?a.r:e;e=this.createElement("rect").attr({rx:e,ry:e,fill:S});return e.attr(V(a)?
a:e.crisp(f,a,b,q(c,0),q(d,0)))},setSize:function(a,b,c){var d=this.alignedObjects,e=d.length;this.width=a;this.height=b;for(this.boxWrapper[o(c,!0)?"animate":"attr"]({width:a,height:b});e--;)d[e].align()},g:function(a){var b=this.createElement("g");return r(a)?b.attr({"class":"highcharts-"+a}):b},image:function(a,b,c,d,e){var f={preserveAspectRatio:S};arguments.length>1&&v(f,{x:b,y:c,width:d,height:e});f=this.createElement("image").attr(f);f.element.setAttributeNS?f.element.setAttributeNS("http://www.w3.org/1999/xlink",
"href",a):f.element.setAttribute("hc-svg-href",a);return f},symbol:function(a,b,c,d,e,f){var g,h=this.symbols[a],h=h&&h(t(b),t(c),d,e,f),i=/^url\((.*?)\)$/,j,k;if(h)g=this.path(h),v(g,{symbolName:a,x:b,y:c,width:d,height:e}),f&&v(g,f);else if(i.test(a))k=function(a,b){a.element&&(a.attr({width:b[0],height:b[1]}),a.alignByTranslate||a.translate(t((d-b[0])/2),t((e-b[1])/2)))},j=a.match(i)[1],a=Nb[j],g=this.image(j).attr({x:b,y:c}),g.isImg=!0,a?k(g,a):(g.attr({width:0,height:0}),U("img",{onload:function(){k(g,
Nb[j]=[this.width,this.height])},src:j}));return g},symbols:{circle:function(a,b,c,d){var e=0.166*c;return["M",a+c/2,b,"C",a+c+e,b,a+c+e,b+d,a+c/2,b+d,"C",a-e,b+d,a-e,b,a+c/2,b,"Z"]},square:function(a,b,c,d){return["M",a,b,"L",a+c,b,a+c,b+d,a,b+d,"Z"]},triangle:function(a,b,c,d){return["M",a+c/2,b,"L",a+c,b+d,a,b+d,"Z"]},"triangle-down":function(a,b,c,d){return["M",a,b,"L",a+c,b,a+c/2,b+d,"Z"]},diamond:function(a,b,c,d){return["M",a+c/2,b,"L",a+c,b+d/2,a+c/2,b+d,a,b+d/2,"Z"]},arc:function(a,b,c,d,
e){var f=e.start,c=e.r||c||d,g=e.end-0.001,d=e.innerR,h=e.open,i=Y(f),j=ca(f),k=Y(g),g=ca(g),e=e.end-f<Ka?0:1;return["M",a+c*i,b+c*j,"A",c,c,0,e,1,a+c*k,b+c*g,h?"M":"L",a+d*k,b+d*g,"A",d,d,0,e,0,a+d*i,b+d*j,h?"":"Z"]}},clipRect:function(a,b,c,d){var e="highcharts-"+ub++,f=this.createElement("clipPath").attr({id:e}).add(this.defs),a=this.rect(a,b,c,d,0).add(f);a.id=e;a.clipPath=f;return a},color:function(a,b,c){var d=this,e,f=/^rgba/,g,h,i,j,k,m,l,p=[];a&&a.linearGradient?g="linearGradient":a&&a.radialGradient&&
(g="radialGradient");if(g){c=a[g];h=d.gradients;j=a.stops;b=b.radialReference;Da(c)&&(a[g]=c={x1:c[0],y1:c[1],x2:c[2],y2:c[3],gradientUnits:"userSpaceOnUse"});g==="radialGradient"&&b&&!r(c.gradientUnits)&&(c=x(c,{cx:b[0]-b[2]/2+c.cx*b[2],cy:b[1]-b[2]/2+c.cy*b[2],r:c.r*b[2],gradientUnits:"userSpaceOnUse"}));for(l in c)l!=="id"&&p.push(l,c[l]);for(l in j)p.push(j[l]);p=p.join(",");h[p]?a=h[p].id:(c.id=a="highcharts-"+ub++,h[p]=i=d.createElement(g).attr(c).add(d.defs),i.stops=[],n(j,function(a){f.test(a[1])?
(e=ma(a[1]),k=e.get("rgb"),m=e.get("a")):(k=a[1],m=1);a=d.createElement("stop").attr({offset:a[0],"stop-color":k,"stop-opacity":m}).add(i);i.stops.push(a)}));return"url("+d.url+"#"+a+")"}else return f.test(a)?(e=ma(a),A(b,c+"-opacity",e.get("a")),e.get("rgb")):(b.removeAttribute(c+"-opacity"),a)},text:function(a,b,c,d){var e=N.chart.style,f=$||!Z&&this.forExport;if(d&&!this.forExport)return this.html(a,b,c);b=t(o(b,0));c=t(o(c,0));a=this.createElement("text").attr({x:b,y:c,text:a}).css({fontFamily:e.fontFamily,
fontSize:e.fontSize});f&&a.css({position:"absolute"});a.x=b;a.y=c;return a},html:function(a,b,c){var d=N.chart.style,e=this.createElement("span"),f=e.attrSetters,g=e.element,h=e.renderer;f.text=function(a){a!==g.innerHTML&&delete this.bBox;g.innerHTML=a;return!1};f.x=f.y=f.align=function(a,b){b==="align"&&(b="textAlign");e[b]=a;e.htmlUpdateTransform();return!1};e.attr({text:a,x:t(b),y:t(c)}).css({position:"absolute",whiteSpace:"nowrap",fontFamily:d.fontFamily,fontSize:d.fontSize});e.css=e.htmlCss;
if(h.isSVG)e.add=function(a){var b,c=h.box.parentNode,d=[];if(a){if(b=a.div,!b){for(;a;)d.push(a),a=a.parentGroup;n(d.reverse(),function(a){var d;b=a.div=a.div||U(ya,{className:A(a.element,"class")},{position:"absolute",left:(a.translateX||0)+"px",top:(a.translateY||0)+"px"},b||c);d=b.style;v(a.attrSetters,{translateX:function(a){d.left=a+"px"},translateY:function(a){d.top=a+"px"},visibility:function(a,b){d[b]=a}})})}}else b=c;b.appendChild(g);e.added=!0;e.alignOnAdd&&e.htmlUpdateTransform();return e};
return e},fontMetrics:function(a){var a=u(a||11),a=a<24?a+4:t(a*1.2),b=t(a*0.8);return{h:a,b:b}},label:function(a,b,c,d,e,f,g,h,i){function j(){var a,b;a=o.element.style;w=(Ma===void 0||yb===void 0||s.styles.textAlign)&&o.getBBox();s.width=(Ma||w.width||0)+2*q+hb;s.height=(yb||w.height||0)+2*q;A=q+p.fontMetrics(a&&a.fontSize).b;if(z){if(!B)a=t(-G*q),b=h?-A:0,s.box=B=d?p.symbol(d,a,b,s.width,s.height):p.rect(a,b,s.width,s.height,0,u[Pb]),B.add(s);B.isImg||B.attr(x({width:s.width,height:s.height},u));
u=null}}function k(){var a=s.styles,a=a&&a.textAlign,b=hb+q*(1-G),c;c=h?0:A;if(r(Ma)&&(a==="center"||a==="right"))b+={center:0.5,right:1}[a]*(Ma-w.width);(b!==o.x||c!==o.y)&&o.attr({x:b,y:c});o.x=b;o.y=c}function m(a,b){B?B.attr(a,b):u[a]=b}function l(){o.add(s);s.attr({text:a,x:b,y:c});B&&r(e)&&s.attr({anchorX:e,anchorY:f})}var p=this,s=p.g(i),o=p.text("",0,0,g).attr({zIndex:1}),B,w,G=0,q=3,hb=0,Ma,yb,P,H,C=0,u={},A,g=s.attrSetters,z;J(s,"add",l);g.width=function(a){Ma=a;return!1};g.height=function(a){yb=
a;return!1};g.padding=function(a){r(a)&&a!==q&&(q=a,k());return!1};g.paddingLeft=function(a){r(a)&&a!==hb&&(hb=a,k());return!1};g.align=function(a){G={left:0,center:0.5,right:1}[a];return!1};g.text=function(a,b){o.attr(b,a);j();k();return!1};g[Pb]=function(a,b){z=!0;C=a%2/2;m(b,a);return!1};g.stroke=g.fill=g.r=function(a,b){b==="fill"&&(z=!0);m(b,a);return!1};g.anchorX=function(a,b){e=a;m(b,a+C-P);return!1};g.anchorY=function(a,b){f=a;m(b,a-H);return!1};g.x=function(a){s.x=a;a-=G*((Ma||w.width)+q);
P=t(a);s.attr("translateX",P);return!1};g.y=function(a){H=s.y=t(a);s.attr("translateY",H);return!1};var E=s.css;return v(s,{css:function(a){if(a){var b={},a=x(a);n("fontSize,fontWeight,fontFamily,color,lineHeight,width,textDecoration".split(","),function(c){a[c]!==y&&(b[c]=a[c],delete a[c])});o.css(b)}return E.call(s,a)},getBBox:function(){return{width:w.width+2*q,height:w.height+2*q,x:w.x-q,y:w.y-q}},shadow:function(a){B&&B.shadow(a);return s},destroy:function(){ba(s,"add",l);ba(s.element,"mouseenter");
ba(s.element,"mouseleave");o&&(o=o.destroy());B&&(B=B.destroy());ra.prototype.destroy.call(s);s=p=j=k=m=l=null}})}};Sa=Ca;var F;if(!Z&&!$){Highcharts.VMLElement=F={init:function(a,b){var c=["<",b,' filled="f" stroked="f"'],d=["position: ","absolute",";"],e=b===ya;(b==="shape"||e)&&d.push("left:0;top:0;width:1px;height:1px;");d.push("visibility: ",e?"hidden":"visible");c.push(' style="',d.join(""),'"/>');if(b)c=e||b==="span"||b==="img"?c.join(""):a.prepVML(c),this.element=U(c);this.renderer=a;this.attrSetters=
{}},add:function(a){var b=this.renderer,c=this.element,d=b.box,d=a?a.element||a:d;a&&a.inverted&&b.invertChild(c,d);d.appendChild(c);this.added=!0;this.alignOnAdd&&!this.deferUpdateTransform&&this.updateTransform();D(this,"add");return this},updateTransform:ra.prototype.htmlUpdateTransform,attr:function(a,b){var c,d,e,f=this.element||{},g=f.style,h=f.nodeName,i=this.renderer,j=this.symbolName,k,m=this.shadows,l,p=this.attrSetters,s=this;fa(a)&&r(b)&&(c=a,a={},a[c]=b);if(fa(a))c=a,s=c==="strokeWidth"||
c==="stroke-width"?this.strokeweight:this[c];else for(c in a)if(d=a[c],l=!1,e=p[c]&&p[c].call(this,d,c),e!==!1&&d!==null){e!==y&&(d=e);if(j&&/^(x|y|r|start|end|width|height|innerR|anchorX|anchorY)/.test(c))k||(this.symbolAttr(a),k=!0),l=!0;else if(c==="d"){d=d||[];this.d=d.join(" ");e=d.length;l=[];for(var o;e--;)if(Ea(d[e]))l[e]=t(d[e]*10)-5;else if(d[e]==="Z")l[e]="x";else if(l[e]=d[e],d.isArc&&(d[e]==="wa"||d[e]==="at"))o=d[e]==="wa"?1:-1,l[e+5]===l[e+7]&&(l[e+7]-=o),l[e+6]===l[e+8]&&(l[e+8]-=
o);d=l.join(" ")||"x";f.path=d;if(m)for(e=m.length;e--;)m[e].path=m[e].cutOff?this.cutOffPath(d,m[e].cutOff):d;l=!0}else if(c==="visibility"){if(m)for(e=m.length;e--;)m[e].style[c]=d;h==="DIV"&&(d=d==="hidden"?"-999em":0,cb||(g[c]=d?"visible":"hidden"),c="top");g[c]=d;l=!0}else if(c==="zIndex")d&&(g[c]=d),l=!0;else if(la(c,["x","y","width","height"])!==-1)this[c]=d,c==="x"||c==="y"?c={x:"left",y:"top"}[c]:d=q(0,d),this.updateClipping?(this[c]=d,this.updateClipping()):g[c]=d,l=!0;else if(c==="class"&&
h==="DIV")f.className=d;else if(c==="stroke")d=i.color(d,f,c),c="strokecolor";else if(c==="stroke-width"||c==="strokeWidth")f.stroked=d?!0:!1,c="strokeweight",this[c]=d,Ea(d)&&(d+="px");else if(c==="dashstyle")(f.getElementsByTagName("stroke")[0]||U(i.prepVML(["<stroke/>"]),null,null,f))[c]=d||"solid",this.dashstyle=d,l=!0;else if(c==="fill")if(h==="SPAN")g.color=d;else{if(h!=="IMG")f.filled=d!==S?!0:!1,d=i.color(d,f,c,this),c="fillcolor"}else if(c==="opacity")l=!0;else if(h==="shape"&&c==="rotation")this[c]=
d,f.style.left=-t(ca(d*bb)+1)+"px",f.style.top=t(Y(d*bb))+"px";else if(c==="translateX"||c==="translateY"||c==="rotation")this[c]=d,this.updateTransform(),l=!0;else if(c==="text")this.bBox=null,f.innerHTML=d,l=!0;l||(cb?f[c]=d:A(f,c,d))}return s},clip:function(a){var b=this,c;a?(c=a.members,ga(c,b),c.push(b),b.destroyClip=function(){ga(c,b)},a=a.getCSS(b)):(b.destroyClip&&b.destroyClip(),a={clip:cb?"inherit":"rect(auto)"});return b.css(a)},css:ra.prototype.htmlCss,safeRemoveChild:function(a){a.parentNode&&
Ra(a)},destroy:function(){this.destroyClip&&this.destroyClip();return ra.prototype.destroy.apply(this)},on:function(a,b){this.element["on"+a]=function(){var a=O.event;a.target=a.srcElement;b(a)};return this},cutOffPath:function(a,b){var c,a=a.split(/[ ,]/);c=a.length;if(c===9||c===11)a[c-4]=a[c-2]=u(a[c-2])-10*b;return a.join(" ")},shadow:function(a,b,c){var d=[],e,f=this.element,g=this.renderer,h,i=f.style,j,k=f.path,m,l,p,s;k&&typeof k.value!=="string"&&(k="x");l=k;if(a){p=o(a.width,3);s=(a.opacity||
0.15)/p;for(e=1;e<=3;e++){m=p*2+1-2*e;c&&(l=this.cutOffPath(k.value,m+0.5));j=['<shape isShadow="true" strokeweight="',m,'" filled="false" path="',l,'" coordsize="10 10" style="',f.style.cssText,'" />'];h=U(g.prepVML(j),null,{left:u(i.left)+o(a.offsetX,1),top:u(i.top)+o(a.offsetY,1)});if(c)h.cutOff=m+1;j=['<stroke color="',a.color||"black",'" opacity="',s*e,'"/>'];U(g.prepVML(j),null,null,h);b?b.element.appendChild(h):f.parentNode.insertBefore(h,f);d.push(h)}this.shadows=d}return this}};F=ea(ra,F);
var na={Element:F,isIE8:Aa.indexOf("MSIE 8.0")>-1,init:function(a,b,c){var d,e;this.alignedObjects=[];d=this.createElement(ya);e=d.element;e.style.position="relative";a.appendChild(d.element);this.isVML=!0;this.box=e;this.boxWrapper=d;this.setSize(b,c,!1);if(!z.namespaces.hcv)z.namespaces.add("hcv","urn:schemas-microsoft-com:vml"),z.createStyleSheet().cssText="hcv\\:fill, hcv\\:path, hcv\\:shape, hcv\\:stroke{ behavior:url(#default#VML); display: inline-block; } "},isHidden:function(){return!this.box.offsetWidth},
clipRect:function(a,b,c,d){var e=this.createElement(),f=V(a);return v(e,{members:[],left:f?a.x:a,top:f?a.y:b,width:f?a.width:c,height:f?a.height:d,getCSS:function(a){var b=a.element,c=b.nodeName,a=a.inverted,d=this.top-(c==="shape"?b.offsetTop:0),e=this.left,b=e+this.width,f=d+this.height,d={clip:"rect("+t(a?e:d)+"px,"+t(a?f:b)+"px,"+t(a?b:f)+"px,"+t(a?d:e)+"px)"};!a&&cb&&c==="DIV"&&v(d,{width:b+"px",height:f+"px"});return d},updateClipping:function(){n(e.members,function(a){a.css(e.getCSS(a))})}})},
color:function(a,b,c,d){var e=this,f,g=/^rgba/,h,i,j=S;a&&a.linearGradient?i="gradient":a&&a.radialGradient&&(i="pattern");if(i){var k,m,l=a.linearGradient||a.radialGradient,p,s,o,B,w,q="",a=a.stops,r,t=[],y=function(){h=['<fill colors="'+t.join(",")+'" opacity="',o,'" o:opacity2="',s,'" type="',i,'" ',q,'focus="100%" method="any" />'];U(e.prepVML(h),null,null,b)};p=a[0];r=a[a.length-1];p[0]>0&&a.unshift([0,p[1]]);r[0]<1&&a.push([1,r[1]]);n(a,function(a,b){g.test(a[1])?(f=ma(a[1]),k=f.get("rgb"),
m=f.get("a")):(k=a[1],m=1);t.push(a[0]*100+"% "+k);b?(o=m,B=k):(s=m,w=k)});if(c==="fill")if(i==="gradient")c=l.x1||l[0]||0,a=l.y1||l[1]||0,p=l.x2||l[2]||0,l=l.y2||l[3]||0,q='angle="'+(90-I.atan((l-a)/(p-c))*180/Ka)+'"',y();else{var j=l.r,v=j*2,P=j*2,H=l.cx,C=l.cy,x=b.radialReference,u,j=function(){x&&(u=d.getBBox(),H+=(x[0]-u.x)/u.width-0.5,C+=(x[1]-u.y)/u.height-0.5,v*=x[2]/u.width,P*=x[2]/u.height);q='src="'+N.global.VMLRadialGradientURL+'" size="'+v+","+P+'" origin="0.5,0.5" position="'+H+","+
C+'" color2="'+w+'" ';y()};d.added?j():J(d,"add",j);j=B}else j=k}else if(g.test(a)&&b.tagName!=="IMG")f=ma(a),h=["<",c,' opacity="',f.get("a"),'"/>'],U(this.prepVML(h),null,null,b),j=f.get("rgb");else{j=b.getElementsByTagName(c);if(j.length)j[0].opacity=1,j[0].type="solid";j=a}return j},prepVML:function(a){var b=this.isIE8,a=a.join("");b?(a=a.replace("/>",' xmlns="urn:schemas-microsoft-com:vml" />'),a=a.indexOf('style="')===-1?a.replace("/>",' style="display:inline-block;behavior:url(#default#VML);" />'):
a.replace('style="','style="display:inline-block;behavior:url(#default#VML);')):a=a.replace("<","<hcv:");return a},text:Ca.prototype.html,path:function(a){var b={coordsize:"10 10"};Da(a)?b.d=a:V(a)&&v(b,a);return this.createElement("shape").attr(b)},circle:function(a,b,c){var d=this.symbol("circle");if(V(a))c=a.r,b=a.y,a=a.x;d.isCircle=!0;return d.attr({x:a,y:b,width:2*c,height:2*c})},g:function(a){var b;a&&(b={className:"highcharts-"+a,"class":"highcharts-"+a});return this.createElement(ya).attr(b)},
image:function(a,b,c,d,e){var f=this.createElement("img").attr({src:a});arguments.length>1&&f.attr({x:b,y:c,width:d,height:e});return f},rect:function(a,b,c,d,e,f){if(V(a))b=a.y,c=a.width,d=a.height,f=a.strokeWidth,a=a.x;var g=this.symbol("rect");g.r=e;return g.attr(g.crisp(f,a,b,q(c,0),q(d,0)))},invertChild:function(a,b){var c=b.style;L(a,{flip:"x",left:u(c.width)-1,top:u(c.height)-1,rotation:-90})},symbols:{arc:function(a,b,c,d,e){var f=e.start,g=e.end,h=e.r||c||d,c=e.innerR,d=Y(f),i=ca(f),j=Y(g),
k=ca(g);if(g-f===0)return["x"];f=["wa",a-h,b-h,a+h,b+h,a+h*d,b+h*i,a+h*j,b+h*k];e.open&&!c&&f.push("e","M",a,b);f.push("at",a-c,b-c,a+c,b+c,a+c*j,b+c*k,a+c*d,b+c*i,"x","e");f.isArc=!0;return f},circle:function(a,b,c,d,e){e&&e.isCircle&&(a-=c/2,b-=d/2);return["wa",a,b,a+c,b+d,a+c,b+d/2,a+c,b+d/2,"e"]},rect:function(a,b,c,d,e){var f=a+c,g=b+d,h;!r(e)||!e.r?f=Ca.prototype.symbols.square.apply(0,arguments):(h=K(e.r,c,d),f=["M",a+h,b,"L",f-h,b,"wa",f-2*h,b,f,b+2*h,f-h,b,f,b+h,"L",f,g-h,"wa",f-2*h,g-2*
h,f,g,f,g-h,f-h,g,"L",a+h,g,"wa",a,g-2*h,a+2*h,g,a+h,g,a,g-h,"L",a,b+h,"wa",a,b,a+2*h,b+2*h,a,b+h,a+h,b,"x","e"]);return f}}};Highcharts.VMLRenderer=F=function(){this.init.apply(this,arguments)};F.prototype=x(Ca.prototype,na);Sa=F}var Rb;if($)Highcharts.CanVGRenderer=F=function(){sa="http://www.w3.org/1999/xhtml"},F.prototype.symbols={},Rb=function(){function a(){var a=b.length,d;for(d=0;d<a;d++)b[d]();b=[]}var b=[];return{push:function(c,d){b.length===0&&Tb(d,a);b.push(c)}}}(),Sa=F;Ja.prototype=
{addLabel:function(){var a=this.axis,b=a.options,c=a.chart,d=a.horiz,e=a.categories,f=a.series[0]&&a.series[0].names,g=this.pos,h=b.labels,i=a.tickPositions,d=d&&e&&!h.step&&!h.staggerLines&&!h.rotation&&c.plotWidth/i.length||!d&&(c.optionsMarginLeft||c.plotWidth/2),j=g===i[0],k=g===i[i.length-1],f=e?o(e[g],f&&f[g],g):g,e=this.label,i=i.info,m;a.isDatetimeAxis&&i&&(m=b.dateTimeLabelFormats[i.higherRanks[g]||i.unitName]);this.isFirst=j;this.isLast=k;b=a.labelFormatter.call({axis:a,chart:c,isFirst:j,
isLast:k,dateTimeLabelFormat:m,value:a.isLog?ia(da(f)):f});g=d&&{width:q(1,t(d-2*(h.padding||10)))+"px"};g=v(g,h.style);if(r(e))e&&e.attr({text:b}).css(g);else{d={align:h.align};if(Ea(h.rotation))d.rotation=h.rotation;this.label=r(b)&&h.enabled?c.renderer.text(b,0,0,h.useHTML).attr(d).css(g).add(a.labelGroup):null}},getLabelSize:function(){var a=this.label,b=this.axis;return a?(this.labelBBox=a.getBBox())[b.horiz?"height":"width"]:0},getLabelSides:function(){var a=this.axis.options.labels,b=this.labelBBox.width,
a=b*{left:0,center:0.5,right:1}[a.align]-a.x;return[-a,b-a]},handleOverflow:function(a,b){var c=!0,d=this.axis,e=d.chart,f=this.isFirst,g=this.isLast,h=b.x,i=d.reversed,j=d.tickPositions;if(f||g){var k=this.getLabelSides(),m=k[0],k=k[1],e=e.plotLeft,l=e+d.len,j=(d=d.ticks[j[a+(f?1:-1)]])&&d.label.xy&&d.label.xy.x+d.getLabelSides()[f?0:1];f&&!i||g&&i?h+m<e&&(h=e-m,d&&h+k>j&&(c=!1)):h+k>l&&(h=l-k,d&&h+m<j&&(c=!1));b.x=h}return c},getPosition:function(a,b,c,d){var e=this.axis,f=e.chart,g=d&&f.oldChartHeight||
f.chartHeight;return{x:a?e.translate(b+c,null,null,d)+e.transB:e.left+e.offset+(e.opposite?(d&&f.oldChartWidth||f.chartWidth)-e.right-e.left:0),y:a?g-e.bottom+e.offset-(e.opposite?e.height:0):g-e.translate(b+c,null,null,d)-e.transB}},getLabelPosition:function(a,b,c,d,e,f,g,h){var i=this.axis,j=i.transA,k=i.reversed,i=i.staggerLines,a=a+e.x-(f&&d?f*j*(k?-1:1):0),b=b+e.y-(f&&!d?f*j*(k?1:-1):0);r(e.y)||(b+=u(c.styles.lineHeight)*0.9-c.getBBox().height/2);i&&(b+=g/(h||1)%i*16);return{x:a,y:b}},getMarkPath:function(a,
b,c,d,e,f){return f.crispLine(["M",a,b,"L",a+(e?0:-c),b+(e?c:0)],d)},render:function(a,b,c){var d=this.axis,e=d.options,f=d.chart.renderer,g=d.horiz,h=this.type,i=this.label,j=this.pos,k=e.labels,m=this.gridLine,l=h?h+"Grid":"grid",p=h?h+"Tick":"tick",s=e[l+"LineWidth"],n=e[l+"LineColor"],B=e[l+"LineDashStyle"],w=e[p+"Length"],l=e[p+"Width"]||0,q=e[p+"Color"],r=e[p+"Position"],p=this.mark,t=k.step,v=!0,u=d.tickmarkOffset,P=this.getPosition(g,j,u,b),H=P.x,P=P.y,C=g&&H===d.pos||!g&&P===d.pos+d.len?
-1:1,x=d.staggerLines;this.isActive=!0;if(s){j=d.getPlotLinePath(j+u,s*C,b,!0);if(m===y){m={stroke:n,"stroke-width":s};if(B)m.dashstyle=B;if(!h)m.zIndex=1;if(b)m.opacity=0;this.gridLine=m=s?f.path(j).attr(m).add(d.gridGroup):null}if(!b&&m&&j)m[this.isNew?"attr":"animate"]({d:j,opacity:c})}if(l&&w)r==="inside"&&(w=-w),d.opposite&&(w=-w),b=this.getMarkPath(H,P,w,l*C,g,f),p?p.animate({d:b,opacity:c}):this.mark=f.path(b).attr({stroke:q,"stroke-width":l,opacity:c}).add(d.axisGroup);if(i&&!isNaN(H))i.xy=
P=this.getLabelPosition(H,P,i,g,k,u,a,t),this.isFirst&&!o(e.showFirstLabel,1)||this.isLast&&!o(e.showLastLabel,1)?v=!1:!x&&g&&k.overflow==="justify"&&!this.handleOverflow(a,P)&&(v=!1),t&&a%t&&(v=!1),v&&!isNaN(P.y)?(P.opacity=c,i[this.isNew?"attr":"animate"](P),this.isNew=!1):i.attr("y",-9999)},destroy:function(){Ha(this,this.axis)}};pb.prototype={render:function(){var a=this,b=a.axis,c=b.horiz,d=(b.pointRange||0)/2,e=a.options,f=e.label,g=a.label,h=e.width,i=e.to,j=e.from,k=r(j)&&r(i),m=e.value,l=
e.dashStyle,p=a.svgElem,s=[],n,B=e.color,w=e.zIndex,G=e.events,t=b.chart.renderer;b.isLog&&(j=ka(j),i=ka(i),m=ka(m));if(h){if(s=b.getPlotLinePath(m,h),d={stroke:B,"stroke-width":h},l)d.dashstyle=l}else if(k){if(j=q(j,b.min-d),i=K(i,b.max+d),s=b.getPlotBandPath(j,i,e),d={fill:B},e.borderWidth)d.stroke=e.borderColor,d["stroke-width"]=e.borderWidth}else return;if(r(w))d.zIndex=w;if(p)s?p.animate({d:s},null,p.onGetPath):(p.hide(),p.onGetPath=function(){p.show()});else if(s&&s.length&&(a.svgElem=p=t.path(s).attr(d).add(),
G))for(n in e=function(b){p.on(b,function(c){G[b].apply(a,[c])})},G)e(n);if(f&&r(f.text)&&s&&s.length&&b.width>0&&b.height>0){f=x({align:c&&k&&"center",x:c?!k&&4:10,verticalAlign:!c&&k&&"middle",y:c?k?16:10:k?6:-4,rotation:c&&!k&&90},f);if(!g)a.label=g=t.text(f.text,0,0).attr({align:f.textAlign||f.align,rotation:f.rotation,zIndex:w}).css(f.style).add();b=[s[1],s[4],o(s[6],s[1])];s=[s[2],s[5],o(s[7],s[2])];c=Ga(b);k=Ga(s);g.align(f,!1,{x:c,y:k,width:pa(b)-c,height:pa(s)-k});g.show()}else g&&g.hide();
return a},destroy:function(){ga(this.axis.plotLinesAndBands,this);Ha(this,this.axis)}};Kb.prototype={destroy:function(){Ha(this,this.axis)},setTotal:function(a){this.cum=this.total=a},render:function(a){var b=this.options,c=b.format,c=c?wa(c,this):b.formatter.call(this);this.label?this.label.attr({text:c,visibility:"hidden"}):this.label=this.axis.chart.renderer.text(c,0,0,b.useHTML).css(b.style).attr({align:this.textAlign,rotation:b.rotation,visibility:"hidden"}).add(a)},setOffset:function(a,b){var c=
this.axis,d=c.chart,e=d.inverted,f=this.isNegative,g=c.translate(this.percent?100:this.total,0,0,0,1),c=c.translate(0),c=Q(g-c),h=d.xAxis[0].translate(this.x)+a,i=d.plotHeight,f={x:e?f?g:g-c:h,y:e?i-h-b:f?i-g-c:i-g,width:e?c:b,height:e?b:c};if(e=this.label)e.align(this.alignOptions,null,f),f=e.alignAttr,e.attr({visibility:this.options.crop===!1||d.isInsidePlot(f.x,f.y)?Z?"inherit":"visible":"hidden"})}};ab.prototype={defaultOptions:{dateTimeLabelFormats:{millisecond:"%H:%M:%S.%L",second:"%H:%M:%S",
minute:"%H:%M",hour:"%H:%M",day:"%e. %b",week:"%e. %b",month:"%b '%y",year:"%Y"},endOnTick:!1,gridLineColor:"#C0C0C0",labels:M,lineColor:"#C0D0E0",lineWidth:1,minPadding:0.01,maxPadding:0.01,minorGridLineColor:"#E0E0E0",minorGridLineWidth:1,minorTickColor:"#A0A0A0",minorTickLength:2,minorTickPosition:"outside",startOfWeek:1,startOnTick:!1,tickColor:"#C0D0E0",tickLength:5,tickmarkPlacement:"between",tickPixelInterval:100,tickPosition:"outside",tickWidth:1,title:{align:"middle",style:{color:"#4d759e",
fontWeight:"bold"}},type:"linear"},defaultYAxisOptions:{endOnTick:!0,gridLineWidth:1,tickPixelInterval:72,showLastLabel:!0,labels:{align:"right",x:-8,y:3},lineWidth:0,maxPadding:0.05,minPadding:0.05,startOnTick:!0,tickWidth:0,title:{rotation:270,text:"Values"},stackLabels:{enabled:!1,formatter:function(){return ua(this.total,-1)},style:M.style}},defaultLeftAxisOptions:{labels:{align:"right",x:-8,y:null},title:{rotation:270}},defaultRightAxisOptions:{labels:{align:"left",x:8,y:null},title:{rotation:90}},
defaultBottomAxisOptions:{labels:{align:"center",x:0,y:14},title:{rotation:0}},defaultTopAxisOptions:{labels:{align:"center",x:0,y:-5},title:{rotation:0}},init:function(a,b){var c=b.isX;this.horiz=a.inverted?!c:c;this.xOrY=(this.isXAxis=c)?"x":"y";this.opposite=b.opposite;this.side=this.horiz?this.opposite?0:2:this.opposite?1:3;this.setOptions(b);var d=this.options,e=d.type;this.labelFormatter=d.labels.formatter||this.defaultLabelFormatter;this.staggerLines=this.horiz&&d.labels.staggerLines;this.userOptions=
b;this.minPixelPadding=0;this.chart=a;this.reversed=d.reversed;this.zoomEnabled=d.zoomEnabled!==!1;this.categories=d.categories||e==="category";this.isLog=e==="logarithmic";this.isDatetimeAxis=e==="datetime";this.isLinked=r(d.linkedTo);this.tickmarkOffset=this.categories&&d.tickmarkPlacement==="between"?0.5:0;this.ticks={};this.minorTicks={};this.plotLinesAndBands=[];this.alternateBands={};this.len=0;this.minRange=this.userMinRange=d.minRange||d.maxZoom;this.range=d.range;this.offset=d.offset||0;
this.stacks={};this._stacksTouched=0;this.min=this.max=null;var f,d=this.options.events;la(this,a.axes)===-1&&(a.axes.push(this),a[c?"xAxis":"yAxis"].push(this));this.series=this.series||[];if(a.inverted&&c&&this.reversed===y)this.reversed=!0;this.removePlotLine=this.removePlotBand=this.removePlotBandOrLine;for(f in d)J(this,f,d[f]);if(this.isLog)this.val2lin=ka,this.lin2val=da},setOptions:function(a){this.options=x(this.defaultOptions,this.isXAxis?{}:this.defaultYAxisOptions,[this.defaultTopAxisOptions,
this.defaultRightAxisOptions,this.defaultBottomAxisOptions,this.defaultLeftAxisOptions][this.side],x(N[this.isXAxis?"xAxis":"yAxis"],a))},update:function(a,b){var c=this.chart,a=c.options[this.xOrY+"Axis"][this.options.index]=x(this.userOptions,a);this.destroy();this._addedPlotLB=!1;this.init(c,a);c.isDirtyBox=!0;o(b,!0)&&c.redraw()},remove:function(a){var b=this.chart,c=this.xOrY+"Axis";n(this.series,function(a){a.remove(!1)});ga(b.axes,this);ga(b[c],this);b.options[c].splice(this.options.index,
1);n(b[c],function(a,b){a.options.index=b});this.destroy();b.isDirtyBox=!0;o(a,!0)&&b.redraw()},defaultLabelFormatter:function(){var a=this.axis,b=this.value,c=a.categories,d=this.dateTimeLabelFormat,e=N.lang.numericSymbols,f=e&&e.length,g,h=a.options.labels.format,a=a.isLog?b:a.tickInterval;if(h)g=wa(h,this);else if(c)g=b;else if(d)g=Ua(d,b);else if(f&&a>=1E3)for(;f--&&g===y;)c=Math.pow(1E3,f+1),a>=c&&e[f]!==null&&(g=ua(b/c,-1)+e[f]);g===y&&(g=b>=1E3?ua(b,0):ua(b,-1));return g},getSeriesExtremes:function(){var a=
this,b=a.chart,c=a.stacks,d=[],e=[],f=a._stacksTouched+=1,g,h;a.hasVisibleSeries=!1;a.dataMin=a.dataMax=null;n(a.series,function(g){if(g.visible||!b.options.chart.ignoreHiddenSeries){var j=g.options,k,m,l,p,s,n,B,w,G,t=j.threshold,v,u=[],x=0;a.hasVisibleSeries=!0;if(a.isLog&&t<=0)t=j.threshold=null;if(a.isXAxis){if(j=g.xData,j.length)a.dataMin=K(o(a.dataMin,j[0]),Ga(j)),a.dataMax=q(o(a.dataMax,j[0]),pa(j))}else{var P,H,C,A=g.cropped,z=g.xAxis.getExtremes(),E=!!g.modifyValue;k=j.stacking;a.usePercentage=
k==="percent";if(k)s=j.stack,p=g.type+o(s,""),n="-"+p,g.stackKey=p,m=d[p]||[],d[p]=m,l=e[n]||[],e[n]=l;if(a.usePercentage)a.dataMin=0,a.dataMax=99;j=g.processedXData;B=g.processedYData;v=B.length;for(h=0;h<v;h++){w=j[h];G=B[h];if(k)H=(P=G<t)?l:m,C=P?n:p,r(H[w])?(H[w]=ia(H[w]+G),G=[G,H[w]]):H[w]=G,c[C]||(c[C]={}),c[C][w]||(c[C][w]=new Kb(a,a.options.stackLabels,P,w,s,k)),c[C][w].setTotal(H[w]),c[C][w].touched=f;if(G!==null&&G!==y&&(!a.isLog||G.length||G>0))if(E&&(G=g.modifyValue(G)),g.getExtremesFromAll||
A||(j[h+1]||w)>=z.min&&(j[h-1]||w)<=z.max)if(w=G.length)for(;w--;)G[w]!==null&&(u[x++]=G[w]);else u[x++]=G}if(!a.usePercentage&&u.length)g.dataMin=k=Ga(u),g.dataMax=g=pa(u),a.dataMin=K(o(a.dataMin,k),k),a.dataMax=q(o(a.dataMax,g),g);if(r(t))if(a.dataMin>=t)a.dataMin=t,a.ignoreMinPadding=!0;else if(a.dataMax<t)a.dataMax=t,a.ignoreMaxPadding=!0}}});for(g in c)for(h in c[g])c[g][h].touched<f&&(c[g][h].destroy(),delete c[g][h])},translate:function(a,b,c,d,e,f){var g=this.len,h=1,i=0,j=d?this.oldTransA:
this.transA,d=d?this.oldMin:this.min,k=this.minPixelPadding,e=(this.options.ordinal||this.isLog&&e)&&this.lin2val;if(!j)j=this.transA;c&&(h*=-1,i=g);this.reversed&&(h*=-1,i-=h*g);b?(a=a*h+i,a-=k,a=a/j+d,e&&(a=this.lin2val(a))):(e&&(a=this.val2lin(a)),a=h*(a-d)*j+i+h*k+(f?j*this.pointRange/2:0));return a},toPixels:function(a,b){return this.translate(a,!1,!this.horiz,null,!0)+(b?0:this.pos)},toValue:function(a,b){return this.translate(a-(b?0:this.pos),!0,!this.horiz,null,!0)},getPlotLinePath:function(a,
b,c,d){var e=this.chart,f=this.left,g=this.top,h,i,j,a=this.translate(a,null,null,c),k=c&&e.oldChartHeight||e.chartHeight,m=c&&e.oldChartWidth||e.chartWidth,l;h=this.transB;c=i=t(a+h);h=j=t(k-a-h);if(isNaN(a))l=!0;else if(this.horiz){if(h=g,j=k-this.bottom,c<f||c>f+this.width)l=!0}else if(c=f,i=m-this.right,h<g||h>g+this.height)l=!0;return l&&!d?null:e.renderer.crispLine(["M",c,h,"L",i,j],b||0)},getPlotBandPath:function(a,b){var c=this.getPlotLinePath(b),d=this.getPlotLinePath(a);d&&c?d.push(c[4],
c[5],c[1],c[2]):d=null;return d},getLinearTickPositions:function(a,b,c){for(var d,b=ia(T(b/a)*a),c=ia(ja(c/a)*a),e=[];b<=c;){e.push(b);b=ia(b+a);if(b===d)break;d=b}return e},getLogTickPositions:function(a,b,c,d){var e=this.options,f=this.len,g=[];if(!d)this._minorAutoInterval=null;if(a>=0.5)a=t(a),g=this.getLinearTickPositions(a,b,c);else if(a>=0.08)for(var f=T(b),h,i,j,k,m,e=a>0.3?[1,2,4]:a>0.15?[1,2,4,6,8]:[1,2,3,4,5,6,7,8,9];f<c+1&&!m;f++){i=e.length;for(h=0;h<i&&!m;h++)j=ka(da(f)*e[h]),j>b&&(!d||
k<=c)&&g.push(k),k>c&&(m=!0),k=j}else if(b=da(b),c=da(c),a=e[d?"minorTickInterval":"tickInterval"],a=o(a==="auto"?null:a,this._minorAutoInterval,(c-b)*(e.tickPixelInterval/(d?5:1))/((d?f/this.tickPositions.length:f)||1)),a=ib(a,null,I.pow(10,T(I.log(a)/I.LN10))),g=La(this.getLinearTickPositions(a,b,c),ka),!d)this._minorAutoInterval=a/5;if(!d)this.tickInterval=a;return g},getMinorTickPositions:function(){var a=this.options,b=this.tickPositions,c=this.minorTickInterval,d=[],e;if(this.isLog){e=b.length;
for(a=1;a<e;a++)d=d.concat(this.getLogTickPositions(c,b[a-1],b[a],!0))}else if(this.isDatetimeAxis&&a.minorTickInterval==="auto")d=d.concat(Cb(Ab(c),this.min,this.max,a.startOfWeek)),d[0]<this.min&&d.shift();else for(b=this.min+(b[0]-this.min)%c;b<=this.max;b+=c)d.push(b);return d},adjustForMinRange:function(){var a=this.options,b=this.min,c=this.max,d,e=this.dataMax-this.dataMin>=this.minRange,f,g,h,i,j;if(this.isXAxis&&this.minRange===y&&!this.isLog)r(a.min)||r(a.max)?this.minRange=null:(n(this.series,
function(a){i=a.xData;for(g=j=a.xIncrement?1:i.length-1;g>0;g--)if(h=i[g]-i[g-1],f===y||h<f)f=h}),this.minRange=K(f*5,this.dataMax-this.dataMin));if(c-b<this.minRange){var k=this.minRange;d=(k-c+b)/2;d=[b-d,o(a.min,b-d)];if(e)d[2]=this.dataMin;b=pa(d);c=[b+k,o(a.max,b+k)];if(e)c[2]=this.dataMax;c=Ga(c);c-b<k&&(d[0]=c-k,d[1]=o(a.min,c-k),b=pa(d))}this.min=b;this.max=c},setAxisTranslation:function(a){var b=this.max-this.min,c=0,d,e=0,f=0,g=this.linkedParent,h=this.transA;if(this.isXAxis)g?(e=g.minPointOffset,
f=g.pointRangePadding):n(this.series,function(a){var g=a.pointRange,h=a.options.pointPlacement,m=a.closestPointRange;g>b&&(g=0);c=q(c,g);e=q(e,h?0:g/2);f=q(f,h==="on"?0:g);!a.noSharedTooltip&&r(m)&&(d=r(d)?K(d,m):m)}),g=this.ordinalSlope&&d?this.ordinalSlope/d:1,this.minPointOffset=e*=g,this.pointRangePadding=f*=g,this.pointRange=K(c,b),this.closestPointRange=d;if(a)this.oldTransA=h;this.translationSlope=this.transA=h=this.len/(b+f||1);this.transB=this.horiz?this.left:this.bottom;this.minPixelPadding=
h*e},setTickPositions:function(a){var b=this,c=b.chart,d=b.options,e=b.isLog,f=b.isDatetimeAxis,g=b.isXAxis,h=b.isLinked,i=b.options.tickPositioner,j=d.maxPadding,k=d.minPadding,m=d.tickInterval,l=d.minTickInterval,p=d.tickPixelInterval,s=b.categories;h?(b.linkedParent=c[g?"xAxis":"yAxis"][d.linkedTo],c=b.linkedParent.getExtremes(),b.min=o(c.min,c.dataMin),b.max=o(c.max,c.dataMax),d.type!==b.linkedParent.options.type&&qa(11,1)):(b.min=o(b.userMin,d.min,b.dataMin),b.max=o(b.userMax,d.max,b.dataMax));
if(e)!a&&K(b.min,o(b.dataMin,b.min))<=0&&qa(10,1),b.min=ia(ka(b.min)),b.max=ia(ka(b.max));if(b.range&&(b.userMin=b.min=q(b.min,b.max-b.range),b.userMax=b.max,a))b.range=null;b.beforePadding&&b.beforePadding();b.adjustForMinRange();if(!s&&!b.usePercentage&&!h&&r(b.min)&&r(b.max)&&(c=b.max-b.min)){if(!r(d.min)&&!r(b.userMin)&&k&&(b.dataMin<0||!b.ignoreMinPadding))b.min-=c*k;if(!r(d.max)&&!r(b.userMax)&&j&&(b.dataMax>0||!b.ignoreMaxPadding))b.max+=c*j}b.tickInterval=b.min===b.max||b.min===void 0||b.max===
void 0?1:h&&!m&&p===b.linkedParent.options.tickPixelInterval?b.linkedParent.tickInterval:o(m,s?1:(b.max-b.min)*p/(b.len||1));g&&!a&&n(b.series,function(a){a.processData(b.min!==b.oldMin||b.max!==b.oldMax)});b.setAxisTranslation(!0);b.beforeSetTickPositions&&b.beforeSetTickPositions();if(b.postProcessTickInterval)b.tickInterval=b.postProcessTickInterval(b.tickInterval);if(!m&&b.tickInterval<l)b.tickInterval=l;if(!f&&!e&&(a=I.pow(10,T(I.log(b.tickInterval)/I.LN10)),!m))b.tickInterval=ib(b.tickInterval,
null,a,d);b.minorTickInterval=d.minorTickInterval==="auto"&&b.tickInterval?b.tickInterval/5:d.minorTickInterval;b.tickPositions=i=d.tickPositions?[].concat(d.tickPositions):i&&i.apply(b,[b.min,b.max]);if(!i)i=f?(b.getNonLinearTimeTicks||Cb)(Ab(b.tickInterval,d.units),b.min,b.max,d.startOfWeek,b.ordinalPositions,b.closestPointRange,!0):e?b.getLogTickPositions(b.tickInterval,b.min,b.max):b.getLinearTickPositions(b.tickInterval,b.min,b.max),b.tickPositions=i;if(!h)e=i[0],f=i[i.length-1],h=b.minPointOffset||
0,d.startOnTick?b.min=e:b.min-h>e&&i.shift(),d.endOnTick?b.max=f:b.max+h<f&&i.pop(),i.length===1&&(b.min-=0.001,b.max+=0.001)},setMaxTicks:function(){var a=this.chart,b=a.maxTicks||{},c=this.tickPositions,d=this._maxTicksKey=[this.xOrY,this.pos,this.len].join("-");if(!this.isLinked&&!this.isDatetimeAxis&&c&&c.length>(b[d]||0)&&this.options.alignTicks!==!1)b[d]=c.length;a.maxTicks=b},adjustTickAmount:function(){var a=this._maxTicksKey,b=this.tickPositions,c=this.chart.maxTicks;if(c&&c[a]&&!this.isDatetimeAxis&&
!this.categories&&!this.isLinked&&this.options.alignTicks!==!1){var d=this.tickAmount,e=b.length;this.tickAmount=a=c[a];if(e<a){for(;b.length<a;)b.push(ia(b[b.length-1]+this.tickInterval));this.transA*=(e-1)/(a-1);this.max=b[b.length-1]}if(r(d)&&a!==d)this.isDirty=!0}},setScale:function(){var a=this.stacks,b,c,d,e;this.oldMin=this.min;this.oldMax=this.max;this.oldAxisLength=this.len;this.setAxisSize();e=this.len!==this.oldAxisLength;n(this.series,function(a){if(a.isDirtyData||a.isDirty||a.xAxis.isDirty)d=
!0});if(e||d||this.isLinked||this.forceRedraw||this.userMin!==this.oldUserMin||this.userMax!==this.oldUserMax)if(this.forceRedraw=!1,this.getSeriesExtremes(),this.setTickPositions(),this.oldUserMin=this.userMin,this.oldUserMax=this.userMax,!this.isDirty)this.isDirty=e||this.min!==this.oldMin||this.max!==this.oldMax;if(!this.isXAxis)for(b in a)for(c in a[b])a[b][c].cum=a[b][c].total;this.setMaxTicks()},setExtremes:function(a,b,c,d,e){var f=this,g=f.chart,c=o(c,!0),e=v(e,{min:a,max:b});D(f,"setExtremes",
e,function(){f.userMin=a;f.userMax=b;f.isDirtyExtremes=!0;c&&g.redraw(d)})},zoom:function(a,b){this.allowZoomOutside||(a<=this.dataMin&&(a=y),b>=this.dataMax&&(b=y));this.displayBtn=a!==y||b!==y;this.setExtremes(a,b,!1,y,{trigger:"zoom"});return!0},setAxisSize:function(){var a=this.chart,b=this.options,c=b.offsetLeft||0,d=b.offsetRight||0,e=this.horiz,f,g;this.left=g=o(b.left,a.plotLeft+c);this.top=f=o(b.top,a.plotTop);this.width=c=o(b.width,a.plotWidth-c+d);this.height=b=o(b.height,a.plotHeight);
this.bottom=a.chartHeight-b-f;this.right=a.chartWidth-c-g;this.len=q(e?c:b,0);this.pos=e?g:f},getExtremes:function(){var a=this.isLog;return{min:a?ia(da(this.min)):this.min,max:a?ia(da(this.max)):this.max,dataMin:this.dataMin,dataMax:this.dataMax,userMin:this.userMin,userMax:this.userMax}},getThreshold:function(a){var b=this.isLog,c=b?da(this.min):this.min,b=b?da(this.max):this.max;c>a||a===null?a=c:b<a&&(a=b);return this.translate(a,0,1,0,1)},addPlotBand:function(a){this.addPlotBandOrLine(a,"plotBands")},
addPlotLine:function(a){this.addPlotBandOrLine(a,"plotLines")},addPlotBandOrLine:function(a,b){var c=(new pb(this,a)).render(),d=this.userOptions;b&&(d[b]=d[b]||[],d[b].push(a));this.plotLinesAndBands.push(c);return c},getOffset:function(){var a=this,b=a.chart,c=b.renderer,d=a.options,e=a.tickPositions,f=a.ticks,g=a.horiz,h=a.side,i=b.inverted?[1,0,3,2][h]:h,j,k=0,m,l=0,p=d.title,s=d.labels,t=0,B=b.axisOffset,w=b.clipOffset,G=[-1,1,1,-1][h],v;a.hasData=b=a.hasVisibleSeries||r(a.min)&&r(a.max)&&!!e;
a.showAxis=j=b||o(d.showEmpty,!0);if(!a.axisGroup)a.gridGroup=c.g("grid").attr({zIndex:d.gridZIndex||1}).add(),a.axisGroup=c.g("axis").attr({zIndex:d.zIndex||2}).add(),a.labelGroup=c.g("axis-labels").attr({zIndex:s.zIndex||7}).add();if(b||a.isLinked)n(e,function(b){f[b]?f[b].addLabel():f[b]=new Ja(a,b)}),n(e,function(a){if(h===0||h===2||{1:"left",3:"right"}[h]===s.align)t=q(f[a].getLabelSize(),t)}),a.staggerLines&&(t+=(a.staggerLines-1)*16);else for(v in f)f[v].destroy(),delete f[v];if(p&&p.text&&
p.enabled!==!1){if(!a.axisTitle)a.axisTitle=c.text(p.text,0,0,p.useHTML).attr({zIndex:7,rotation:p.rotation||0,align:p.textAlign||{low:"left",middle:"center",high:"right"}[p.align]}).css(p.style).add(a.axisGroup),a.axisTitle.isNew=!0;if(j)k=a.axisTitle.getBBox()[g?"height":"width"],l=o(p.margin,g?5:10),m=p.offset;a.axisTitle[j?"show":"hide"]()}a.offset=G*o(d.offset,B[h]);a.axisTitleMargin=o(m,t+l+(h!==2&&t&&G*d.labels[g?"y":"x"]));B[h]=q(B[h],a.axisTitleMargin+k+G*a.offset);w[i]=q(w[i],d.lineWidth)},
getLinePath:function(a){var b=this.chart,c=this.opposite,d=this.offset,e=this.horiz,f=this.left+(c?this.width:0)+d;this.lineTop=d=b.chartHeight-this.bottom-(c?this.height:0)+d;c||(a*=-1);return b.renderer.crispLine(["M",e?this.left:f,e?d:this.top,"L",e?b.chartWidth-this.right:f,e?d:b.chartHeight-this.bottom],a)},getTitlePosition:function(){var a=this.horiz,b=this.left,c=this.top,d=this.len,e=this.options.title,f=a?b:c,g=this.opposite,h=this.offset,i=u(e.style.fontSize||12),d={low:f+(a?0:d),middle:f+
d/2,high:f+(a?d:0)}[e.align],b=(a?c+this.height:b)+(a?1:-1)*(g?-1:1)*this.axisTitleMargin+(this.side===2?i:0);return{x:a?d:b+(g?this.width:0)+h+(e.x||0),y:a?b-(g?this.height:0)+h:d+(e.y||0)}},render:function(){var a=this,b=a.chart,c=b.renderer,d=a.options,e=a.isLog,f=a.isLinked,g=a.tickPositions,h=a.axisTitle,i=a.stacks,j=a.ticks,k=a.minorTicks,m=a.alternateBands,l=d.stackLabels,p=d.alternateGridColor,s=a.tickmarkOffset,o=d.lineWidth,B,w=b.hasRendered&&r(a.oldMin)&&!isNaN(a.oldMin);B=a.hasData;var q=
a.showAxis,t,v;n([j,k,m],function(a){for(var b in a)a[b].isActive=!1});if(B||f)if(a.minorTickInterval&&!a.categories&&n(a.getMinorTickPositions(),function(b){k[b]||(k[b]=new Ja(a,b,"minor"));w&&k[b].isNew&&k[b].render(null,!0);k[b].render(null,!1,1)}),g.length&&(n(g.slice(1).concat([g[0]]),function(b,c){c=c===g.length-1?0:c+1;if(!f||b>=a.min&&b<=a.max)j[b]||(j[b]=new Ja(a,b)),w&&j[b].isNew&&j[b].render(c,!0),j[b].render(c,!1,1)}),s&&a.min===0&&(j[-1]||(j[-1]=new Ja(a,-1,null,!0)),j[-1].render(-1))),
p&&n(g,function(b,c){if(c%2===0&&b<a.max)m[b]||(m[b]=new pb(a)),t=b+s,v=g[c+1]!==y?g[c+1]+s:a.max,m[b].options={from:e?da(t):t,to:e?da(v):v,color:p},m[b].render(),m[b].isActive=!0}),!a._addedPlotLB)n((d.plotLines||[]).concat(d.plotBands||[]),function(b){a.addPlotBandOrLine(b)}),a._addedPlotLB=!0;n([j,k,m],function(a){var c,d,e=[],f=za?za.duration||500:0,g=function(){for(d=e.length;d--;)a[e[d]]&&!a[e[d]].isActive&&(a[e[d]].destroy(),delete a[e[d]])};for(c in a)if(!a[c].isActive)a[c].render(c,!1,0),
a[c].isActive=!1,e.push(c);a===m||!b.hasRendered||!f?g():f&&setTimeout(g,f)});if(o)B=a.getLinePath(o),a.axisLine?a.axisLine.animate({d:B}):a.axisLine=c.path(B).attr({stroke:d.lineColor,"stroke-width":o,zIndex:7}).add(a.axisGroup),a.axisLine[q?"show":"hide"]();if(h&&q)h[h.isNew?"attr":"animate"](a.getTitlePosition()),h.isNew=!1;if(l&&l.enabled){var u,x,d=a.stackTotalGroup;if(!d)a.stackTotalGroup=d=c.g("stack-labels").attr({visibility:"visible",zIndex:6}).add();d.translate(b.plotLeft,b.plotTop);for(u in i)for(x in c=
i[u],c)c[x].render(d)}a.isDirty=!1},removePlotBandOrLine:function(a){for(var b=this.plotLinesAndBands,c=b.length;c--;)b[c].id===a&&b[c].destroy()},setTitle:function(a,b){this.update({title:a},b)},redraw:function(){var a=this.chart.pointer;a.reset&&a.reset(!0);this.render();n(this.plotLinesAndBands,function(a){a.render()});n(this.series,function(a){a.isDirty=!0})},setCategories:function(a,b){this.update({categories:a},b)},destroy:function(){var a=this,b=a.stacks,c;ba(a);for(c in b)Ha(b[c]),b[c]=null;
n([a.ticks,a.minorTicks,a.alternateBands,a.plotLinesAndBands],function(a){Ha(a)});n("stackTotalGroup,axisLine,axisGroup,gridGroup,labelGroup,axisTitle".split(","),function(b){a[b]&&(a[b]=a[b].destroy())})}};qb.prototype={init:function(a,b){var c=b.borderWidth,d=b.style,e=u(d.padding);this.chart=a;this.options=b;this.crosshairs=[];this.now={x:0,y:0};this.isHidden=!0;this.label=a.renderer.label("",0,0,b.shape,null,null,b.useHTML,null,"tooltip").attr({padding:e,fill:b.backgroundColor,"stroke-width":c,
r:b.borderRadius,zIndex:8}).css(d).css({padding:0}).hide().add();$||this.label.shadow(b.shadow);this.shared=b.shared},destroy:function(){n(this.crosshairs,function(a){a&&a.destroy()});if(this.label)this.label=this.label.destroy();clearTimeout(this.hideTimer);clearTimeout(this.tooltipTimeout)},move:function(a,b,c,d){var e=this,f=e.now,g=e.options.animation!==!1&&!e.isHidden;v(f,{x:g?(2*f.x+a)/3:a,y:g?(f.y+b)/2:b,anchorX:g?(2*f.anchorX+c)/3:c,anchorY:g?(f.anchorY+d)/2:d});e.label.attr(f);if(g&&(Q(a-
f.x)>1||Q(b-f.y)>1))clearTimeout(this.tooltipTimeout),this.tooltipTimeout=setTimeout(function(){e&&e.move(a,b,c,d)},32)},hide:function(){var a=this,b;clearTimeout(this.hideTimer);if(!this.isHidden)b=this.chart.hoverPoints,this.hideTimer=setTimeout(function(){a.label.fadeOut();a.isHidden=!0},o(this.options.hideDelay,500)),b&&n(b,function(a){a.setState()}),this.chart.hoverPoints=null},hideCrosshairs:function(){n(this.crosshairs,function(a){a&&a.hide()})},getAnchor:function(a,b){var c,d=this.chart,e=
d.inverted,f=d.plotTop,g=0,h=0,i,a=ha(a);c=a[0].tooltipPos;this.followPointer&&b&&(b.chartX===y&&(b=d.pointer.normalize(b)),c=[b.chartX-d.plotLeft,b.chartY-f]);c||(n(a,function(a){i=a.series.yAxis;g+=a.plotX;h+=(a.plotLow?(a.plotLow+a.plotHigh)/2:a.plotY)+(!e&&i?i.top-f:0)}),g/=a.length,h/=a.length,c=[e?d.plotWidth-h:g,this.shared&&!e&&a.length>1&&b?b.chartY-f:e?d.plotHeight-g:h]);return La(c,t)},getPosition:function(a,b,c){var d=this.chart,e=d.plotLeft,f=d.plotTop,g=d.plotWidth,h=d.plotHeight,i=
o(this.options.distance,12),j=c.plotX,c=c.plotY,d=j+e+(d.inverted?i:-a-i),k=c-b+f+15,m;d<7&&(d=e+q(j,0)+i);d+a>e+g&&(d-=d+a-(e+g),k=c-b+f-i,m=!0);k<f+5&&(k=f+5,m&&c>=k&&c<=k+b&&(k=c+f+i));k+b>f+h&&(k=q(f,f+h-b-i));return{x:d,y:k}},defaultFormatter:function(a){var b=this.points||ha(this),c=b[0].series,d;d=[c.tooltipHeaderFormatter(b[0])];n(b,function(a){c=a.series;d.push(c.tooltipFormatter&&c.tooltipFormatter(a)||a.point.tooltipFormatter(c.tooltipOptions.pointFormat))});d.push(a.options.footerFormat||
"");return d.join("")},refresh:function(a,b){var c=this.chart,d=this.label,e=this.options,f,g,h,i={},j,k=[];j=e.formatter||this.defaultFormatter;var i=c.hoverPoints,m,l=e.crosshairs;h=this.shared;clearTimeout(this.hideTimer);this.followPointer=ha(a)[0].series.tooltipOptions.followPointer;g=this.getAnchor(a,b);f=g[0];g=g[1];h&&(!a.series||!a.series.noSharedTooltip)?(c.hoverPoints=a,i&&n(i,function(a){a.setState()}),n(a,function(a){a.setState("hover");k.push(a.getLabelConfig())}),i={x:a[0].category,
y:a[0].y},i.points=k,a=a[0]):i=a.getLabelConfig();j=j.call(i,this);i=a.series;h=h||!i.isCartesian||i.tooltipOutsidePlot||c.isInsidePlot(f,g);j===!1||!h?this.hide():(this.isHidden&&(Ta(d),d.attr("opacity",1).show()),d.attr({text:j}),m=e.borderColor||a.color||i.color||"#606060",d.attr({stroke:m}),this.updatePosition({plotX:f,plotY:g}),this.isHidden=!1);if(l){l=ha(l);for(d=l.length;d--;)if(e=a.series[d?"yAxis":"xAxis"],l[d]&&e)if(h=d?o(a.stackY,a.y):a.x,e.isLog&&(h=ka(h)),e=e.getPlotLinePath(h,1),this.crosshairs[d])this.crosshairs[d].attr({d:e,
visibility:"visible"});else{h={"stroke-width":l[d].width||1,stroke:l[d].color||"#C0C0C0",zIndex:l[d].zIndex||2};if(l[d].dashStyle)h.dashstyle=l[d].dashStyle;this.crosshairs[d]=c.renderer.path(e).attr(h).add()}}D(c,"tooltipRefresh",{text:j,x:f+c.plotLeft,y:g+c.plotTop,borderColor:m})},updatePosition:function(a){var b=this.chart,c=this.label,c=(this.options.positioner||this.getPosition).call(this,c.width,c.height,a);this.move(t(c.x),t(c.y),a.plotX+b.plotLeft,a.plotY+b.plotTop)}};rb.prototype={init:function(a,
b){var c=$?"":b.chart.zoomType,d=a.inverted,e;this.options=b;this.chart=a;this.zoomX=e=/x/.test(c);this.zoomY=c=/y/.test(c);this.zoomHor=e&&!d||c&&d;this.zoomVert=c&&!d||e&&d;this.pinchDown=[];this.lastValidTouch={};if(b.tooltip.enabled)a.tooltip=new qb(a,b.tooltip);this.setDOMEvents()},normalize:function(a){var b,c,d,a=a||O.event;if(!a.target)a.target=a.srcElement;a=Qb(a);d=a.touches?a.touches.item(0):a;this.chartPosition=b=Ub(this.chart.container);d.pageX===y?(c=a.x,b=a.y):(c=d.pageX-b.left,b=d.pageY-
b.top);return v(a,{chartX:t(c),chartY:t(b)})},getCoordinates:function(a){var b={xAxis:[],yAxis:[]};n(this.chart.axes,function(c){b[c.isXAxis?"xAxis":"yAxis"].push({axis:c,value:c.toValue(a[c.horiz?"chartX":"chartY"])})});return b},getIndex:function(a){var b=this.chart;return b.inverted?b.plotHeight+b.plotTop-a.chartY:a.chartX-b.plotLeft},runPointActions:function(a){var b=this.chart,c=b.series,d=b.tooltip,e,f=b.hoverPoint,g=b.hoverSeries,h,i,j=b.chartWidth,k=this.getIndex(a);if(d&&this.options.tooltip.shared&&
(!g||!g.noSharedTooltip)){e=[];h=c.length;for(i=0;i<h;i++)if(c[i].visible&&c[i].options.enableMouseTracking!==!1&&!c[i].noSharedTooltip&&c[i].tooltipPoints.length&&(b=c[i].tooltipPoints[k],b.series))b._dist=Q(k-b.clientX),j=K(j,b._dist),e.push(b);for(h=e.length;h--;)e[h]._dist>j&&e.splice(h,1);if(e.length&&e[0].clientX!==this.hoverX)d.refresh(e,a),this.hoverX=e[0].clientX}if(g&&g.tracker){if((b=g.tooltipPoints[k])&&b!==f)b.onMouseOver(a)}else d&&d.followPointer&&!d.isHidden&&(a=d.getAnchor([{}],a),
d.updatePosition({plotX:a[0],plotY:a[1]}))},reset:function(a){var b=this.chart,c=b.hoverSeries,d=b.hoverPoint,e=b.tooltip,b=e&&e.shared?b.hoverPoints:d;(a=a&&e&&b)&&ha(b)[0].plotX===y&&(a=!1);if(a)e.refresh(b);else{if(d)d.onMouseOut();if(c)c.onMouseOut();e&&(e.hide(),e.hideCrosshairs());this.hoverX=null}},scaleGroups:function(a,b){var c=this.chart;n(c.series,function(d){d.xAxis&&d.xAxis.zoomEnabled&&(d.group.attr(a),d.markerGroup&&(d.markerGroup.attr(a),d.markerGroup.clip(b?c.clipRect:null)),d.dataLabelsGroup&&
d.dataLabelsGroup.attr(a))});c.clipRect.attr(b||c.clipBox)},pinchTranslateDirection:function(a,b,c,d,e,f,g){var h=this.chart,i=a?"x":"y",j=a?"X":"Y",k="chart"+j,m=a?"width":"height",l=h["plot"+(a?"Left":"Top")],p,s,o=1,n=h.inverted,w=h.bounds[a?"h":"v"],q=b.length===1,t=b[0][k],r=c[0][k],v=!q&&b[1][k],u=!q&&c[1][k],x,c=function(){!q&&Q(t-v)>20&&(o=Q(r-u)/Q(t-v));s=(l-r)/o+t;p=h["plot"+(a?"Width":"Height")]/o};c();b=s;b<w.min?(b=w.min,x=!0):b+p>w.max&&(b=w.max-p,x=!0);x?(r-=0.8*(r-g[i][0]),q||(u-=
0.8*(u-g[i][1])),c()):g[i]=[r,u];n||(f[i]=s-l,f[m]=p);f=n?1/o:o;e[m]=p;e[i]=b;d[n?a?"scaleY":"scaleX":"scale"+j]=o;d["translate"+j]=f*l+(r-f*t)},pinch:function(a){var b=this,c=b.chart,d=b.pinchDown,e=c.tooltip&&c.tooltip.options.followTouchMove,f=a.touches,g=f.length,h=b.lastValidTouch,i=b.zoomHor||b.pinchHor,j=b.zoomVert||b.pinchVert,k=i||j,m=b.selectionMarker,l={},p={};a.type==="touchstart"&&(e||k)&&a.preventDefault();La(f,function(a){return b.normalize(a)});if(a.type==="touchstart")n(f,function(a,
b){d[b]={chartX:a.chartX,chartY:a.chartY}}),h.x=[d[0].chartX,d[1]&&d[1].chartX],h.y=[d[0].chartY,d[1]&&d[1].chartY],n(c.axes,function(a){if(a.zoomEnabled){var b=c.bounds[a.horiz?"h":"v"],d=a.minPixelPadding,e=a.toPixels(a.dataMin),f=a.toPixels(a.dataMax),g=K(e,f),e=q(e,f);b.min=K(a.pos,g-d);b.max=q(a.pos+a.len,e+d)}});else if(d.length){if(!m)b.selectionMarker=m=v({destroy:ta},c.plotBox);i&&b.pinchTranslateDirection(!0,d,f,l,m,p,h);j&&b.pinchTranslateDirection(!1,d,f,l,m,p,h);b.hasPinched=k;b.scaleGroups(l,
p);!k&&e&&g===1&&this.runPointActions(b.normalize(a))}},dragStart:function(a){var b=this.chart;b.mouseIsDown=a.type;b.cancelClick=!1;b.mouseDownX=this.mouseDownX=a.chartX;this.mouseDownY=a.chartY},drag:function(a){var b=this.chart,c=b.options.chart,d=a.chartX,a=a.chartY,e=this.zoomHor,f=this.zoomVert,g=b.plotLeft,h=b.plotTop,i=b.plotWidth,j=b.plotHeight,k,m=this.mouseDownX,l=this.mouseDownY;d<g?d=g:d>g+i&&(d=g+i);a<h?a=h:a>h+j&&(a=h+j);this.hasDragged=Math.sqrt(Math.pow(m-d,2)+Math.pow(l-a,2));if(this.hasDragged>
10){k=b.isInsidePlot(m-g,l-h);if(b.hasCartesianSeries&&(this.zoomX||this.zoomY)&&k&&!this.selectionMarker)this.selectionMarker=b.renderer.rect(g,h,e?1:i,f?1:j,0).attr({fill:c.selectionMarkerFill||"rgba(69,114,167,0.25)",zIndex:7}).add();this.selectionMarker&&e&&(e=d-m,this.selectionMarker.attr({width:Q(e),x:(e>0?0:e)+m}));this.selectionMarker&&f&&(e=a-l,this.selectionMarker.attr({height:Q(e),y:(e>0?0:e)+l}));k&&!this.selectionMarker&&c.panning&&b.pan(d)}},drop:function(a){var b=this.chart,c=this.hasPinched;
if(this.selectionMarker){var d={xAxis:[],yAxis:[],originalEvent:a.originalEvent||a},e=this.selectionMarker,f=e.x,g=e.y,h;if(this.hasDragged||c)n(b.axes,function(a){if(a.zoomEnabled){var b=a.horiz,c=a.toValue(b?f:g),b=a.toValue(b?f+e.width:g+e.height);!isNaN(c)&&!isNaN(b)&&(d[a.xOrY+"Axis"].push({axis:a,min:K(c,b),max:q(c,b)}),h=!0)}}),h&&D(b,"selection",d,function(a){b.zoom(v(a,c?{animation:!1}:null))});this.selectionMarker=this.selectionMarker.destroy();c&&this.scaleGroups({translateX:b.plotLeft,
translateY:b.plotTop,scaleX:1,scaleY:1})}if(b)L(b.container,{cursor:b._cursor}),b.cancelClick=this.hasDragged>10,b.mouseIsDown=this.hasDragged=this.hasPinched=!1,this.pinchDown=[]},onContainerMouseDown:function(a){a=this.normalize(a);a.preventDefault&&a.preventDefault();this.dragStart(a)},onDocumentMouseUp:function(a){this.drop(a)},onDocumentMouseMove:function(a){var b=this.chart,c=this.chartPosition,d=b.hoverSeries,a=Qb(a);c&&d&&d.isCartesian&&!b.isInsidePlot(a.pageX-c.left-b.plotLeft,a.pageY-c.top-
b.plotTop)&&this.reset()},onContainerMouseLeave:function(){this.reset();this.chartPosition=null},onContainerMouseMove:function(a){var b=this.chart,a=this.normalize(a);a.returnValue=!1;b.mouseIsDown==="mousedown"&&this.drag(a);b.isInsidePlot(a.chartX-b.plotLeft,a.chartY-b.plotTop)&&!b.openMenu&&this.runPointActions(a)},inClass:function(a,b){for(var c;a;){if(c=A(a,"class"))if(c.indexOf(b)!==-1)return!0;else if(c.indexOf("highcharts-container")!==-1)return!1;a=a.parentNode}},onTrackerMouseOut:function(a){var b=
this.chart.hoverSeries;if(b&&!b.options.stickyTracking&&!this.inClass(a.toElement||a.relatedTarget,"highcharts-tooltip"))b.onMouseOut()},onContainerClick:function(a){var b=this.chart,c=b.hoverPoint,d=b.plotLeft,e=b.plotTop,f=b.inverted,g,h,i,a=this.normalize(a);a.cancelBubble=!0;if(!b.cancelClick)c&&this.inClass(a.target,"highcharts-tracker")?(g=this.chartPosition,h=c.plotX,i=c.plotY,v(c,{pageX:g.left+d+(f?b.plotWidth-i:h),pageY:g.top+e+(f?b.plotHeight-h:i)}),D(c.series,"click",v(a,{point:c})),b.hoverPoint&&
c.firePointEvent("click",a)):(v(a,this.getCoordinates(a)),b.isInsidePlot(a.chartX-d,a.chartY-e)&&D(b,"click",a))},onContainerTouchStart:function(a){var b=this.chart;a.touches.length===1?(a=this.normalize(a),b.isInsidePlot(a.chartX-b.plotLeft,a.chartY-b.plotTop)&&(this.runPointActions(a),this.pinch(a))):a.touches.length===2&&this.pinch(a)},onContainerTouchMove:function(a){(a.touches.length===1||a.touches.length===2)&&this.pinch(a)},onDocumentTouchEnd:function(a){this.drop(a)},setDOMEvents:function(){var a=
this,b=a.chart.container,c;this._events=c=[[b,"onmousedown","onContainerMouseDown"],[b,"onmousemove","onContainerMouseMove"],[b,"onclick","onContainerClick"],[b,"mouseleave","onContainerMouseLeave"],[z,"mousemove","onDocumentMouseMove"],[z,"mouseup","onDocumentMouseUp"]];fb&&c.push([b,"ontouchstart","onContainerTouchStart"],[b,"ontouchmove","onContainerTouchMove"],[z,"touchend","onDocumentTouchEnd"]);n(c,function(b){a["_"+b[2]]=function(c){a[b[2]](c)};b[1].indexOf("on")===0?b[0][b[1]]=a["_"+b[2]]:
J(b[0],b[1],a["_"+b[2]])})},destroy:function(){var a=this;n(a._events,function(b){b[1].indexOf("on")===0?b[0][b[1]]=null:ba(b[0],b[1],a["_"+b[2]])});delete a._events;clearInterval(a.tooltipTimeout)}};sb.prototype={init:function(a,b){var c=this,d=b.itemStyle,e=o(b.padding,8),f=b.itemMarginTop||0;this.options=b;if(b.enabled)c.baseline=u(d.fontSize)+3+f,c.itemStyle=d,c.itemHiddenStyle=x(d,b.itemHiddenStyle),c.itemMarginTop=f,c.padding=e,c.initialItemX=e,c.initialItemY=e-5,c.maxItemWidth=0,c.chart=a,
c.itemHeight=0,c.lastLineHeight=0,c.render(),J(c.chart,"endResize",function(){c.positionCheckboxes()})},colorizeItem:function(a,b){var c=this.options,d=a.legendItem,e=a.legendLine,f=a.legendSymbol,g=this.itemHiddenStyle.color,c=b?c.itemStyle.color:g,h=b?a.color:g,g=a.options&&a.options.marker,i={stroke:h,fill:h},j;d&&d.css({fill:c,color:c});e&&e.attr({stroke:h});if(f){if(g)for(j in g=a.convertAttribs(g),g)d=g[j],d!==y&&(i[j]=d);f.attr(i)}},positionItem:function(a){var b=this.options,c=b.symbolPadding,
b=!b.rtl,d=a._legendItemPos,e=d[0],d=d[1],f=a.checkbox;a.legendGroup&&a.legendGroup.translate(b?e:this.legendWidth-e-2*c-4,d);if(f)f.x=e,f.y=d},destroyItem:function(a){var b=a.checkbox;n(["legendItem","legendLine","legendSymbol","legendGroup"],function(b){a[b]&&a[b].destroy()});b&&Ra(a.checkbox)},destroy:function(){var a=this.group,b=this.box;if(b)this.box=b.destroy();if(a)this.group=a.destroy()},positionCheckboxes:function(a){var b=this.group.alignAttr,c,d=this.clipHeight||this.legendHeight;if(b)c=
b.translateY,n(this.allItems,function(e){var f=e.checkbox,g;f&&(g=c+f.y+(a||0)+3,L(f,{left:b.translateX+e.legendItemWidth+f.x-20+"px",top:g+"px",display:g>c-6&&g<c+d-6?"":S}))})},renderTitle:function(){var a=this.padding,b=this.options.title,c=0;if(b.text){if(!this.title)this.title=this.chart.renderer.label(b.text,a-3,a-4,null,null,null,null,null,"legend-title").attr({zIndex:1}).css(b.style).add(this.group);c=this.title.getBBox().height;this.contentGroup.attr({translateY:c})}this.titleHeight=c},renderItem:function(a){var w;
var b=this,c=b.chart,d=c.renderer,e=b.options,f=e.layout==="horizontal",g=e.symbolWidth,h=e.symbolPadding,i=b.itemStyle,j=b.itemHiddenStyle,k=b.padding,m=!e.rtl,l=e.width,p=e.itemMarginBottom||0,s=b.itemMarginTop,o=b.initialItemX,n=a.legendItem,t=a.series||a,r=t.options,v=r.showCheckbox,u=e.useHTML;if(!n&&(a.legendGroup=d.g("legend-item").attr({zIndex:1}).add(b.scrollGroup),t.drawLegendSymbol(b,a),a.legendItem=n=d.text(e.labelFormat?wa(e.labelFormat,a):e.labelFormatter.call(a),m?g+h:-h,b.baseline,
u).css(x(a.visible?i:j)).attr({align:m?"left":"right",zIndex:2}).add(a.legendGroup),(u?n:a.legendGroup).on("mouseover",function(){a.setState("hover");n.css(b.options.itemHoverStyle)}).on("mouseout",function(){n.css(a.visible?i:j);a.setState()}).on("click",function(b){var c=function(){a.setVisible()},b={browserEvent:b};a.firePointEvent?a.firePointEvent("legendItemClick",b,c):D(a,"legendItemClick",b,c)}),b.colorizeItem(a,a.visible),r&&v))a.checkbox=U("input",{type:"checkbox",checked:a.selected,defaultChecked:a.selected},
e.itemCheckboxStyle,c.container),J(a.checkbox,"click",function(b){D(a,"checkboxClick",{checked:b.target.checked},function(){a.select()})});d=n.getBBox();w=a.legendItemWidth=e.itemWidth||g+h+d.width+k+(v?20:0),e=w;b.itemHeight=g=d.height;if(f&&b.itemX-o+e>(l||c.chartWidth-2*k-o))b.itemX=o,b.itemY+=s+b.lastLineHeight+p,b.lastLineHeight=0;b.maxItemWidth=q(b.maxItemWidth,e);b.lastItemY=s+b.itemY+p;b.lastLineHeight=q(g,b.lastLineHeight);a._legendItemPos=[b.itemX,b.itemY];f?b.itemX+=e:(b.itemY+=s+g+p,b.lastLineHeight=
g);b.offsetWidth=l||q(f?b.itemX-o:e,b.offsetWidth)},render:function(){var a=this,b=a.chart,c=b.renderer,d=a.group,e,f,g,h,i=a.box,j=a.options,k=a.padding,m=j.borderWidth,l=j.backgroundColor;a.itemX=a.initialItemX;a.itemY=a.initialItemY;a.offsetWidth=0;a.lastItemY=0;if(!d)a.group=d=c.g("legend").attr({zIndex:7}).add(),a.contentGroup=c.g().attr({zIndex:1}).add(d),a.scrollGroup=c.g().add(a.contentGroup);a.renderTitle();e=[];n(b.series,function(a){var b=a.options;b.showInLegend&&!r(b.linkedTo)&&(e=e.concat(a.legendItems||
(b.legendType==="point"?a.data:a)))});Ib(e,function(a,b){return(a.options&&a.options.legendIndex||0)-(b.options&&b.options.legendIndex||0)});j.reversed&&e.reverse();a.allItems=e;a.display=f=!!e.length;n(e,function(b){a.renderItem(b)});g=j.width||a.offsetWidth;h=a.lastItemY+a.lastLineHeight+a.titleHeight;h=a.handleOverflow(h);if(m||l){g+=k;h+=k;if(i){if(g>0&&h>0)i[i.isNew?"attr":"animate"](i.crisp(null,null,null,g,h)),i.isNew=!1}else a.box=i=c.rect(0,0,g,h,j.borderRadius,m||0).attr({stroke:j.borderColor,
"stroke-width":m||0,fill:l||S}).add(d).shadow(j.shadow),i.isNew=!0;i[f?"show":"hide"]()}a.legendWidth=g;a.legendHeight=h;n(e,function(b){a.positionItem(b)});f&&d.align(v({width:g,height:h},j),!0,"spacingBox");b.isResizing||this.positionCheckboxes()},handleOverflow:function(a){var b=this,c=this.chart,d=c.renderer,e=this.options,f=e.y,f=c.spacingBox.height+(e.verticalAlign==="top"?-f:f)-this.padding,g=e.maxHeight,h=this.clipRect,i=e.navigation,j=o(i.animation,!0),k=i.arrowSize||12,m=this.nav;e.layout===
"horizontal"&&(f/=2);g&&(f=K(f,g));if(a>f&&!e.useHTML){this.clipHeight=c=f-20-this.titleHeight;this.pageCount=ja(a/c);this.currentPage=o(this.currentPage,1);this.fullHeight=a;if(!h)h=b.clipRect=d.clipRect(0,0,9999,0),b.contentGroup.clip(h);h.attr({height:c});if(!m)this.nav=m=d.g().attr({zIndex:1}).add(this.group),this.up=d.symbol("triangle",0,0,k,k).on("click",function(){b.scroll(-1,j)}).add(m),this.pager=d.text("",15,10).css(i.style).add(m),this.down=d.symbol("triangle-down",0,0,k,k).on("click",
function(){b.scroll(1,j)}).add(m);b.scroll(0);a=f}else if(m)h.attr({height:c.chartHeight}),m.hide(),this.scrollGroup.attr({translateY:1}),this.clipHeight=0;return a},scroll:function(a,b){var c=this.pageCount,d=this.currentPage+a,e=this.clipHeight,f=this.options.navigation,g=f.activeColor,h=f.inactiveColor,f=this.pager,i=this.padding;d>c&&(d=c);if(d>0)b!==y&&Ia(b,this.chart),this.nav.attr({translateX:i,translateY:e+7+this.titleHeight,visibility:"visible"}),this.up.attr({fill:d===1?h:g}).css({cursor:d===
1?"default":"pointer"}),f.attr({text:d+"/"+this.pageCount}),this.down.attr({x:18+this.pager.getBBox().width,fill:d===c?h:g}).css({cursor:d===c?"default":"pointer"}),e=-K(e*(d-1),this.fullHeight-e+i)+1,this.scrollGroup.animate({translateY:e}),f.attr({text:d+"/"+c}),this.currentPage=d,this.positionCheckboxes(e)}};tb.prototype={init:function(a,b){var c,d=a.series;a.series=null;c=x(N,a);c.series=a.series=d;var d=c.chart,e=d.margin,e=V(e)?e:[e,e,e,e];this.optionsMarginTop=o(d.marginTop,e[0]);this.optionsMarginRight=
o(d.marginRight,e[1]);this.optionsMarginBottom=o(d.marginBottom,e[2]);this.optionsMarginLeft=o(d.marginLeft,e[3]);this.runChartClick=(e=d.events)&&!!e.click;this.bounds={h:{},v:{}};this.callback=b;this.isResizing=0;this.options=c;this.axes=[];this.series=[];this.hasCartesianSeries=d.showAxes;var f=this,g;f.index=Ba.length;Ba.push(f);d.reflow!==!1&&J(f,"load",function(){f.initReflow()});if(e)for(g in e)J(f,g,e[g]);f.xAxis=[];f.yAxis=[];f.animation=$?!1:o(d.animation,!0);f.pointCount=0;f.counters=new Hb;
f.firstRender()},initSeries:function(a){var b=this.options.chart;(b=aa[a.type||b.type||b.defaultSeriesType])||qa(17,!0);b=new b;b.init(this,a);return b},addSeries:function(a,b,c){var d,e=this;a&&(b=o(b,!0),D(e,"addSeries",{options:a},function(){d=e.initSeries(a);e.isDirtyLegend=!0;b&&e.redraw(c)}));return d},addAxis:function(a,b,c,d){var b=b?"xAxis":"yAxis",e=this.options;new ab(this,x(a,{index:this[b].length}));e[b]=ha(e[b]||{});e[b].push(a);o(c,!0)&&this.redraw(d)},isInsidePlot:function(a,b,c){var d=
c?b:a,a=c?a:b;return d>=0&&d<=this.plotWidth&&a>=0&&a<=this.plotHeight},adjustTickAmounts:function(){this.options.chart.alignTicks!==!1&&n(this.axes,function(a){a.adjustTickAmount()});this.maxTicks=null},redraw:function(a){var b=this.axes,c=this.series,d=this.pointer,e=this.legend,f=this.isDirtyLegend,g,h=this.isDirtyBox,i=c.length,j=i,k=this.renderer,m=k.isHidden(),l=[];Ia(a,this);for(m&&this.cloneRenderTo();j--;)if(a=c[j],a.isDirty&&a.options.stacking){g=!0;break}if(g)for(j=i;j--;)if(a=c[j],a.options.stacking)a.isDirty=
!0;n(c,function(a){a.isDirty&&a.options.legendType==="point"&&(f=!0)});if(f&&e.options.enabled)e.render(),this.isDirtyLegend=!1;if(this.hasCartesianSeries){if(!this.isResizing)this.maxTicks=null,n(b,function(a){a.setScale()});this.adjustTickAmounts();this.getMargins();n(b,function(a){if(a.isDirtyExtremes)a.isDirtyExtremes=!1,l.push(function(){D(a,"afterSetExtremes",a.getExtremes())});if(a.isDirty||h||g)a.redraw(),h=!0})}h&&this.drawChartBox();n(c,function(a){a.isDirty&&a.visible&&(!a.isCartesian||
a.xAxis)&&a.redraw()});d&&d.reset&&d.reset(!0);k.draw();D(this,"redraw");m&&this.cloneRenderTo(!0);n(l,function(a){a.call()})},showLoading:function(a){var b=this.options,c=this.loadingDiv,d=b.loading;if(!c)this.loadingDiv=c=U(ya,{className:"highcharts-loading"},v(d.style,{zIndex:10,display:S}),this.container),this.loadingSpan=U("span",null,d.labelStyle,c);this.loadingSpan.innerHTML=a||b.lang.loading;if(!this.loadingShown)L(c,{opacity:0,display:"",left:this.plotLeft+"px",top:this.plotTop+"px",width:this.plotWidth+
"px",height:this.plotHeight+"px"}),wb(c,{opacity:d.style.opacity},{duration:d.showDuration||0}),this.loadingShown=!0},hideLoading:function(){var a=this.options,b=this.loadingDiv;b&&wb(b,{opacity:0},{duration:a.loading.hideDuration||100,complete:function(){L(b,{display:S})}});this.loadingShown=!1},get:function(a){var b=this.axes,c=this.series,d,e;for(d=0;d<b.length;d++)if(b[d].options.id===a)return b[d];for(d=0;d<c.length;d++)if(c[d].options.id===a)return c[d];for(d=0;d<c.length;d++){e=c[d].points||
[];for(b=0;b<e.length;b++)if(e[b].id===a)return e[b]}return null},getAxes:function(){var a=this,b=this.options,c=b.xAxis=ha(b.xAxis||{}),b=b.yAxis=ha(b.yAxis||{});n(c,function(a,b){a.index=b;a.isX=!0});n(b,function(a,b){a.index=b});c=c.concat(b);n(c,function(b){new ab(a,b)});a.adjustTickAmounts()},getSelectedPoints:function(){var a=[];n(this.series,function(b){a=a.concat(ob(b.points||[],function(a){return a.selected}))});return a},getSelectedSeries:function(){return ob(this.series,function(a){return a.selected})},
showResetZoom:function(){var a=this,b=N.lang,c=a.options.chart.resetZoomButton,d=c.theme,e=d.states,f=c.relativeTo==="chart"?null:"plotBox";this.resetZoomButton=a.renderer.button(b.resetZoom,null,null,function(){a.zoomOut()},d,e&&e.hover).attr({align:c.position.align,title:b.resetZoomTitle}).add().align(c.position,!1,f)},zoomOut:function(){var a=this;D(a,"selection",{resetSelection:!0},function(){a.zoom()})},zoom:function(a){var b,c=this.pointer,d=!1,e;!a||a.resetSelection?n(this.axes,function(a){b=
a.zoom()}):n(a.xAxis.concat(a.yAxis),function(a){var e=a.axis,h=e.isXAxis;if(c[h?"zoomX":"zoomY"]||c[h?"pinchX":"pinchY"])b=e.zoom(a.min,a.max),e.displayBtn&&(d=!0)});e=this.resetZoomButton;if(d&&!e)this.showResetZoom();else if(!d&&V(e))this.resetZoomButton=e.destroy();b&&this.redraw(o(this.options.chart.animation,a&&a.animation,this.pointCount<100))},pan:function(a){var b=this.xAxis[0],c=this.mouseDownX,d=b.pointRange/2,e=b.getExtremes(),f=b.translate(c-a,!0)+d,c=b.translate(c+this.plotWidth-a,!0)-
d;(d=this.hoverPoints)&&n(d,function(a){a.setState()});b.series.length&&f>K(e.dataMin,e.min)&&c<q(e.dataMax,e.max)&&b.setExtremes(f,c,!0,!1,{trigger:"pan"});this.mouseDownX=a;L(this.container,{cursor:"move"})},setTitle:function(a,b){var f;var c=this,d=c.options,e;e=d.title=x(d.title,a);f=d.subtitle=x(d.subtitle,b),d=f;n([["title",a,e],["subtitle",b,d]],function(a){var b=a[0],d=c[b],e=a[1],a=a[2];d&&e&&(c[b]=d=d.destroy());a&&a.text&&!d&&(c[b]=c.renderer.text(a.text,0,0,a.useHTML).attr({align:a.align,
"class":"highcharts-"+b,zIndex:a.zIndex||4}).css(a.style).add().align(a,!1,"spacingBox"))})},getChartSize:function(){var a=this.options.chart,b=this.renderToClone||this.renderTo;this.containerWidth=gb(b,"width");this.containerHeight=gb(b,"height");this.chartWidth=q(0,a.width||this.containerWidth||600);this.chartHeight=q(0,o(a.height,this.containerHeight>19?this.containerHeight:400))},cloneRenderTo:function(a){var b=this.renderToClone,c=this.container;a?b&&(this.renderTo.appendChild(c),Ra(b),delete this.renderToClone):
(c&&this.renderTo.removeChild(c),this.renderToClone=b=this.renderTo.cloneNode(0),L(b,{position:"absolute",top:"-9999px",display:"block"}),z.body.appendChild(b),c&&b.appendChild(c))},getContainer:function(){var a,b=this.options.chart,c,d,e;this.renderTo=a=b.renderTo;e="highcharts-"+ub++;if(fa(a))this.renderTo=a=z.getElementById(a);a||qa(13,!0);c=u(A(a,"data-highcharts-chart"));!isNaN(c)&&Ba[c]&&Ba[c].destroy();A(a,"data-highcharts-chart",this.index);a.innerHTML="";a.offsetWidth||this.cloneRenderTo();
this.getChartSize();c=this.chartWidth;d=this.chartHeight;this.container=a=U(ya,{className:"highcharts-container"+(b.className?" "+b.className:""),id:e},v({position:"relative",overflow:"hidden",width:c+"px",height:d+"px",textAlign:"left",lineHeight:"normal",zIndex:0,"-webkit-tap-highlight-color":"rgba(0,0,0,0)"},b.style),this.renderToClone||a);this._cursor=a.style.cursor;this.renderer=b.forExport?new Ca(a,c,d,!0):new Sa(a,c,d);$&&this.renderer.create(this,a,c,d)},getMargins:function(){var a=this.options.chart,
b=a.spacingTop,c=a.spacingRight,d=a.spacingBottom,a=a.spacingLeft,e,f=this.legend,g=this.optionsMarginTop,h=this.optionsMarginLeft,i=this.optionsMarginRight,j=this.optionsMarginBottom,k=this.options.title,m=this.options.subtitle,l=this.options.legend,p=o(l.margin,10),s=l.x,t=l.y,B=l.align,w=l.verticalAlign;this.resetMargins();e=this.axisOffset;if((this.title||this.subtitle)&&!r(this.optionsMarginTop))if(m=q(this.title&&!k.floating&&!k.verticalAlign&&k.y||0,this.subtitle&&!m.floating&&!m.verticalAlign&&
m.y||0))this.plotTop=q(this.plotTop,m+o(k.margin,15)+b);if(f.display&&!l.floating)if(B==="right"){if(!r(i))this.marginRight=q(this.marginRight,f.legendWidth-s+p+c)}else if(B==="left"){if(!r(h))this.plotLeft=q(this.plotLeft,f.legendWidth+s+p+a)}else if(w==="top"){if(!r(g))this.plotTop=q(this.plotTop,f.legendHeight+t+p+b)}else if(w==="bottom"&&!r(j))this.marginBottom=q(this.marginBottom,f.legendHeight-t+p+d);this.extraBottomMargin&&(this.marginBottom+=this.extraBottomMargin);this.extraTopMargin&&(this.plotTop+=
this.extraTopMargin);this.hasCartesianSeries&&n(this.axes,function(a){a.getOffset()});r(h)||(this.plotLeft+=e[3]);r(g)||(this.plotTop+=e[0]);r(j)||(this.marginBottom+=e[2]);r(i)||(this.marginRight+=e[1]);this.setChartSize()},initReflow:function(){function a(a){var g=c.width||gb(d,"width"),h=c.height||gb(d,"height"),a=a?a.target:O;if(!b.hasUserSize&&g&&h&&(a===O||a===z)){if(g!==b.containerWidth||h!==b.containerHeight)clearTimeout(e),b.reflowTimeout=e=setTimeout(function(){if(b.container)b.setSize(g,
h,!1),b.hasUserSize=null},100);b.containerWidth=g;b.containerHeight=h}}var b=this,c=b.options.chart,d=b.renderTo,e;J(O,"resize",a);J(b,"destroy",function(){ba(O,"resize",a)})},setSize:function(a,b,c){var d=this,e,f,g;d.isResizing+=1;g=function(){d&&D(d,"endResize",null,function(){d.isResizing-=1})};Ia(c,d);d.oldChartHeight=d.chartHeight;d.oldChartWidth=d.chartWidth;if(r(a))d.chartWidth=e=q(0,t(a)),d.hasUserSize=!!e;if(r(b))d.chartHeight=f=q(0,t(b));L(d.container,{width:e+"px",height:f+"px"});d.setChartSize(!0);
d.renderer.setSize(e,f,c);d.maxTicks=null;n(d.axes,function(a){a.isDirty=!0;a.setScale()});n(d.series,function(a){a.isDirty=!0});d.isDirtyLegend=!0;d.isDirtyBox=!0;d.getMargins();d.redraw(c);d.oldChartHeight=null;D(d,"resize");za===!1?g():setTimeout(g,za&&za.duration||500)},setChartSize:function(a){var b=this.inverted,c=this.renderer,d=this.chartWidth,e=this.chartHeight,f=this.options.chart,g=f.spacingTop,h=f.spacingRight,i=f.spacingBottom,j=f.spacingLeft,k=this.clipOffset,m,l,p,o;this.plotLeft=m=
t(this.plotLeft);this.plotTop=l=t(this.plotTop);this.plotWidth=p=q(0,t(d-m-this.marginRight));this.plotHeight=o=q(0,t(e-l-this.marginBottom));this.plotSizeX=b?o:p;this.plotSizeY=b?p:o;this.plotBorderWidth=b=f.plotBorderWidth||0;this.spacingBox=c.spacingBox={x:j,y:g,width:d-j-h,height:e-g-i};this.plotBox=c.plotBox={x:m,y:l,width:p,height:o};c=ja(q(b,k[3])/2);d=ja(q(b,k[0])/2);this.clipBox={x:c,y:d,width:T(this.plotSizeX-q(b,k[1])/2-c),height:T(this.plotSizeY-q(b,k[2])/2-d)};a||n(this.axes,function(a){a.setAxisSize();
a.setAxisTranslation()})},resetMargins:function(){var a=this.options.chart,b=a.spacingRight,c=a.spacingBottom,d=a.spacingLeft;this.plotTop=o(this.optionsMarginTop,a.spacingTop);this.marginRight=o(this.optionsMarginRight,b);this.marginBottom=o(this.optionsMarginBottom,c);this.plotLeft=o(this.optionsMarginLeft,d);this.axisOffset=[0,0,0,0];this.clipOffset=[0,0,0,0]},drawChartBox:function(){var a=this.options.chart,b=this.renderer,c=this.chartWidth,d=this.chartHeight,e=this.chartBackground,f=this.plotBackground,
g=this.plotBorder,h=this.plotBGImage,i=a.borderWidth||0,j=a.backgroundColor,k=a.plotBackgroundColor,m=a.plotBackgroundImage,l=a.plotBorderWidth||0,p,o=this.plotLeft,n=this.plotTop,t=this.plotWidth,q=this.plotHeight,r=this.plotBox,v=this.clipRect,u=this.clipBox;p=i+(a.shadow?8:0);if(i||j)if(e)e.animate(e.crisp(null,null,null,c-p,d-p));else{e={fill:j||S};if(i)e.stroke=a.borderColor,e["stroke-width"]=i;this.chartBackground=b.rect(p/2,p/2,c-p,d-p,a.borderRadius,i).attr(e).add().shadow(a.shadow)}if(k)f?
f.animate(r):this.plotBackground=b.rect(o,n,t,q,0).attr({fill:k}).add().shadow(a.plotShadow);if(m)h?h.animate(r):this.plotBGImage=b.image(m,o,n,t,q).add();v?v.animate({width:u.width,height:u.height}):this.clipRect=b.clipRect(u);if(l)g?g.animate(g.crisp(null,o,n,t,q)):this.plotBorder=b.rect(o,n,t,q,0,l).attr({stroke:a.plotBorderColor,"stroke-width":l,zIndex:1}).add();this.isDirtyBox=!1},propFromSeries:function(){var a=this,b=a.options.chart,c,d=a.options.series,e,f;n(["inverted","angular","polar"],
function(g){c=aa[b.type||b.defaultSeriesType];f=a[g]||b[g]||c&&c.prototype[g];for(e=d&&d.length;!f&&e--;)(c=aa[d[e].type])&&c.prototype[g]&&(f=!0);a[g]=f})},render:function(){var a=this,b=a.axes,c=a.renderer,d=a.options,e=d.labels,f=d.credits,g;a.setTitle();a.legend=new sb(a,d.legend);n(b,function(a){a.setScale()});a.getMargins();a.maxTicks=null;n(b,function(a){a.setTickPositions(!0);a.setMaxTicks()});a.adjustTickAmounts();a.getMargins();a.drawChartBox();a.hasCartesianSeries&&n(b,function(a){a.render()});
if(!a.seriesGroup)a.seriesGroup=c.g("series-group").attr({zIndex:3}).add();n(a.series,function(a){a.translate();a.setTooltipPoints();a.render()});e.items&&n(e.items,function(b){var d=v(e.style,b.style),f=u(d.left)+a.plotLeft,g=u(d.top)+a.plotTop+12;delete d.left;delete d.top;c.text(b.html,f,g).attr({zIndex:2}).css(d).add()});if(f.enabled&&!a.credits)g=f.href,a.credits=c.text(f.text,0,0).on("click",function(){if(g)location.href=g}).attr({align:f.position.align,zIndex:8}).css(f.style).add().align(f.position);
a.hasRendered=!0},destroy:function(){var a=this,b=a.axes,c=a.series,d=a.container,e,f=d&&d.parentNode;D(a,"destroy");Ba[a.index]=y;a.renderTo.removeAttribute("data-highcharts-chart");ba(a);for(e=b.length;e--;)b[e]=b[e].destroy();for(e=c.length;e--;)c[e]=c[e].destroy();n("title,subtitle,chartBackground,plotBackground,plotBGImage,plotBorder,seriesGroup,clipRect,credits,pointer,scroller,rangeSelector,legend,resetZoomButton,tooltip,renderer".split(","),function(b){var c=a[b];c&&c.destroy&&(a[b]=c.destroy())});
if(d)d.innerHTML="",ba(d),f&&Ra(d);for(e in a)delete a[e]},isReadyToRender:function(){var a=this;return!Z&&O==O.top&&z.readyState!=="complete"||$&&!O.canvg?($?Rb.push(function(){a.firstRender()},a.options.global.canvasToolsURL):z.attachEvent("onreadystatechange",function(){z.detachEvent("onreadystatechange",a.firstRender);z.readyState==="complete"&&a.firstRender()}),!1):!0},firstRender:function(){var a=this,b=a.options,c=a.callback;if(a.isReadyToRender())a.getContainer(),D(a,"init"),a.resetMargins(),
a.setChartSize(),a.propFromSeries(),a.getAxes(),n(b.series||[],function(b){a.initSeries(b)}),D(a,"beforeRender"),a.pointer=new rb(a,b),a.render(),a.renderer.draw(),c&&c.apply(a,[a]),n(a.callbacks,function(b){b.apply(a,[a])}),a.cloneRenderTo(!0),D(a,"load")}};tb.prototype.callbacks=[];var Na=function(){};Na.prototype={init:function(a,b,c){this.series=a;this.applyOptions(b,c);this.pointAttr={};if(a.options.colorByPoint&&(b=a.options.colors||a.chart.options.colors,this.color=this.color||b[a.colorCounter++],
a.colorCounter===b.length))a.colorCounter=0;a.chart.pointCount++;return this},applyOptions:function(a,b){var c=this.series,d=c.pointValKey,a=Na.prototype.optionsToObject.call(this,a);v(this,a);this.options=this.options?v(this.options,a):a;if(d)this.y=this[d];if(this.x===y&&c)this.x=b===y?c.autoIncrement():b;return this},optionsToObject:function(a){var b,c=this.series,d=c.pointArrayMap||["y"],e=d.length,f=0,g=0;if(typeof a==="number"||a===null)b={y:a};else if(Da(a)){b={};if(a.length>e){c=typeof a[0];
if(c==="string")b.name=a[0];else if(c==="number")b.x=a[0];f++}for(;g<e;)b[d[g++]]=a[f++]}else if(typeof a==="object"){b=a;if(a.dataLabels)c._hasPointLabels=!0;if(a.marker)c._hasPointMarkers=!0}return b},destroy:function(){var a=this.series.chart,b=a.hoverPoints,c;a.pointCount--;if(b&&(this.setState(),ga(b,this),!b.length))a.hoverPoints=null;if(this===a.hoverPoint)this.onMouseOut();if(this.graphic||this.dataLabel)ba(this),this.destroyElements();this.legendItem&&a.legend.destroyItem(this);for(c in this)this[c]=
null},destroyElements:function(){for(var a="graphic,dataLabel,dataLabelUpper,group,connector,shadowGroup".split(","),b,c=6;c--;)b=a[c],this[b]&&(this[b]=this[b].destroy())},getLabelConfig:function(){return{x:this.category,y:this.y,key:this.name||this.category,series:this.series,point:this,percentage:this.percentage,total:this.total||this.stackTotal}},select:function(a,b){var c=this,d=c.series,e=d.chart,a=o(a,!c.selected);c.firePointEvent(a?"select":"unselect",{accumulate:b},function(){c.selected=
c.options.selected=a;d.options.data[la(c,d.data)]=c.options;c.setState(a&&"select");b||n(e.getSelectedPoints(),function(a){if(a.selected&&a!==c)a.selected=a.options.selected=!1,d.options.data[la(a,d.data)]=a.options,a.setState(""),a.firePointEvent("unselect")})})},onMouseOver:function(a){var b=this.series,c=b.chart,d=c.tooltip,e=c.hoverPoint;if(e&&e!==this)e.onMouseOut();this.firePointEvent("mouseOver");d&&(!d.shared||b.noSharedTooltip)&&d.refresh(this,a);this.setState("hover");c.hoverPoint=this},
onMouseOut:function(){var a=this.series.chart,b=a.hoverPoints;if(!b||la(this,b)===-1)this.firePointEvent("mouseOut"),this.setState(),a.hoverPoint=null},tooltipFormatter:function(a){var b=this.series,c=b.tooltipOptions,d=o(c.valueDecimals,""),e=c.valuePrefix||"",f=c.valueSuffix||"";n(b.pointArrayMap||["y"],function(b){b="{point."+b;if(e||f)a=a.replace(b+"}",e+b+"}"+f);a=a.replace(b+"}",b+":,."+d+"f}")});return wa(a,{point:this,series:this.series})},update:function(a,b,c){var d=this,e=d.series,f=d.graphic,
g,h=e.data,i=e.chart,b=o(b,!0);d.firePointEvent("update",{options:a},function(){d.applyOptions(a);V(a)&&(e.getAttribs(),f&&f.attr(d.pointAttr[e.state]));g=la(d,h);e.xData[g]=d.x;e.yData[g]=e.toYData?e.toYData(d):d.y;e.zData[g]=d.z;e.options.data[g]=d.options;e.isDirty=!0;e.isDirtyData=!0;b&&i.redraw(c)})},remove:function(a,b){var c=this,d=c.series,e=d.chart,f,g=d.data;Ia(b,e);a=o(a,!0);c.firePointEvent("remove",null,function(){f=la(c,g);g.splice(f,1);d.options.data.splice(f,1);d.xData.splice(f,1);
d.yData.splice(f,1);d.zData.splice(f,1);c.destroy();d.isDirty=!0;d.isDirtyData=!0;a&&e.redraw()})},firePointEvent:function(a,b,c){var d=this,e=this.series.options;(e.point.events[a]||d.options&&d.options.events&&d.options.events[a])&&this.importEvents();a==="click"&&e.allowPointSelect&&(c=function(a){d.select(null,a.ctrlKey||a.metaKey||a.shiftKey)});D(this,a,b,c)},importEvents:function(){if(!this.hasImportedEvents){var a=x(this.series.options.point,this.options).events,b;this.events=a;for(b in a)J(this,
b,a[b]);this.hasImportedEvents=!0}},setState:function(a){var b=this.plotX,c=this.plotY,d=this.series,e=d.options.states,f=X[d.type].marker&&d.options.marker,g=f&&!f.enabled,h=f&&f.states[a],i=h&&h.enabled===!1,j=d.stateMarkerGraphic,k=this.marker||{},m=d.chart,l=this.pointAttr,a=a||"";if(!(a===this.state||this.selected&&a!=="select"||e[a]&&e[a].enabled===!1||a&&(i||g&&!h.enabled))){if(this.graphic)e=f&&this.graphic.symbolName&&l[a].r,this.graphic.attr(x(l[a],e?{x:b-e,y:c-e,width:2*e,height:2*e}:{}));
else{if(a&&h)e=h.radius,k=k.symbol||d.symbol,j&&j.currentSymbol!==k&&(j=j.destroy()),j?j.attr({x:b-e,y:c-e}):(d.stateMarkerGraphic=j=m.renderer.symbol(k,b-e,c-e,2*e,2*e).attr(l[a]).add(d.markerGroup),j.currentSymbol=k);if(j)j[a&&m.isInsidePlot(b,c)?"show":"hide"]()}this.state=a}}};var R=function(){};R.prototype={isCartesian:!0,type:"line",pointClass:Na,sorted:!0,requireSorting:!0,pointAttrToOptions:{stroke:"lineColor","stroke-width":"lineWidth",fill:"fillColor",r:"radius"},colorCounter:0,init:function(a,
b){var c,d,e=a.series;this.chart=a;this.options=b=this.setOptions(b);this.bindAxes();v(this,{name:b.name,state:"",pointAttr:{},visible:b.visible!==!1,selected:b.selected===!0});if($)b.animation=!1;d=b.events;for(c in d)J(this,c,d[c]);if(d&&d.click||b.point&&b.point.events&&b.point.events.click||b.allowPointSelect)a.runTrackerClick=!0;this.getColor();this.getSymbol();this.setData(b.data,!1);if(this.isCartesian)a.hasCartesianSeries=!0;e.push(this);this._i=e.length-1;Ib(e,function(a,b){return o(a.options.index,
a._i)-o(b.options.index,a._i)});n(e,function(a,b){a.index=b;a.name=a.name||"Series "+(b+1)});c=b.linkedTo;this.linkedSeries=[];if(fa(c)&&(c=c===":previous"?e[this.index-1]:a.get(c)))c.linkedSeries.push(this),this.linkedParent=c},bindAxes:function(){var a=this,b=a.options,c=a.chart,d;a.isCartesian&&n(["xAxis","yAxis"],function(e){n(c[e],function(c){d=c.options;if(b[e]===d.index||b[e]!==y&&b[e]===d.id||b[e]===y&&d.index===0)c.series.push(a),a[e]=c,c.isDirty=!0});a[e]||qa(18,!0)})},autoIncrement:function(){var a=
this.options,b=this.xIncrement,b=o(b,a.pointStart,0);this.pointInterval=o(this.pointInterval,a.pointInterval,1);this.xIncrement=b+this.pointInterval;return b},getSegments:function(){var a=-1,b=[],c,d=this.points,e=d.length;if(e)if(this.options.connectNulls){for(c=e;c--;)d[c].y===null&&d.splice(c,1);d.length&&(b=[d])}else n(d,function(c,g){c.y===null?(g>a+1&&b.push(d.slice(a+1,g)),a=g):g===e-1&&b.push(d.slice(a+1,g+1))});this.segments=b},setOptions:function(a){var b=this.chart.options,c=b.plotOptions,
d=c[this.type];this.userOptions=a;a=x(d,c.series,a);this.tooltipOptions=x(b.tooltip,a.tooltip);d.marker===null&&delete a.marker;return a},getColor:function(){var a=this.options,b=this.userOptions,c=this.chart.options.colors,d=this.chart.counters,e;e=a.color||X[this.type].color;if(!e&&!a.colorByPoint)r(b._colorIndex)?a=b._colorIndex:(b._colorIndex=d.color,a=d.color++),e=c[a];this.color=e;d.wrapColor(c.length)},getSymbol:function(){var a=this.userOptions,b=this.options.marker,c=this.chart,d=c.options.symbols,
c=c.counters;this.symbol=b.symbol;if(!this.symbol)r(a._symbolIndex)?a=a._symbolIndex:(a._symbolIndex=c.symbol,a=c.symbol++),this.symbol=d[a];if(/^url/.test(this.symbol))b.radius=0;c.wrapSymbol(d.length)},drawLegendSymbol:function(a){var b=this.options,c=b.marker,d=a.options.symbolWidth,e=this.chart.renderer,f=this.legendGroup,a=a.baseline,g;if(b.lineWidth){g={"stroke-width":b.lineWidth};if(b.dashStyle)g.dashstyle=b.dashStyle;this.legendLine=e.path(["M",0,a-4,"L",d,a-4]).attr(g).add(f)}if(c&&c.enabled)b=
c.radius,this.legendSymbol=e.symbol(this.symbol,d/2-b,a-4-b,2*b,2*b).add(f)},addPoint:function(a,b,c,d){var e=this.options,f=this.data,g=this.graph,h=this.area,i=this.chart,j=this.xData,k=this.yData,m=this.zData,l=this.names,p=g&&g.shift||0,n=e.data;Ia(d,i);if(g&&c)g.shift=p+1;if(h){if(c)h.shift=p+1;h.isArea=!0}b=o(b,!0);d={series:this};this.pointClass.prototype.applyOptions.apply(d,[a]);j.push(d.x);k.push(this.toYData?this.toYData(d):d.y);m.push(d.z);if(l)l[d.x]=d.name;n.push(a);e.legendType==="point"&&
this.generatePoints();c&&(f[0]&&f[0].remove?f[0].remove(!1):(f.shift(),j.shift(),k.shift(),m.shift(),n.shift()));this.getAttribs();this.isDirtyData=this.isDirty=!0;b&&i.redraw()},setData:function(a,b){var c=this.points,d=this.options,e=this.chart,f=null,g=this.xAxis,h=g&&g.categories&&!g.categories.length?[]:null,i;this.xIncrement=null;this.pointRange=g&&g.categories?1:d.pointRange;this.colorCounter=0;var j=[],k=[],m=[],l=a?a.length:[],p=(i=this.pointArrayMap)&&i.length,n=!!this.toYData;if(l>(d.turboThreshold||
1E3)){for(i=0;f===null&&i<l;)f=a[i],i++;if(Ea(f)){f=o(d.pointStart,0);d=o(d.pointInterval,1);for(i=0;i<l;i++)j[i]=f,k[i]=a[i],f+=d;this.xIncrement=f}else if(Da(f))if(p)for(i=0;i<l;i++)d=a[i],j[i]=d[0],k[i]=d.slice(1,p+1);else for(i=0;i<l;i++)d=a[i],j[i]=d[0],k[i]=d[1]}else for(i=0;i<l;i++)if(a[i]!==y&&(d={series:this},this.pointClass.prototype.applyOptions.apply(d,[a[i]]),j[i]=d.x,k[i]=n?this.toYData(d):d.y,m[i]=d.z,h&&d.name))h[i]=d.name;this.requireSorting&&j.length>1&&j[1]<j[0]&&qa(15);fa(k[0])&&
qa(14,!0);this.data=[];this.options.data=a;this.xData=j;this.yData=k;this.zData=m;this.names=h;for(i=c&&c.length||0;i--;)c[i]&&c[i].destroy&&c[i].destroy();if(g)g.minRange=g.userMinRange;this.isDirty=this.isDirtyData=e.isDirtyBox=!0;o(b,!0)&&e.redraw(!1)},remove:function(a,b){var c=this,d=c.chart,a=o(a,!0);if(!c.isRemoving)c.isRemoving=!0,D(c,"remove",null,function(){c.destroy();d.isDirtyLegend=d.isDirtyBox=!0;a&&d.redraw(b)});c.isRemoving=!1},processData:function(a){var b=this.xData,c=this.yData,
d=b.length,e=0,f=d,g,h,i=this.xAxis,j=this.options,k=j.cropThreshold,m=this.isCartesian;if(m&&!this.isDirty&&!i.isDirty&&!this.yAxis.isDirty&&!a)return!1;if(m&&this.sorted&&(!k||d>k||this.forceCrop))if(a=i.getExtremes(),i=a.min,k=a.max,b[d-1]<i||b[0]>k)b=[],c=[];else if(b[0]<i||b[d-1]>k){for(a=0;a<d;a++)if(b[a]>=i){e=q(0,a-1);break}for(;a<d;a++)if(b[a]>k){f=a+1;break}b=b.slice(e,f);c=c.slice(e,f);g=!0}for(a=b.length-1;a>0;a--)if(d=b[a]-b[a-1],d>0&&(h===y||d<h))h=d;this.cropped=g;this.cropStart=e;
this.processedXData=b;this.processedYData=c;if(j.pointRange===null)this.pointRange=h||1;this.closestPointRange=h},generatePoints:function(){var a=this.options.data,b=this.data,c,d=this.processedXData,e=this.processedYData,f=this.pointClass,g=d.length,h=this.cropStart||0,i,j=this.hasGroupedData,k,m=[],l;if(!b&&!j)b=[],b.length=a.length,b=this.data=b;for(l=0;l<g;l++)i=h+l,j?m[l]=(new f).init(this,[d[l]].concat(ha(e[l]))):(b[i]?k=b[i]:a[i]!==y&&(b[i]=k=(new f).init(this,a[i],d[l])),m[l]=k);if(b&&(g!==
(c=b.length)||j))for(l=0;l<c;l++)if(l===h&&!j&&(l+=g),b[l])b[l].destroyElements(),b[l].plotX=y;this.data=b;this.points=m},translate:function(){this.processedXData||this.processData();this.generatePoints();var a=this.options,b=a.stacking,c=this.xAxis,d=c.categories,e=this.yAxis,f=this.points,g=f.length,h=!!this.modifyValue,i,j,k=a.pointPlacement==="between",m=a.threshold;j=e.series.sort(function(a,b){return a.index-b.index});for(a=j.length;a--;)if(j[a].visible){j[a]===this&&(i=!0);break}for(a=0;a<
g;a++){j=f[a];var l=j.x,p=j.y,n=j.low,q=e.stacks[(p<m?"-":"")+this.stackKey];if(e.isLog&&p<=0)j.y=p=null;j.plotX=c.translate(l,0,0,0,1,k);if(b&&this.visible&&q&&q[l])n=q[l],q=n.total,n.cum=n=n.cum-p,p=n+p,i&&(n=o(m,e.min)),e.isLog&&n<=0&&(n=null),b==="percent"&&(n=q?n*100/q:0,p=q?p*100/q:0),j.percentage=q?j.y*100/q:0,j.total=j.stackTotal=q,j.stackY=p;j.yBottom=r(n)?e.translate(n,0,1,0,1):null;h&&(p=this.modifyValue(p,j));j.plotY=typeof p==="number"&&p!==Infinity?t(e.translate(p,0,1,0,1)*10)/10:y;
j.clientX=k?c.translate(l,0,0,0,1):j.plotX;j.negative=j.y<(m||0);j.category=d&&d[j.x]!==y?d[j.x]:j.x}this.getSegments()},setTooltipPoints:function(a){var b=[],c,d,e=(c=this.xAxis)?c.tooltipLen||c.len:this.chart.plotSizeX,f,g,h=[];if(this.options.enableMouseTracking!==!1){if(a)this.tooltipPoints=null;n(this.segments||this.points,function(a){b=b.concat(a)});c&&c.reversed&&(b=b.reverse());a=b.length;for(g=0;g<a;g++){f=b[g];c=b[g-1]?d+1:0;for(d=b[g+1]?q(0,T((f.clientX+(b[g+1]?b[g+1].clientX:e))/2)):e;c>=
0&&c<=d;)h[c++]=f}this.tooltipPoints=h}},tooltipHeaderFormatter:function(a){var b=this.tooltipOptions,c=b.xDateFormat,d=b.dateTimeLabelFormats,e=this.xAxis,f=e&&e.options.type==="datetime",b=b.headerFormat,e=e&&e.closestPointRange,g;if(f&&!c)if(e)for(g in E){if(E[g]>=e){c=d[g];break}}else c=d.day;f&&c&&Ea(a.key)&&(b=b.replace("{point.key}","{point.key:"+c+"}"));return wa(b,{point:a,series:this})},onMouseOver:function(){var a=this.chart,b=a.hoverSeries;if(b&&b!==this)b.onMouseOut();this.options.events.mouseOver&&
D(this,"mouseOver");this.setState("hover");a.hoverSeries=this},onMouseOut:function(){var a=this.options,b=this.chart,c=b.tooltip,d=b.hoverPoint;if(d)d.onMouseOut();this&&a.events.mouseOut&&D(this,"mouseOut");c&&!a.stickyTracking&&(!c.shared||this.noSharedTooltip)&&c.hide();this.setState();b.hoverSeries=null},animate:function(a){var b=this,c=b.chart,d=c.renderer,e;e=b.options.animation;var f=c.clipBox,g=c.inverted,h;if(e&&!V(e))e=X[b.type].animation;h="_sharedClip"+e.duration+e.easing;if(a)a=c[h],
e=c[h+"m"],a||(c[h]=a=d.clipRect(v(f,{width:0})),c[h+"m"]=e=d.clipRect(-99,g?-c.plotLeft:-c.plotTop,99,g?c.chartWidth:c.chartHeight)),b.group.clip(a),b.markerGroup.clip(e),b.sharedClipKey=h;else{if(a=c[h])a.animate({width:c.plotSizeX},e),c[h+"m"].animate({width:c.plotSizeX+99},e);b.animate=null;b.animationTimeout=setTimeout(function(){b.afterAnimate()},e.duration)}},afterAnimate:function(){var a=this.chart,b=this.sharedClipKey,c=this.group;c&&this.options.clip!==!1&&(c.clip(a.clipRect),this.markerGroup.clip());
setTimeout(function(){b&&a[b]&&(a[b]=a[b].destroy(),a[b+"m"]=a[b+"m"].destroy())},100)},drawPoints:function(){var a,b=this.points,c=this.chart,d,e,f,g,h,i,j,k,m=this.options.marker,l,n=this.markerGroup;if(m.enabled||this._hasPointMarkers)for(f=b.length;f--;)if(g=b[f],d=g.plotX,e=g.plotY,k=g.graphic,i=g.marker||{},a=m.enabled&&i.enabled===y||i.enabled,l=c.isInsidePlot(t(d),e,c.inverted),a&&e!==y&&!isNaN(e)&&g.y!==null)if(a=g.pointAttr[g.selected?"select":""],h=a.r,i=o(i.symbol,this.symbol),j=i.indexOf("url")===
0,k)k.attr({visibility:l?Z?"inherit":"visible":"hidden"}).animate(v({x:d-h,y:e-h},k.symbolName?{width:2*h,height:2*h}:{}));else{if(l&&(h>0||j))g.graphic=c.renderer.symbol(i,d-h,e-h,2*h,2*h).attr(a).add(n)}else if(k)g.graphic=k.destroy()},convertAttribs:function(a,b,c,d){var e=this.pointAttrToOptions,f,g,h={},a=a||{},b=b||{},c=c||{},d=d||{};for(f in e)g=e[f],h[f]=o(a[g],b[f],c[f],d[f]);return h},getAttribs:function(){var a=this,b=a.options,c=X[a.type].marker?b.marker:b,d=c.states,e=d.hover,f,g=a.color,
h={stroke:g,fill:g},i=a.points||[],j=[],k,m=a.pointAttrToOptions,l=b.negativeColor,p;b.marker?(e.radius=e.radius||c.radius+2,e.lineWidth=e.lineWidth||c.lineWidth+1):e.color=e.color||ma(e.color||g).brighten(e.brightness).get();j[""]=a.convertAttribs(c,h);n(["hover","select"],function(b){j[b]=a.convertAttribs(d[b],j[""])});a.pointAttr=j;for(g=i.length;g--;){h=i[g];if((c=h.options&&h.options.marker||h.options)&&c.enabled===!1)c.radius=0;if(h.negative&&l)h.color=h.fillColor=l;f=b.colorByPoint||h.color;
if(h.options)for(p in m)r(c[m[p]])&&(f=!0);if(f){c=c||{};k=[];d=c.states||{};f=d.hover=d.hover||{};if(!b.marker)f.color=ma(f.color||h.color).brighten(f.brightness||e.brightness).get();k[""]=a.convertAttribs(v({color:h.color},c),j[""]);k.hover=a.convertAttribs(d.hover,j.hover,k[""]);k.select=a.convertAttribs(d.select,j.select,k[""]);if(h.negative&&b.marker&&l)k[""].fill=k.hover.fill=k.select.fill=a.convertAttribs({fillColor:l}).fill}else k=j;h.pointAttr=k}},update:function(a,b){var c=this.chart,d=
this.type,a=x(this.userOptions,{animation:!1,index:this.index,pointStart:this.xData[0]},a);this.remove(!1);v(this,aa[a.type||d].prototype);this.init(c,a);o(b,!0)&&c.redraw(!1)},destroy:function(){var a=this,b=a.chart,c=/AppleWebKit\/533/.test(Aa),d,e,f=a.data||[],g,h,i;D(a,"destroy");ba(a);n(["xAxis","yAxis"],function(b){if(i=a[b])ga(i.series,a),i.isDirty=i.forceRedraw=!0});a.legendItem&&a.chart.legend.destroyItem(a);for(e=f.length;e--;)(g=f[e])&&g.destroy&&g.destroy();a.points=null;clearTimeout(a.animationTimeout);
n("area,graph,dataLabelsGroup,group,markerGroup,tracker,graphNeg,areaNeg,posClip,negClip".split(","),function(b){a[b]&&(d=c&&b==="group"?"hide":"destroy",a[b][d]())});if(b.hoverSeries===a)b.hoverSeries=null;ga(b.series,a);for(h in a)delete a[h]},drawDataLabels:function(){var a=this,b=a.options.dataLabels,c=a.points,d,e,f,g;if(b.enabled||a._hasPointLabels)a.dlProcessOptions&&a.dlProcessOptions(b),g=a.plotGroup("dataLabelsGroup","data-labels",a.visible?"visible":"hidden",b.zIndex||6),e=b,n(c,function(c){var i,
j=c.dataLabel,k,m,l=c.connector,n=!0;d=c.options&&c.options.dataLabels;i=e.enabled||d&&d.enabled;if(j&&!i)c.dataLabel=j.destroy();else if(i){i=b.rotation;b=x(e,d);k=c.getLabelConfig();f=b.format?wa(b.format,k):b.formatter.call(k,b);b.style.color=o(b.color,b.style.color,a.color,"black");if(j)if(r(f))j.attr({text:f}),n=!1;else{if(c.dataLabel=j=j.destroy(),l)c.connector=l.destroy()}else if(r(f)){j={fill:b.backgroundColor,stroke:b.borderColor,"stroke-width":b.borderWidth,r:b.borderRadius||0,rotation:i,
padding:b.padding,zIndex:1};for(m in j)j[m]===y&&delete j[m];j=c.dataLabel=a.chart.renderer[i?"text":"label"](f,0,-999,null,null,null,b.useHTML).attr(j).css(b.style).add(g).shadow(b.shadow)}j&&a.alignDataLabel(c,j,b,null,n)}})},alignDataLabel:function(a,b,c,d,e){var f=this.chart,g=f.inverted,h=o(a.plotX,-999),a=o(a.plotY,-999),i=b.getBBox(),d=v({x:g?f.plotWidth-a:h,y:t(g?f.plotHeight-h:a),width:0,height:0},d);v(c,{width:i.width,height:i.height});c.rotation?(d={align:c.align,x:d.x+c.x+d.width/2,y:d.y+
c.y+d.height/2},b[e?"attr":"animate"](d)):b.align(c,null,d);b.attr({visibility:c.crop===!1||f.isInsidePlot(h,a,g)?f.renderer.isSVG?"inherit":"visible":"hidden"})},getSegmentPath:function(a){var b=this,c=[],d=b.options.step;n(a,function(e,f){var g=e.plotX,h=e.plotY,i;b.getPointSpline?c.push.apply(c,b.getPointSpline(a,e,f)):(c.push(f?"L":"M"),d&&f&&(i=a[f-1],d==="right"?c.push(i.plotX,h):d==="center"?c.push((i.plotX+g)/2,i.plotY,(i.plotX+g)/2,h):c.push(g,i.plotY)),c.push(e.plotX,e.plotY))});return c},
getGraphPath:function(){var a=this,b=[],c,d=[];n(a.segments,function(e){c=a.getSegmentPath(e);e.length>1?b=b.concat(c):d.push(e[0])});a.singlePoints=d;return a.graphPath=b},drawGraph:function(){var a=this,b=this.options,c=[["graph",b.lineColor||this.color]],d=b.lineWidth,e=b.dashStyle,f=this.getGraphPath(),g=b.negativeColor;g&&c.push(["graphNeg",g]);n(c,function(c,g){var j=c[0],k=a[j];if(k)Ta(k),k.animate({d:f});else if(d&&f.length){k={stroke:c[1],"stroke-width":d,zIndex:1};if(e)k.dashstyle=e;a[j]=
a.chart.renderer.path(f).attr(k).add(a.group).shadow(!g&&b.shadow)}})},clipNeg:function(){var a=this.options,b=this.chart,c=b.renderer,d=a.negativeColor,e,f=this.graph,g=this.area,h=this.posClip,i=this.negClip;e=b.chartWidth;var j=b.chartHeight,k=q(e,j);if(d&&(f||g))d=ja(this.yAxis.len-this.yAxis.translate(a.threshold||0)),a={x:0,y:0,width:k,height:d},k={x:0,y:d,width:k,height:k-d},b.inverted&&c.isVML&&(a={x:b.plotWidth-d-b.plotLeft,y:0,width:e,height:j},k={x:d+b.plotLeft-e,y:0,width:b.plotLeft+d,
height:e}),this.yAxis.reversed?(b=k,e=a):(b=a,e=k),h?(h.animate(b),i.animate(e)):(this.posClip=h=c.clipRect(b),this.negClip=i=c.clipRect(e),f&&(f.clip(h),this.graphNeg.clip(i)),g&&(g.clip(h),this.areaNeg.clip(i)))},invertGroups:function(){function a(){var a={width:b.yAxis.len,height:b.xAxis.len};n(["group","markerGroup"],function(c){b[c]&&b[c].attr(a).invert()})}var b=this,c=b.chart;if(b.xAxis)J(c,"resize",a),J(b,"destroy",function(){ba(c,"resize",a)}),a(),b.invertGroups=a},plotGroup:function(a,b,
c,d,e){var f=this[a],g=!f,h=this.chart,i=this.xAxis,j=this.yAxis;g&&(this[a]=f=h.renderer.g(b).attr({visibility:c,zIndex:d||0.1}).add(e));f[g?"attr":"animate"]({translateX:i?i.left:h.plotLeft,translateY:j?j.top:h.plotTop,scaleX:1,scaleY:1});return f},render:function(){var a=this.chart,b,c=this.options,d=c.animation&&!!this.animate&&a.renderer.isSVG,e=this.visible?"visible":"hidden",f=c.zIndex,g=this.hasRendered,h=a.seriesGroup;b=this.plotGroup("group","series",e,f,h);this.markerGroup=this.plotGroup("markerGroup",
"markers",e,f,h);d&&this.animate(!0);this.getAttribs();b.inverted=this.isCartesian?a.inverted:!1;this.drawGraph&&(this.drawGraph(),this.clipNeg());this.drawDataLabels();this.drawPoints();this.options.enableMouseTracking!==!1&&this.drawTracker();a.inverted&&this.invertGroups();c.clip!==!1&&!this.sharedClipKey&&!g&&b.clip(a.clipRect);d?this.animate():g||this.afterAnimate();this.isDirty=this.isDirtyData=!1;this.hasRendered=!0},redraw:function(){var a=this.chart,b=this.isDirtyData,c=this.group,d=this.xAxis,
e=this.yAxis;c&&(a.inverted&&c.attr({width:a.plotWidth,height:a.plotHeight}),c.animate({translateX:o(d&&d.left,a.plotLeft),translateY:o(e&&e.top,a.plotTop)}));this.translate();this.setTooltipPoints(!0);this.render();b&&D(this,"updatedData")},setState:function(a){var b=this.options,c=this.graph,d=this.graphNeg,e=b.states,b=b.lineWidth,a=a||"";if(this.state!==a)this.state=a,e[a]&&e[a].enabled===!1||(a&&(b=e[a].lineWidth||b+1),c&&!c.dashstyle&&(a={"stroke-width":b},c.attr(a),d&&d.attr(a)))},setVisible:function(a,
b){var c=this,d=c.chart,e=c.legendItem,f,g=d.options.chart.ignoreHiddenSeries,h=c.visible;f=(c.visible=a=c.userOptions.visible=a===y?!h:a)?"show":"hide";n(["group","dataLabelsGroup","markerGroup","tracker"],function(a){if(c[a])c[a][f]()});if(d.hoverSeries===c)c.onMouseOut();e&&d.legend.colorizeItem(c,a);c.isDirty=!0;c.options.stacking&&n(d.series,function(a){if(a.options.stacking&&a.visible)a.isDirty=!0});n(c.linkedSeries,function(b){b.setVisible(a,!1)});if(g)d.isDirtyBox=!0;b!==!1&&d.redraw();D(c,
f)},show:function(){this.setVisible(!0)},hide:function(){this.setVisible(!1)},select:function(a){this.selected=a=a===y?!this.selected:a;if(this.checkbox)this.checkbox.checked=a;D(this,a?"select":"unselect")},drawTracker:function(){var a=this,b=a.options,c=b.trackByArea,d=[].concat(c?a.areaPath:a.graphPath),e=d.length,f=a.chart,g=f.pointer,h=f.renderer,i=f.options.tooltip.snap,j=a.tracker,k=b.cursor,k=k&&{cursor:k},m=a.singlePoints,l,n=function(){if(f.hoverSeries!==a)a.onMouseOver()};if(e&&!c)for(l=
e+1;l--;)d[l]==="M"&&d.splice(l+1,0,d[l+1]-i,d[l+2],"L"),(l&&d[l]==="M"||l===e)&&d.splice(l,0,"L",d[l-2]+i,d[l-1]);for(l=0;l<m.length;l++)e=m[l],d.push("M",e.plotX-i,e.plotY,"L",e.plotX+i,e.plotY);if(j)j.attr({d:d});else if(a.tracker=j=h.path(d).attr({"class":"highcharts-tracker","stroke-linejoin":"round",visibility:a.visible?"visible":"hidden",stroke:Ob,fill:c?Ob:S,"stroke-width":b.lineWidth+(c?0:2*i),zIndex:2}).addClass("highcharts-tracker").on("mouseover",n).on("mouseout",function(a){g.onTrackerMouseOut(a)}).css(k).add(a.markerGroup),
fb)j.on("touchstart",n)}};M=ea(R);aa.line=M;X.area=x(W,{threshold:0});M=ea(R,{type:"area",getSegments:function(){var a=[],b=[],c=[],d=this.xAxis,e=this.yAxis,f=e.stacks[this.stackKey],g={},h,i,j=this.points,k,m;if(this.options.stacking&&!this.cropped){for(k=0;k<j.length;k++)g[j[k].x]=j[k];for(m in f)c.push(+m);c.sort(function(a,b){return a-b});n(c,function(a){g[a]?b.push(g[a]):(h=d.translate(a),i=e.toPixels(f[a].cum,!0),b.push({y:null,plotX:h,clientX:h,plotY:i,yBottom:i,onMouseOver:ta}))});b.length&&
a.push(b)}else R.prototype.getSegments.call(this),a=this.segments;this.segments=a},getSegmentPath:function(a){var b=R.prototype.getSegmentPath.call(this,a),c=[].concat(b),d,e=this.options;b.length===3&&c.push("L",b[1],b[2]);if(e.stacking&&!this.closedStacks)for(d=a.length-1;d>=0;d--)d<a.length-1&&e.step&&c.push(a[d+1].plotX,a[d].yBottom),c.push(a[d].plotX,a[d].yBottom);else this.closeSegment(c,a);this.areaPath=this.areaPath.concat(c);return b},closeSegment:function(a,b){var c=this.yAxis.getThreshold(this.options.threshold);
a.push("L",b[b.length-1].plotX,c,"L",b[0].plotX,c)},drawGraph:function(){this.areaPath=[];R.prototype.drawGraph.apply(this);var a=this,b=this.areaPath,c=this.options,d=[["area",this.color,c.fillColor]];c.negativeColor&&d.push(["areaNeg",c.negativeColor,c.negativeFillColor]);n(d,function(d){var f=d[0],g=a[f];g?g.animate({d:b}):a[f]=a.chart.renderer.path(b).attr({fill:o(d[2],ma(d[1]).setOpacity(c.fillOpacity||0.75).get()),zIndex:0}).add(a.group)})},drawLegendSymbol:function(a,b){b.legendSymbol=this.chart.renderer.rect(0,
a.baseline-11,a.options.symbolWidth,12,2).attr({zIndex:3}).add(b.legendGroup)}});aa.area=M;X.spline=x(W);F=ea(R,{type:"spline",getPointSpline:function(a,b,c){var d=b.plotX,e=b.plotY,f=a[c-1],g=a[c+1],h,i,j,k;if(f&&g){a=f.plotY;j=g.plotX;var g=g.plotY,m;h=(1.5*d+f.plotX)/2.5;i=(1.5*e+a)/2.5;j=(1.5*d+j)/2.5;k=(1.5*e+g)/2.5;m=(k-i)*(j-d)/(j-h)+e-k;i+=m;k+=m;i>a&&i>e?(i=q(a,e),k=2*e-i):i<a&&i<e&&(i=K(a,e),k=2*e-i);k>g&&k>e?(k=q(g,e),i=2*e-k):k<g&&k<e&&(k=K(g,e),i=2*e-k);b.rightContX=j;b.rightContY=k}c?
(b=["C",f.rightContX||f.plotX,f.rightContY||f.plotY,h||d,i||e,d,e],f.rightContX=f.rightContY=null):b=["M",d,e];return b}});aa.spline=F;X.areaspline=x(X.area);na=M.prototype;F=ea(F,{type:"areaspline",closedStacks:!0,getSegmentPath:na.getSegmentPath,closeSegment:na.closeSegment,drawGraph:na.drawGraph});aa.areaspline=F;X.column=x(W,{borderColor:"#FFFFFF",borderWidth:1,borderRadius:0,groupPadding:0.2,marker:null,pointPadding:0.1,minPointLength:0,cropThreshold:50,pointRange:null,states:{hover:{brightness:0.1,
shadow:!1},select:{color:"#C0C0C0",borderColor:"#000000",shadow:!1}},dataLabels:{align:null,verticalAlign:null,y:null},stickyTracking:!1,threshold:0});F=ea(R,{type:"column",tooltipOutsidePlot:!0,requireSorting:!1,pointAttrToOptions:{stroke:"borderColor","stroke-width":"borderWidth",fill:"color",r:"borderRadius"},trackerGroups:["group","dataLabelsGroup"],init:function(){R.prototype.init.apply(this,arguments);var a=this,b=a.chart;b.hasRendered&&n(b.series,function(b){if(b.type===a.type)b.isDirty=!0})},
getColumnMetrics:function(){var a=this,b=a.chart,c=a.options,d=this.xAxis,e=d.reversed,f,g={},h,i=0;c.grouping===!1?i=1:n(b.series,function(b){var c=b.options;if(b.type===a.type&&b.visible&&a.options.group===c.group)c.stacking?(f=b.stackKey,g[f]===y&&(g[f]=i++),h=g[f]):c.grouping!==!1&&(h=i++),b.columnIndex=h});var b=K(Q(d.transA)*(d.ordinalSlope||c.pointRange||d.closestPointRange||1),d.len),d=b*c.groupPadding,j=(b-2*d)/i,k=c.pointWidth,c=r(k)?(j-k)/2:j*c.pointPadding,k=o(k,j-2*c);return a.columnMetrics=
{width:k,offset:c+(d+((e?i-(a.columnIndex||0):a.columnIndex)||0)*j-b/2)*(e?-1:1)}},translate:function(){var a=this,b=a.chart,c=a.options,d=c.stacking,e=c.borderWidth,f=a.yAxis,g=a.translatedThreshold=f.getThreshold(c.threshold),h=o(c.minPointLength,5),c=a.getColumnMetrics(),i=c.width,j=ja(q(i,1+2*e)),k=c.offset;R.prototype.translate.apply(a);n(a.points,function(c){var l=K(q(-999,c.plotY),f.len+999),n=o(c.yBottom,g),s=c.plotX+k,t=ja(K(l,n)),l=ja(q(l,n)-t),r=f.stacks[(c.y<0?"-":"")+a.stackKey];d&&a.visible&&
r&&r[c.x]&&r[c.x].setOffset(k,j);Q(l)<h&&h&&(l=h,t=Q(t-g)>h?n-h:g-(f.translate(c.y,0,1,0,1)<=g?h:0));c.barX=s;c.pointWidth=i;c.shapeType="rect";c.shapeArgs=c=b.renderer.Element.prototype.crisp.call(0,e,s,t,j,l);e%2&&(c.y-=1,c.height+=1)})},getSymbol:ta,drawLegendSymbol:M.prototype.drawLegendSymbol,drawGraph:ta,drawPoints:function(){var a=this,b=a.options,c=a.chart.renderer,d;n(a.points,function(e){var f=e.plotY,g=e.graphic;if(f!==y&&!isNaN(f)&&e.y!==null)d=e.shapeArgs,g?(Ta(g),g.animate(x(d))):e.graphic=
c[e.shapeType](d).attr(e.pointAttr[e.selected?"select":""]).add(a.group).shadow(b.shadow,null,b.stacking&&!b.borderRadius);else if(g)e.graphic=g.destroy()})},drawTracker:function(){var a=this,b=a.chart.pointer,c=a.options.cursor,d=c&&{cursor:c},e=function(b){var c=b.target,d;for(a.onMouseOver();c&&!d;)d=c.point,c=c.parentNode;if(d!==y)d.onMouseOver(b)};n(a.points,function(a){if(a.graphic)a.graphic.element.point=a;if(a.dataLabel)a.dataLabel.element.point=a});a._hasTracking?a._hasTracking=!0:n(a.trackerGroups,
function(c){if(a[c]&&(a[c].addClass("highcharts-tracker").on("mouseover",e).on("mouseout",function(a){b.onTrackerMouseOut(a)}).css(d),fb))a[c].on("touchstart",e)})},alignDataLabel:function(a,b,c,d,e){var f=this.chart,g=f.inverted,h=a.dlBox||a.shapeArgs,i=a.below||a.plotY>o(this.translatedThreshold,f.plotSizeY),j=o(c.inside,!!this.options.stacking);if(h&&(d=x(h),g&&(d={x:f.plotWidth-d.y-d.height,y:f.plotHeight-d.x-d.width,width:d.height,height:d.width}),!j))g?(d.x+=i?0:d.width,d.width=0):(d.y+=i?d.height:
0,d.height=0);c.align=o(c.align,!g||j?"center":i?"right":"left");c.verticalAlign=o(c.verticalAlign,g||j?"middle":i?"top":"bottom");R.prototype.alignDataLabel.call(this,a,b,c,d,e)},animate:function(a){var b=this.yAxis,c=this.options,d=this.chart.inverted,e={};if(Z)a?(e.scaleY=0.001,a=K(b.pos+b.len,q(b.pos,b.toPixels(c.threshold))),d?e.translateX=a-b.len:e.translateY=a,this.group.attr(e)):(e.scaleY=1,e[d?"translateX":"translateY"]=b.pos,this.group.animate(e,this.options.animation),this.animate=null)},
remove:function(){var a=this,b=a.chart;b.hasRendered&&n(b.series,function(b){if(b.type===a.type)b.isDirty=!0});R.prototype.remove.apply(a,arguments)}});aa.column=F;X.bar=x(X.column);na=ea(F,{type:"bar",inverted:!0});aa.bar=na;X.scatter=x(W,{lineWidth:0,tooltip:{headerFormat:'<span style="font-size: 10px; color:{series.color}">{series.name}</span><br/>',pointFormat:"x: <b>{point.x}</b><br/>y: <b>{point.y}</b><br/>",followPointer:!0},stickyTracking:!1});na=ea(R,{type:"scatter",sorted:!1,requireSorting:!1,
noSharedTooltip:!0,trackerGroups:["markerGroup"],drawTracker:F.prototype.drawTracker,setTooltipPoints:ta});aa.scatter=na;X.pie=x(W,{borderColor:"#FFFFFF",borderWidth:1,center:[null,null],clip:!1,colorByPoint:!0,dataLabels:{distance:30,enabled:!0,formatter:function(){return this.point.name}},ignoreHiddenPoint:!0,legendType:"point",marker:null,size:null,showInLegend:!1,slicedOffset:10,states:{hover:{brightness:0.1,shadow:!1}},stickyTracking:!1,tooltip:{followPointer:!0}});W={type:"pie",isCartesian:!1,
pointClass:ea(Na,{init:function(){Na.prototype.init.apply(this,arguments);var a=this,b;if(a.y<0)a.y=null;v(a,{visible:a.visible!==!1,name:o(a.name,"Slice")});b=function(){a.slice()};J(a,"select",b);J(a,"unselect",b);return a},setVisible:function(a){var b=this,c=b.series,d=c.chart,e;b.visible=b.options.visible=a=a===y?!b.visible:a;c.options.data[la(b,c.data)]=b.options;e=a?"show":"hide";n(["graphic","dataLabel","connector","shadowGroup"],function(a){if(b[a])b[a][e]()});b.legendItem&&d.legend.colorizeItem(b,
a);if(!c.isDirty&&c.options.ignoreHiddenPoint)c.isDirty=!0,d.redraw()},slice:function(a,b,c){var d=this.series;Ia(c,d.chart);o(b,!0);this.sliced=this.options.sliced=a=r(a)?a:!this.sliced;d.options.data[la(this,d.data)]=this.options;a=a?this.slicedTranslation:{translateX:0,translateY:0};this.graphic.animate(a);this.shadowGroup&&this.shadowGroup.animate(a)}}),requireSorting:!1,noSharedTooltip:!0,trackerGroups:["group","dataLabelsGroup"],pointAttrToOptions:{stroke:"borderColor","stroke-width":"borderWidth",
fill:"color"},getColor:ta,animate:function(a){var b=this,c=b.points,d=b.startAngleRad;if(!a)n(c,function(a){var c=a.graphic,a=a.shapeArgs;c&&(c.attr({r:b.center[3]/2,start:d,end:d}),c.animate({r:a.r,start:a.start,end:a.end},b.options.animation))}),b.animate=null},setData:function(a,b){R.prototype.setData.call(this,a,!1);this.processData();this.generatePoints();o(b,!0)&&this.chart.redraw()},getCenter:function(){var a=this.options,b=this.chart,c=2*(a.slicedOffset||0),d,e=b.plotWidth-2*c,f=b.plotHeight-
2*c,b=a.center,a=[o(b[0],"50%"),o(b[1],"50%"),a.size||"100%",a.innerSize||0],g=K(e,f),h;return La(a,function(a,b){h=/%$/.test(a);d=b<2||b===2&&h;return(h?[e,f,g,g][b]*u(a)/100:a)+(d?c:0)})},translate:function(a){this.generatePoints();var b=0,c=0,d=this.options,e=d.slicedOffset,f=e+d.borderWidth,g,h,i,j=this.startAngleRad=Ka/180*((d.startAngle||0)%360-90),k=this.points,m=2*Ka,l=d.dataLabels.distance,n=d.ignoreHiddenPoint,o,q=k.length,r;if(!a)this.center=a=this.getCenter();this.getX=function(b,c){i=
I.asin((b-a[1])/(a[2]/2+l));return a[0]+(c?-1:1)*Y(i)*(a[2]/2+l)};for(o=0;o<q;o++)r=k[o],b+=n&&!r.visible?0:r.y;for(o=0;o<q;o++){r=k[o];d=b?r.y/b:0;g=t((j+c*m)*1E3)/1E3;if(!n||r.visible)c+=d;h=t((j+c*m)*1E3)/1E3;r.shapeType="arc";r.shapeArgs={x:a[0],y:a[1],r:a[2]/2,innerR:a[3]/2,start:g,end:h};i=(h+g)/2;i>0.75*m&&(i-=2*Ka);r.slicedTranslation={translateX:t(Y(i)*e),translateY:t(ca(i)*e)};g=Y(i)*a[2]/2;h=ca(i)*a[2]/2;r.tooltipPos=[a[0]+g*0.7,a[1]+h*0.7];r.half=i<m/4?0:1;r.angle=i;f=K(f,l/2);r.labelPos=
[a[0]+g+Y(i)*l,a[1]+h+ca(i)*l,a[0]+g+Y(i)*f,a[1]+h+ca(i)*f,a[0]+g,a[1]+h,l<0?"center":r.half?"right":"left",i];r.percentage=d*100;r.total=b}this.setTooltipPoints()},drawGraph:null,drawPoints:function(){var a=this,b=a.chart.renderer,c,d,e=a.options.shadow,f,g;if(e&&!a.shadowGroup)a.shadowGroup=b.g("shadow").add(a.group);n(a.points,function(h){d=h.graphic;g=h.shapeArgs;f=h.shadowGroup;if(e&&!f)f=h.shadowGroup=b.g("shadow").add(a.shadowGroup);c=h.sliced?h.slicedTranslation:{translateX:0,translateY:0};
f&&f.attr(c);d?d.animate(v(g,c)):h.graphic=d=b.arc(g).setRadialReference(a.center).attr(h.pointAttr[h.selected?"select":""]).attr({"stroke-linejoin":"round"}).attr(c).add(a.group).shadow(e,f);h.visible===!1&&h.setVisible(!1)})},drawDataLabels:function(){var a=this,b=a.data,c,d=a.chart,e=a.options.dataLabels,f=o(e.connectorPadding,10),g=o(e.connectorWidth,1),h=d.plotWidth,d=d.plotHeight,i,j,k=o(e.softConnector,!0),m=e.distance,l=a.center,p=l[2]/2,s=l[1],r=m>0,v,w,u,x,y=[[],[]],A,z,E,H,C,D=[0,0,0,0],
K=function(a,b){return b.y-a.y},M=function(a,b){a.sort(function(a,c){return a.angle!==void 0&&(c.angle-a.angle)*b})};if(e.enabled||a._hasPointLabels){R.prototype.drawDataLabels.apply(a);n(b,function(a){a.dataLabel&&y[a.half].push(a)});for(H=0;!x&&b[H];)x=b[H]&&b[H].dataLabel&&(b[H].dataLabel.getBBox().height||21),H++;for(H=2;H--;){var b=[],L=[],I=y[H],J=I.length,F;M(I,H-0.5);if(m>0){for(C=s-p-m;C<=s+p+m;C+=x)b.push(C);w=b.length;if(J>w){c=[].concat(I);c.sort(K);for(C=J;C--;)c[C].rank=C;for(C=J;C--;)I[C].rank>=
w&&I.splice(C,1);J=I.length}for(C=0;C<J;C++){c=I[C];u=c.labelPos;c=9999;var O,N;for(N=0;N<w;N++)O=Q(b[N]-u[1]),O<c&&(c=O,F=N);if(F<C&&b[C]!==null)F=C;else for(w<J-C+F&&b[C]!==null&&(F=w-J+C);b[F]===null;)F++;L.push({i:F,y:b[F]});b[F]=null}L.sort(K)}for(C=0;C<J;C++){c=I[C];u=c.labelPos;v=c.dataLabel;E=c.visible===!1?"hidden":"visible";c=u[1];if(m>0){if(w=L.pop(),F=w.i,z=w.y,c>z&&b[F+1]!==null||c<z&&b[F-1]!==null)z=c}else z=c;A=e.justify?l[0]+(H?-1:1)*(p+m):a.getX(F===0||F===b.length-1?c:z,H);v._attr=
{visibility:E,align:u[6]};v._pos={x:A+e.x+({left:f,right:-f}[u[6]]||0),y:z+e.y-10};v.connX=A;v.connY=z;if(this.options.size===null)w=v.width,A-w<f?D[3]=q(t(w-A+f),D[3]):A+w>h-f&&(D[1]=q(t(A+w-h+f),D[1])),z-x/2<0?D[0]=q(t(-z+x/2),D[0]):z+x/2>d&&(D[2]=q(t(z+x/2-d),D[2]))}}if(pa(D)===0||this.verifyDataLabelOverflow(D))this.placeDataLabels(),r&&g&&n(this.points,function(b){i=b.connector;u=b.labelPos;if((v=b.dataLabel)&&v._pos)E=v._attr.visibility,A=v.connX,z=v.connY,j=k?["M",A+(u[6]==="left"?5:-5),z,
"C",A,z,2*u[2]-u[4],2*u[3]-u[5],u[2],u[3],"L",u[4],u[5]]:["M",A+(u[6]==="left"?5:-5),z,"L",u[2],u[3],"L",u[4],u[5]],i?(i.animate({d:j}),i.attr("visibility",E)):b.connector=i=a.chart.renderer.path(j).attr({"stroke-width":g,stroke:e.connectorColor||b.color||"#606060",visibility:E}).add(a.group);else if(i)b.connector=i.destroy()})}},verifyDataLabelOverflow:function(a){var b=this.center,c=this.options,d=c.center,e=c=c.minSize||80,f;d[0]!==null?e=q(b[2]-q(a[1],a[3]),c):(e=q(b[2]-a[1]-a[3],c),b[0]+=(a[3]-
a[1])/2);d[1]!==null?e=q(K(e,b[2]-q(a[0],a[2])),c):(e=q(K(e,b[2]-a[0]-a[2]),c),b[1]+=(a[0]-a[2])/2);e<b[2]?(b[2]=e,this.translate(b),n(this.points,function(a){if(a.dataLabel)a.dataLabel._pos=null}),this.drawDataLabels()):f=!0;return f},placeDataLabels:function(){n(this.points,function(a){var a=a.dataLabel,b;if(a)(b=a._pos)?(a.attr(a._attr),a[a.moved?"animate":"attr"](b),a.moved=!0):a&&a.attr({y:-999})})},alignDataLabel:ta,drawTracker:F.prototype.drawTracker,drawLegendSymbol:M.prototype.drawLegendSymbol,
getSymbol:ta};W=ea(R,W);aa.pie=W;v(Highcharts,{Axis:ab,Chart:tb,Color:ma,Legend:sb,Pointer:rb,Point:Na,Tick:Ja,Tooltip:qb,Renderer:Sa,Series:R,SVGElement:ra,SVGRenderer:Ca,arrayMin:Ga,arrayMax:pa,charts:Ba,dateFormat:Ua,format:wa,pathAnim:vb,getOptions:function(){return N},hasBidiBug:Sb,isTouchDevice:Mb,numberFormat:ua,seriesTypes:aa,setOptions:function(a){N=x(N,a);Jb();return N},addEvent:J,removeEvent:ba,createElement:U,discardElement:Ra,css:L,each:n,extend:v,map:La,merge:x,pick:o,splat:ha,extendClass:ea,
pInt:u,wrap:zb,svg:Z,canvas:$,vml:!Z&&!$,product:"Highcharts",version:"3.0.2"})})();

/*
 Highcharts JS v3.0.2 (2013-06-05)
 Exporting module

 (c) 2010-2013 Torstein Hønsi

 License: www.highcharts.com/license
*/
(function(e){var y=e.Chart,v=e.addEvent,B=e.removeEvent,m=e.createElement,j=e.discardElement,t=e.css,k=e.merge,r=e.each,p=e.extend,C=Math.max,i=document,z=window,D=e.isTouchDevice,E=e.Renderer.prototype.symbols,s=e.getOptions(),w;p(s.lang,{printChart:"Print chart",downloadPNG:"Download PNG image",downloadJPEG:"Download JPEG image",downloadPDF:"Download PDF document",downloadSVG:"Download SVG vector image",contextButtonTitle:"Chart context menu"});s.navigation={menuStyle:{border:"1px solid #A0A0A0",
background:"#FFFFFF",padding:"5px 0"},menuItemStyle:{padding:"0 10px",background:"none",color:"#303030",fontSize:D?"14px":"11px"},menuItemHoverStyle:{background:"#4572A5",color:"#FFFFFF"},buttonOptions:{symbolFill:"#E0E0E0",symbolSize:14,symbolStroke:"#666",symbolStrokeWidth:3,symbolX:12.5,symbolY:10.5,align:"right",buttonSpacing:3,height:22,theme:{fill:"white",stroke:"none"},verticalAlign:"top",width:24}};s.exporting={type:"image/png",url:"http://export.highcharts.com/",buttons:{contextButton:{symbol:"menu",
_titleKey:"contextButtonTitle",menuItems:[{textKey:"printChart",onclick:function(){this.print()}},{separator:!0},{textKey:"downloadPNG",onclick:function(){this.exportChart()}},{textKey:"downloadJPEG",onclick:function(){this.exportChart({type:"image/jpeg"})}},{textKey:"downloadPDF",onclick:function(){this.exportChart({type:"application/pdf"})}},{textKey:"downloadSVG",onclick:function(){this.exportChart({type:"image/svg+xml"})}}]}}};e.post=function(a,b){var c,d;d=m("form",{method:"post",action:a,enctype:"multipart/form-data"},
{display:"none"},i.body);for(c in b)m("input",{type:"hidden",name:c,value:b[c]},null,d);d.submit();j(d)};p(y.prototype,{getSVG:function(a){var b=this,c,d,x,g,f=k(b.options,a);if(!i.createElementNS)i.createElementNS=function(a,b){return i.createElement(b)};a=m("div",null,{position:"absolute",top:"-9999em",width:b.chartWidth+"px",height:b.chartHeight+"px"},i.body);d=b.renderTo.style.width;g=b.renderTo.style.height;d=f.exporting.sourceWidth||f.chart.width||/px$/.test(d)&&parseInt(d,10)||600;g=f.exporting.sourceHeight||
f.chart.height||/px$/.test(g)&&parseInt(g,10)||400;p(f.chart,{animation:!1,renderTo:a,forExport:!0,width:d,height:g});f.exporting.enabled=!1;f.series=[];r(b.series,function(a){x=k(a.options,{animation:!1,showCheckbox:!1,visible:a.visible});x.isInternal||f.series.push(x)});c=new e.Chart(f,b.callback);r(["xAxis","yAxis"],function(a){r(b[a],function(b,d){var f=c[a][d],e=b.getExtremes(),g=e.userMin,e=e.userMax;(g!==void 0||e!==void 0)&&f.setExtremes(g,e,!0,!1)})});d=c.container.innerHTML;f=null;c.destroy();
j(a);d=d.replace(/zIndex="[^"]+"/g,"").replace(/isShadow="[^"]+"/g,"").replace(/symbolName="[^"]+"/g,"").replace(/jQuery[0-9]+="[^"]+"/g,"").replace(/url\([^#]+#/g,"url(#").replace(/<svg /,'<svg xmlns:xlink="http://www.w3.org/1999/xlink" ').replace(/ href=/g," xlink:href=").replace(/\n/," ").replace(/<\/svg>.*?$/,"</svg>").replace(/&nbsp;/g," ").replace(/&shy;/g,"­").replace(/<IMG /g,"<image ").replace(/height=([^" ]+)/g,'height="$1"').replace(/width=([^" ]+)/g,'width="$1"').replace(/hc-svg-href="([^"]+)">/g,
'xlink:href="$1"/>').replace(/id=([^" >]+)/g,'id="$1"').replace(/class=([^" >]+)/g,'class="$1"').replace(/ transform /g," ").replace(/:(path|rect)/g,"$1").replace(/style="([^"]+)"/g,function(a){return a.toLowerCase()});d=d.replace(/(url\(#highcharts-[0-9]+)&quot;/g,"$1").replace(/&quot;/g,"'");d.match(/ xmlns="/g).length===2&&(d=d.replace(/xmlns="[^"]+"/,""));return d},exportChart:function(a,b){var a=a||{},c=this.options.exporting,c=this.getSVG(k({chart:{borderRadius:0}},c.chartOptions,b,{exporting:{sourceWidth:a.sourceWidth||
c.sourceWidth,sourceHeight:a.sourceHeight||c.sourceHeight}})),a=k(this.options.exporting,a);e.post(a.url,{filename:a.filename||"chart",type:a.type,width:a.width||0,scale:a.scale||2,svg:c})},print:function(){var a=this,b=a.container,c=[],d=b.parentNode,e=i.body,g=e.childNodes;if(!a.isPrinting)a.isPrinting=!0,r(g,function(a,b){if(a.nodeType===1)c[b]=a.style.display,a.style.display="none"}),e.appendChild(b),z.focus(),z.print(),setTimeout(function(){d.appendChild(b);r(g,function(a,b){if(a.nodeType===
1)a.style.display=c[b]});a.isPrinting=!1},1E3)},contextMenu:function(a,b,c,d,e,g,f){var h=this,q=h.options.navigation,n=q.menuItemStyle,o=h.chartWidth,i=h.chartHeight,A="cache-"+a,l=h[A],k=C(e,g),u,j,s;if(!l)h[A]=l=m("div",{className:"highcharts-"+a},{position:"absolute",zIndex:1E3,padding:k+"px"},h.container),u=m("div",null,p({MozBoxShadow:"3px 3px 10px #888",WebkitBoxShadow:"3px 3px 10px #888",boxShadow:"3px 3px 10px #888"},q.menuStyle),l),j=function(){t(l,{display:"none"});f&&f.setState(0);h.openMenu=
!1},v(l,"mouseleave",function(){s=setTimeout(j,500)}),v(l,"mouseenter",function(){clearTimeout(s)}),r(b,function(a){if(a){var b=a.separator?m("hr",null,null,u):m("div",{onmouseover:function(){t(this,q.menuItemHoverStyle)},onmouseout:function(){t(this,n)},onclick:function(){j();a.onclick.apply(h,arguments)},innerHTML:a.text||h.options.lang[a.textKey]},p({cursor:"pointer"},n),u);h.exportDivElements.push(b)}}),h.exportDivElements.push(u,l),h.exportMenuWidth=l.offsetWidth,h.exportMenuHeight=l.offsetHeight;
a={display:"block"};c+h.exportMenuWidth>o?a.right=o-c-e-k+"px":a.left=c-k+"px";d+g+h.exportMenuHeight>i?a.bottom=i-d-k+"px":a.top=d+g-k+"px";t(l,a);h.openMenu=!0},addButton:function(a){var b=this,c=b.renderer,a=k(b.options.navigation.buttonOptions,a),d=a.onclick,i=a.menuItems,g,f,h={stroke:a.symbolStroke,fill:a.symbolFill},q=a.symbolSize||12;if(!b.btnCount)b.btnCount=0;b.btnCount++;if(!b.exportDivElements)b.exportDivElements=[],b.exportSVGElements=[];if(a.enabled!==!1){var n=a.theme,o=n.states,m=
o&&o.hover,o=o&&o.select,j;delete n.states;d?j=function(){d.apply(b,arguments)}:i&&(j=function(){b.contextMenu("contextmenu",i,f.translateX,f.translateY,f.width,f.height,f);f.setState(2)});a.text&&a.symbol?n.paddingLeft=e.pick(n.paddingLeft,25):a.text||p(n,{width:a.width,height:a.height,padding:0});f=c.button(a.text,0,0,j,n,m,o).attr({title:b.options.lang[a._titleKey],"stroke-linecap":"round"});a.symbol&&(g=c.symbol(a.symbol,a.symbolX-q/2,a.symbolY-q/2,q,q).attr(p(h,{"stroke-width":a.symbolStrokeWidth||
1,zIndex:1})).add(f));f.add().align(p(a,{width:f.width,x:e.pick(a.x,w)}),!0,"spacingBox");w+=(f.width+a.buttonSpacing)*(a.align==="right"?-1:1);b.exportSVGElements.push(f,g)}},destroyExport:function(a){var a=a.target,b,c;for(b=0;b<a.exportSVGElements.length;b++)if(c=a.exportSVGElements[b])c.onclick=c.ontouchstart=null,a.exportSVGElements[b]=c.destroy();for(b=0;b<a.exportDivElements.length;b++)c=a.exportDivElements[b],B(c,"mouseleave"),a.exportDivElements[b]=c.onmouseout=c.onmouseover=c.ontouchstart=
c.onclick=null,j(c)}});E.menu=function(a,b,c,d){return["M",a,b+2.5,"L",a+c,b+2.5,"M",a,b+d/2+0.5,"L",a+c,b+d/2+0.5,"M",a,b+d-1.5,"L",a+c,b+d-1.5]};y.prototype.callbacks.push(function(a){var b,c=a.options.exporting,d=c.buttons;w=0;if(c.enabled!==!1){for(b in d)a.addButton(d[b]);v(a,"destroy",a.destroyExport)}})})(Highcharts);

/*!
 * jQuery Form Plugin
 * version: 3.09 (16-APR-2012)
 * @requires jQuery v1.3.2 or later
 *
 * Examples and documentation at: http://malsup.com/jquery/form/
 * Project repository: https://github.com/malsup/form
 * Dual licensed under the MIT and GPL licenses:
 *    http://malsup.github.com/mit-license.txt
 *    http://malsup.github.com/gpl-license-v2.txt
 */
/*global ActiveXObject alert */
;(function($) {
"use strict";

/*
    Usage Note:
    -----------
    Do not use both ajaxSubmit and ajaxForm on the same form.  These
    functions are mutually exclusive.  Use ajaxSubmit if you want
    to bind your own submit handler to the form.  For example,

    $(document).ready(function() {
        $('#myForm').on('submit', function(e) {
            e.preventDefault(); // <-- important
            $(this).ajaxSubmit({
                target: '#output'
            });
        });
    });

    Use ajaxForm when you want the plugin to manage all the event binding
    for you.  For example,

    $(document).ready(function() {
        $('#myForm').ajaxForm({
            target: '#output'
        });
    });
    
    You can also use ajaxForm with delegation (requires jQuery v1.7+), so the
    form does not have to exist when you invoke ajaxForm:

    $('#myForm').ajaxForm({
        delegation: true,
        target: '#output'
    });
    
    When using ajaxForm, the ajaxSubmit function will be invoked for you
    at the appropriate time.
*/

/**
 * Feature detection
 */
var feature = {};
feature.fileapi = $("<input type='file'/>").get(0).files !== undefined;
feature.formdata = window.FormData !== undefined;

/**
 * ajaxSubmit() provides a mechanism for immediately submitting
 * an HTML form using AJAX.
 */
$.fn.ajaxSubmit = function(options) {
    /*jshint scripturl:true */

    // fast fail if nothing selected (http://dev.jquery.com/ticket/2752)
    if (!this.length) {
        log('ajaxSubmit: skipping submit process - no element selected');
        return this;
    }
    
    var method, action, url, $form = this;

    if (typeof options == 'function') {
        options = { success: options };
    }

    method = this.attr('method');
    action = this.attr('action');
    url = (typeof action === 'string') ? $.trim(action) : '';
    url = url || window.location.href || '';
    if (url) {
        // clean url (don't include hash vaue)
        url = (url.match(/^([^#]+)/)||[])[1];
    }

    options = $.extend(true, {
        url:  url,
        success: $.ajaxSettings.success,
        type: method || 'GET',
        iframeSrc: /^https/i.test(window.location.href || '') ? 'javascript:false' : 'about:blank'
    }, options);

    // hook for manipulating the form data before it is extracted;
    // convenient for use with rich editors like tinyMCE or FCKEditor
    var veto = {};
    this.trigger('form-pre-serialize', [this, options, veto]);
    if (veto.veto) {
        log('ajaxSubmit: submit vetoed via form-pre-serialize trigger');
        return this;
    }

    // provide opportunity to alter form data before it is serialized
    if (options.beforeSerialize && options.beforeSerialize(this, options) === false) {
        log('ajaxSubmit: submit aborted via beforeSerialize callback');
        return this;
    }

    var traditional = options.traditional;
    if ( traditional === undefined ) {
        traditional = $.ajaxSettings.traditional;
    }
    
    var elements = [];
    var qx, a = this.formToArray(options.semantic, elements);
    if (options.data) {
        options.extraData = options.data;
        qx = $.param(options.data, traditional);
    }

    // give pre-submit callback an opportunity to abort the submit
    if (options.beforeSubmit && options.beforeSubmit(a, this, options) === false) {
        log('ajaxSubmit: submit aborted via beforeSubmit callback');
        return this;
    }

    // fire vetoable 'validate' event
    this.trigger('form-submit-validate', [a, this, options, veto]);
    if (veto.veto) {
        log('ajaxSubmit: submit vetoed via form-submit-validate trigger');
        return this;
    }

    var q = $.param(a, traditional);
    if (qx) {
        q = ( q ? (q + '&' + qx) : qx );
    }    
    if (options.type.toUpperCase() == 'GET') {
        options.url += (options.url.indexOf('?') >= 0 ? '&' : '?') + q;
        options.data = null;  // data is null for 'get'
    }
    else {
        options.data = q; // data is the query string for 'post'
    }

    var callbacks = [];
    if (options.resetForm) {
        callbacks.push(function() { $form.resetForm(); });
    }
    if (options.clearForm) {
        callbacks.push(function() { $form.clearForm(options.includeHidden); });
    }

    // perform a load on the target only if dataType is not provided
    if (!options.dataType && options.target) {
        var oldSuccess = options.success || function(){};
        callbacks.push(function(data) {
            var fn = options.replaceTarget ? 'replaceWith' : 'html';
            $(options.target)[fn](data).each(oldSuccess, arguments);
        });
    }
    else if (options.success) {
        callbacks.push(options.success);
    }

    options.success = function(data, status, xhr) { // jQuery 1.4+ passes xhr as 3rd arg
        var context = options.context || options;    // jQuery 1.4+ supports scope context 
        for (var i=0, max=callbacks.length; i < max; i++) {
            callbacks[i].apply(context, [data, status, xhr || $form, $form]);
        }
    };

    // are there files to upload?
    var fileInputs = $('input:file:enabled[value]', this); // [value] (issue #113)
    var hasFileInputs = fileInputs.length > 0;
    var mp = 'multipart/form-data';
    var multipart = ($form.attr('enctype') == mp || $form.attr('encoding') == mp);

    var fileAPI = feature.fileapi && feature.formdata;
    log("fileAPI :" + fileAPI);
    var shouldUseFrame = (hasFileInputs || multipart) && !fileAPI;

    // options.iframe allows user to force iframe mode
    // 06-NOV-09: now defaulting to iframe mode if file input is detected
    if (options.iframe !== false && (options.iframe || shouldUseFrame)) {
        // hack to fix Safari hang (thanks to Tim Molendijk for this)
        // see:  http://groups.google.com/group/jquery-dev/browse_thread/thread/36395b7ab510dd5d
        if (options.closeKeepAlive) {
            $.get(options.closeKeepAlive, function() {
                fileUploadIframe(a);
            });
        }
          else {
            fileUploadIframe(a);
          }
    }
    else if ((hasFileInputs || multipart) && fileAPI) {
        fileUploadXhr(a);
    }
    else {
        $.ajax(options);
    }

    // clear element array
    for (var k=0; k < elements.length; k++)
        elements[k] = null;

    // fire 'notify' event
    this.trigger('form-submit-notify', [this, options]);
    return this;

     // XMLHttpRequest Level 2 file uploads (big hat tip to francois2metz)
    function fileUploadXhr(a) {
        var formdata = new FormData();

        for (var i=0; i < a.length; i++) {
            formdata.append(a[i].name, a[i].value);
        }

        if (options.extraData) {
            for (var p in options.extraData)
                if (options.extraData.hasOwnProperty(p))
                    formdata.append(p, options.extraData[p]);
        }

        options.data = null;

        var s = $.extend(true, {}, $.ajaxSettings, options, {
            contentType: false,
            processData: false,
            cache: false,
            type: 'POST'
        });
        
        if (options.uploadProgress) {
            // workaround because jqXHR does not expose upload property
            s.xhr = function() {
                var xhr = jQuery.ajaxSettings.xhr();
                if (xhr.upload) {
                    xhr.upload.onprogress = function(event) {
                        var percent = 0;
                        var position = event.loaded || event.position; /*event.position is deprecated*/
                        var total = event.total;
                        if (event.lengthComputable) {
                            percent = Math.ceil(position / total * 100);
                        }
                        options.uploadProgress(event, position, total, percent);
                    };
                }
                return xhr;
            };
        }

        s.data = null;
          var beforeSend = s.beforeSend;
          s.beforeSend = function(xhr, o) {
              o.data = formdata;
            if(beforeSend)
                beforeSend.call(o, xhr, options);
        };
        $.ajax(s);
    }

    // private function for handling file uploads (hat tip to YAHOO!)
    function fileUploadIframe(a) {
        var form = $form[0], el, i, s, g, id, $io, io, xhr, sub, n, timedOut, timeoutHandle;
        var useProp = !!$.fn.prop;

        if ($(':input[name=submit],:input[id=submit]', form).length) {
            // if there is an input with a name or id of 'submit' then we won't be
            // able to invoke the submit fn on the form (at least not x-browser)
            alert('Error: Form elements must not have name or id of "submit".');
            return;
        }
        
        if (a) {
            // ensure that every serialized input is still enabled
            for (i=0; i < elements.length; i++) {
                el = $(elements[i]);
                if ( useProp )
                    el.prop('disabled', false);
                else
                    el.removeAttr('disabled');
            }
        }

        s = $.extend(true, {}, $.ajaxSettings, options);
        s.context = s.context || s;
        id = 'jqFormIO' + (new Date().getTime());
        if (s.iframeTarget) {
            $io = $(s.iframeTarget);
            n = $io.attr('name');
            if (!n)
                 $io.attr('name', id);
            else
                id = n;
        }
        else {
            $io = $('<iframe name="' + id + '" src="'+ s.iframeSrc +'" />');
            $io.css({ position: 'absolute', top: '-1000px', left: '-1000px' });
        }
        io = $io[0];


        xhr = { // mock object
            aborted: 0,
            responseText: null,
            responseXML: null,
            status: 0,
            statusText: 'n/a',
            getAllResponseHeaders: function() {},
            getResponseHeader: function() {},
            setRequestHeader: function() {},
            abort: function(status) {
                var e = (status === 'timeout' ? 'timeout' : 'aborted');
                log('aborting upload... ' + e);
                this.aborted = 1;
                $io.attr('src', s.iframeSrc); // abort op in progress
                xhr.error = e;
                if (s.error)
                    s.error.call(s.context, xhr, e, status);
                if (g)
                    $.event.trigger("ajaxError", [xhr, s, e]);
                if (s.complete)
                    s.complete.call(s.context, xhr, e);
            }
        };

        g = s.global;
        // trigger ajax global events so that activity/block indicators work like normal
        if (g && 0 === $.active++) {
            $.event.trigger("ajaxStart");
        }
        if (g) {
            $.event.trigger("ajaxSend", [xhr, s]);
        }

        if (s.beforeSend && s.beforeSend.call(s.context, xhr, s) === false) {
            if (s.global) {
                $.active--;
            }
            return;
        }
        if (xhr.aborted) {
            return;
        }

        // add submitting element to data if we know it
        sub = form.clk;
        if (sub) {
            n = sub.name;
            if (n && !sub.disabled) {
                s.extraData = s.extraData || {};
                s.extraData[n] = sub.value;
                if (sub.type == "image") {
                    s.extraData[n+'.x'] = form.clk_x;
                    s.extraData[n+'.y'] = form.clk_y;
                }
            }
        }
        
        var CLIENT_TIMEOUT_ABORT = 1;
        var SERVER_ABORT = 2;

        function getDoc(frame) {
            var doc = frame.contentWindow ? frame.contentWindow.document : frame.contentDocument ? frame.contentDocument : frame.document;
            return doc;
        }
        
        // Rails CSRF hack (thanks to Yvan Barthelemy)
        var csrf_token = $('meta[name=csrf-token]').attr('content');
        var csrf_param = $('meta[name=csrf-param]').attr('content');
        if (csrf_param && csrf_token) {
            s.extraData = s.extraData || {};
            s.extraData[csrf_param] = csrf_token;
        }

        // take a breath so that pending repaints get some cpu time before the upload starts
        function doSubmit() {
            // make sure form attrs are set
            var t = $form.attr('target'), a = $form.attr('action');

            // update form attrs in IE friendly way
            form.setAttribute('target',id);
            if (!method) {
                form.setAttribute('method', 'POST');
            }
            if (a != s.url) {
                form.setAttribute('action', s.url);
            }

            // ie borks in some cases when setting encoding
            if (! s.skipEncodingOverride && (!method || /post/i.test(method))) {
                $form.attr({
                    encoding: 'multipart/form-data',
                    enctype:  'multipart/form-data'
                });
            }

            // support timout
            if (s.timeout) {
                timeoutHandle = setTimeout(function() { timedOut = true; cb(CLIENT_TIMEOUT_ABORT); }, s.timeout);
            }
            
            // look for server aborts
            function checkState() {
                try {
                    var state = getDoc(io).readyState;
                    log('state = ' + state);
                    if (state && state.toLowerCase() == 'uninitialized')
                        setTimeout(checkState,50);
                }
                catch(e) {
                    log('Server abort: ' , e, ' (', e.name, ')');
                    cb(SERVER_ABORT);
                    if (timeoutHandle)
                        clearTimeout(timeoutHandle);
                    timeoutHandle = undefined;
                }
            }

            // add "extra" data to form if provided in options
            var extraInputs = [];
            try {
                if (s.extraData) {
                    for (var n in s.extraData) {
                        if (s.extraData.hasOwnProperty(n)) {
                            extraInputs.push(
                                $('<input type="hidden" name="'+n+'">').attr('value',s.extraData[n])
                                    .appendTo(form)[0]);
                        }
                    }
                }

                if (!s.iframeTarget) {
                    // add iframe to doc and submit the form
                    $io.appendTo('body');
                    if (io.attachEvent)
                        io.attachEvent('onload', cb);
                    else
                        io.addEventListener('load', cb, false);
                }
                setTimeout(checkState,15);
                form.submit();
            }
            finally {
                // reset attrs and remove "extra" input elements
                form.setAttribute('action',a);
                if(t) {
                    form.setAttribute('target', t);
                } else {
                    $form.removeAttr('target');
                }
                $(extraInputs).remove();
            }
        }

        if (s.forceSync) {
            doSubmit();
        }
        else {
            setTimeout(doSubmit, 10); // this lets dom updates render
        }

        var data, doc, domCheckCount = 50, callbackProcessed;

        function cb(e) {
            if (xhr.aborted || callbackProcessed) {
                return;
            }
            try {
                doc = getDoc(io);
            }
            catch(ex) {
                log('cannot access response document: ', ex);
                e = SERVER_ABORT;
            }
            if (e === CLIENT_TIMEOUT_ABORT && xhr) {
                xhr.abort('timeout');
                return;
            }
            else if (e == SERVER_ABORT && xhr) {
                xhr.abort('server abort');
                return;
            }

            if (!doc || doc.location.href == s.iframeSrc) {
                // response not received yet
                if (!timedOut)
                    return;
            }
            if (io.detachEvent)
                io.detachEvent('onload', cb);
            else    
                io.removeEventListener('load', cb, false);

            var status = 'success', errMsg;
            try {
                if (timedOut) {
                    throw 'timeout';
                }

                var isXml = s.dataType == 'xml' || doc.XMLDocument || $.isXMLDoc(doc);
                log('isXml='+isXml);
                if (!isXml && window.opera && (doc.body === null || !doc.body.innerHTML)) {
                    if (--domCheckCount) {
                        // in some browsers (Opera) the iframe DOM is not always traversable when
                        // the onload callback fires, so we loop a bit to accommodate
                        log('requeing onLoad callback, DOM not available');
                        setTimeout(cb, 250);
                        return;
                    }
                    // let this fall through because server response could be an empty document
                    //log('Could not access iframe DOM after mutiple tries.');
                    //throw 'DOMException: not available';
                }

                //log('response detected');
                var docRoot = doc.body ? doc.body : doc.documentElement;
                xhr.responseText = docRoot ? docRoot.innerHTML : null;
                xhr.responseXML = doc.XMLDocument ? doc.XMLDocument : doc;
                if (isXml)
                    s.dataType = 'xml';
                xhr.getResponseHeader = function(header){
                    var headers = {'content-type': s.dataType};
                    return headers[header];
                };
                // support for XHR 'status' & 'statusText' emulation :
                if (docRoot) {
                    xhr.status = Number( docRoot.getAttribute('status') ) || xhr.status;
                    xhr.statusText = docRoot.getAttribute('statusText') || xhr.statusText;
                }

                var dt = (s.dataType || '').toLowerCase();
                var scr = /(json|script|text)/.test(dt);
                if (scr || s.textarea) {
                    // see if user embedded response in textarea
                    var ta = doc.getElementsByTagName('textarea')[0];
                    if (ta) {
                        xhr.responseText = ta.value;
                        // support for XHR 'status' & 'statusText' emulation :
                        xhr.status = Number( ta.getAttribute('status') ) || xhr.status;
                        xhr.statusText = ta.getAttribute('statusText') || xhr.statusText;
                    }
                    else if (scr) {
                        // account for browsers injecting pre around json response
                        var pre = doc.getElementsByTagName('pre')[0];
                        var b = doc.getElementsByTagName('body')[0];
                        if (pre) {
                            xhr.responseText = pre.textContent ? pre.textContent : pre.innerText;
                        }
                        else if (b) {
                            xhr.responseText = b.textContent ? b.textContent : b.innerText;
                        }
                    }
                }
                else if (dt == 'xml' && !xhr.responseXML && xhr.responseText) {
                    xhr.responseXML = toXml(xhr.responseText);
                }

                try {
                    data = httpData(xhr, dt, s);
                }
                catch (e) {
                    status = 'parsererror';
                    xhr.error = errMsg = (e || status);
                }
            }
            catch (e) {
                log('error caught: ',e);
                status = 'error';
                xhr.error = errMsg = (e || status);
            }

            if (xhr.aborted) {
                log('upload aborted');
                status = null;
            }

            if (xhr.status) { // we've set xhr.status
                status = (xhr.status >= 200 && xhr.status < 300 || xhr.status === 304) ? 'success' : 'error';
            }

            // ordering of these callbacks/triggers is odd, but that's how $.ajax does it
            if (status === 'success') {
                if (s.success)
                    s.success.call(s.context, data, 'success', xhr);
                if (g)
                    $.event.trigger("ajaxSuccess", [xhr, s]);
            }
            else if (status) {
                if (errMsg === undefined)
                    errMsg = xhr.statusText;
                if (s.error)
                    s.error.call(s.context, xhr, status, errMsg);
                if (g)
                    $.event.trigger("ajaxError", [xhr, s, errMsg]);
            }

            if (g)
                $.event.trigger("ajaxComplete", [xhr, s]);

            if (g && ! --$.active) {
                $.event.trigger("ajaxStop");
            }

            if (s.complete)
                s.complete.call(s.context, xhr, status);

            callbackProcessed = true;
            if (s.timeout)
                clearTimeout(timeoutHandle);

            // clean up
            setTimeout(function() {
                if (!s.iframeTarget)
                    $io.remove();
                xhr.responseXML = null;
            }, 100);
        }

        var toXml = $.parseXML || function(s, doc) { // use parseXML if available (jQuery 1.5+)
            if (window.ActiveXObject) {
                doc = new ActiveXObject('Microsoft.XMLDOM');
                doc.async = 'false';
                doc.loadXML(s);
            }
            else {
                doc = (new DOMParser()).parseFromString(s, 'text/xml');
            }
            return (doc && doc.documentElement && doc.documentElement.nodeName != 'parsererror') ? doc : null;
        };
        var parseJSON = $.parseJSON || function(s) {
            /*jslint evil:true */
            return window['eval']('(' + s + ')');
        };

        var httpData = function( xhr, type, s ) { // mostly lifted from jq1.4.4

            var ct = xhr.getResponseHeader('content-type') || '',
                xml = type === 'xml' || !type && ct.indexOf('xml') >= 0,
                data = xml ? xhr.responseXML : xhr.responseText;

            if (xml && data.documentElement.nodeName === 'parsererror') {
                if ($.error)
                    $.error('parsererror');
            }
            if (s && s.dataFilter) {
                data = s.dataFilter(data, type);
            }
            if (typeof data === 'string') {
                if (type === 'json' || !type && ct.indexOf('json') >= 0) {
                    data = parseJSON(data);
                } else if (type === "script" || !type && ct.indexOf("javascript") >= 0) {
                    $.globalEval(data);
                }
            }
            return data;
        };
    }
};

/**
 * ajaxForm() provides a mechanism for fully automating form submission.
 *
 * The advantages of using this method instead of ajaxSubmit() are:
 *
 * 1: This method will include coordinates for <input type="image" /> elements (if the element
 *    is used to submit the form).
 * 2. This method will include the submit element's name/value data (for the element that was
 *    used to submit the form).
 * 3. This method binds the submit() method to the form for you.
 *
 * The options argument for ajaxForm works exactly as it does for ajaxSubmit.  ajaxForm merely
 * passes the options argument along after properly binding events for submit elements and
 * the form itself.
 */
$.fn.ajaxForm = function(options) {
    options = options || {};
    options.delegation = options.delegation && $.isFunction($.fn.on);
    
    // in jQuery 1.3+ we can fix mistakes with the ready state
    if (!options.delegation && this.length === 0) {
        var o = { s: this.selector, c: this.context };
        if (!$.isReady && o.s) {
            log('DOM not ready, queuing ajaxForm');
            $(function() {
                $(o.s,o.c).ajaxForm(options);
            });
            return this;
        }
        // is your DOM ready?  http://docs.jquery.com/Tutorials:Introducing_$(document).ready()
        log('terminating; zero elements found by selector' + ($.isReady ? '' : ' (DOM not ready)'));
        return this;
    }

    if ( options.delegation ) {
        $(document)
            .off('submit.form-plugin', this.selector, doAjaxSubmit)
            .off('click.form-plugin', this.selector, captureSubmittingElement)
            .on('submit.form-plugin', this.selector, options, doAjaxSubmit)
            .on('click.form-plugin', this.selector, options, captureSubmittingElement);
        return this;
    }

    return this.ajaxFormUnbind()
        .bind('submit.form-plugin', options, doAjaxSubmit)
        .bind('click.form-plugin', options, captureSubmittingElement);
};

// private event handlers    
function doAjaxSubmit(e) {
    /*jshint validthis:true */
    var options = e.data;
    if (!e.isDefaultPrevented()) { // if event has been canceled, don't proceed
        e.preventDefault();
        $(this).ajaxSubmit(options);
    }
}
    
function captureSubmittingElement(e) {
    /*jshint validthis:true */
    var target = e.target;
    var $el = $(target);
    if (!($el.is(":submit,input:image"))) {
        // is this a child element of the submit el?  (ex: a span within a button)
        var t = $el.closest(':submit');
        if (t.length === 0) {
            return;
        }
        target = t[0];
    }
    var form = this;
    form.clk = target;
    if (target.type == 'image') {
        if (e.offsetX !== undefined) {
            form.clk_x = e.offsetX;
            form.clk_y = e.offsetY;
        } else if (typeof $.fn.offset == 'function') {
            var offset = $el.offset();
            form.clk_x = e.pageX - offset.left;
            form.clk_y = e.pageY - offset.top;
        } else {
            form.clk_x = e.pageX - target.offsetLeft;
            form.clk_y = e.pageY - target.offsetTop;
        }
    }
    // clear form vars
    setTimeout(function() { form.clk = form.clk_x = form.clk_y = null; }, 100);
}


// ajaxFormUnbind unbinds the event handlers that were bound by ajaxForm
$.fn.ajaxFormUnbind = function() {
    return this.unbind('submit.form-plugin click.form-plugin');
};

/**
 * formToArray() gathers form element data into an array of objects that can
 * be passed to any of the following ajax functions: $.get, $.post, or load.
 * Each object in the array has both a 'name' and 'value' property.  An example of
 * an array for a simple login form might be:
 *
 * [ { name: 'username', value: 'jresig' }, { name: 'password', value: 'secret' } ]
 *
 * It is this array that is passed to pre-submit callback functions provided to the
 * ajaxSubmit() and ajaxForm() methods.
 */
$.fn.formToArray = function(semantic, elements) {
    var a = [];
    if (this.length === 0) {
        return a;
    }

    var form = this[0];
    var els = semantic ? form.getElementsByTagName('*') : form.elements;
    if (!els) {
        return a;
    }

    var i,j,n,v,el,max,jmax;
    for(i=0, max=els.length; i < max; i++) {
        el = els[i];
        n = el.name;
        if (!n) {
            continue;
        }

        if (semantic && form.clk && el.type == "image") {
            // handle image inputs on the fly when semantic == true
            if(!el.disabled && form.clk == el) {
                a.push({name: n, value: $(el).val(), type: el.type });
                a.push({name: n+'.x', value: form.clk_x}, {name: n+'.y', value: form.clk_y});
            }
            continue;
        }

        v = $.fieldValue(el, true);
        if (v && v.constructor == Array) {
            if (elements) 
                elements.push(el);
            for(j=0, jmax=v.length; j < jmax; j++) {
                a.push({name: n, value: v[j]});
            }
        }
        else if (feature.fileapi && el.type == 'file' && !el.disabled) {
            if (elements) 
                elements.push(el);
            var files = el.files;
            if (files.length) {
                for (j=0; j < files.length; j++) {
                    a.push({name: n, value: files[j], type: el.type});
                }
            }
            else {
                // #180
                a.push({ name: n, value: '', type: el.type });
            }
        }
        else if (v !== null && typeof v != 'undefined') {
            if (elements) 
                elements.push(el);
            a.push({name: n, value: v, type: el.type, required: el.required});
        }
    }

    if (!semantic && form.clk) {
        // input type=='image' are not found in elements array! handle it here
        var $input = $(form.clk), input = $input[0];
        n = input.name;
        if (n && !input.disabled && input.type == 'image') {
            a.push({name: n, value: $input.val()});
            a.push({name: n+'.x', value: form.clk_x}, {name: n+'.y', value: form.clk_y});
        }
    }
    return a;
};

/**
 * Serializes form data into a 'submittable' string. This method will return a string
 * in the format: name1=value1&amp;name2=value2
 */
$.fn.formSerialize = function(semantic) {
    //hand off to jQuery.param for proper encoding
    return $.param(this.formToArray(semantic));
};

/**
 * Serializes all field elements in the jQuery object into a query string.
 * This method will return a string in the format: name1=value1&amp;name2=value2
 */
$.fn.fieldSerialize = function(successful) {
    var a = [];
    this.each(function() {
        var n = this.name;
        if (!n) {
            return;
        }
        var v = $.fieldValue(this, successful);
        if (v && v.constructor == Array) {
            for (var i=0,max=v.length; i < max; i++) {
                a.push({name: n, value: v[i]});
            }
        }
        else if (v !== null && typeof v != 'undefined') {
            a.push({name: this.name, value: v});
        }
    });
    //hand off to jQuery.param for proper encoding
    return $.param(a);
};

/**
 * Returns the value(s) of the element in the matched set.  For example, consider the following form:
 *
 *  <form><fieldset>
 *      <input name="A" type="text" />
 *      <input name="A" type="text" />
 *      <input name="B" type="checkbox" value="B1" />
 *      <input name="B" type="checkbox" value="B2"/>
 *      <input name="C" type="radio" value="C1" />
 *      <input name="C" type="radio" value="C2" />
 *  </fieldset></form>
 *
 *  var v = $(':text').fieldValue();
 *  // if no values are entered into the text inputs
 *  v == ['','']
 *  // if values entered into the text inputs are 'foo' and 'bar'
 *  v == ['foo','bar']
 *
 *  var v = $(':checkbox').fieldValue();
 *  // if neither checkbox is checked
 *  v === undefined
 *  // if both checkboxes are checked
 *  v == ['B1', 'B2']
 *
 *  var v = $(':radio').fieldValue();
 *  // if neither radio is checked
 *  v === undefined
 *  // if first radio is checked
 *  v == ['C1']
 *
 * The successful argument controls whether or not the field element must be 'successful'
 * (per http://www.w3.org/TR/html4/interact/forms.html#successful-controls).
 * The default value of the successful argument is true.  If this value is false the value(s)
 * for each element is returned.
 *
 * Note: This method *always* returns an array.  If no valid value can be determined the
 *    array will be empty, otherwise it will contain one or more values.
 */
$.fn.fieldValue = function(successful) {
    for (var val=[], i=0, max=this.length; i < max; i++) {
        var el = this[i];
        var v = $.fieldValue(el, successful);
        if (v === null || typeof v == 'undefined' || (v.constructor == Array && !v.length)) {
            continue;
        }
        if (v.constructor == Array)
            $.merge(val, v);
        else
            val.push(v);
    }
    return val;
};

/**
 * Returns the value of the field element.
 */
$.fieldValue = function(el, successful) {
    var n = el.name, t = el.type, tag = el.tagName.toLowerCase();
    if (successful === undefined) {
        successful = true;
    }

    if (successful && (!n || el.disabled || t == 'reset' || t == 'button' ||
        (t == 'checkbox' || t == 'radio') && !el.checked ||
        (t == 'submit' || t == 'image') && el.form && el.form.clk != el ||
        tag == 'select' && el.selectedIndex == -1)) {
            return null;
    }

    if (tag == 'select') {
        var index = el.selectedIndex;
        if (index < 0) {
            return null;
        }
        var a = [], ops = el.options;
        var one = (t == 'select-one');
        var max = (one ? index+1 : ops.length);
        for(var i=(one ? index : 0); i < max; i++) {
            var op = ops[i];
            if (op.selected) {
                var v = op.value;
                if (!v) { // extra pain for IE...
                    v = (op.attributes && op.attributes['value'] && !(op.attributes['value'].specified)) ? op.text : op.value;
                }
                if (one) {
                    return v;
                }
                a.push(v);
            }
        }
        return a;
    }
    return $(el).val();
};

/**
 * Clears the form data.  Takes the following actions on the form's input fields:
 *  - input text fields will have their 'value' property set to the empty string
 *  - select elements will have their 'selectedIndex' property set to -1
 *  - checkbox and radio inputs will have their 'checked' property set to false
 *  - inputs of type submit, button, reset, and hidden will *not* be effected
 *  - button elements will *not* be effected
 */
$.fn.clearForm = function(includeHidden) {
    return this.each(function() {
        $('input,select,textarea', this).clearFields(includeHidden);
    });
};

/**
 * Clears the selected form elements.
 */
$.fn.clearFields = $.fn.clearInputs = function(includeHidden) {
    var re = /^(?:color|date|datetime|email|month|number|password|range|search|tel|text|time|url|week)$/i; // 'hidden' is not in this list
    return this.each(function() {
        var t = this.type, tag = this.tagName.toLowerCase();
        if (re.test(t) || tag == 'textarea') {
            this.value = '';
        }
        else if (t == 'checkbox' || t == 'radio') {
            this.checked = false;
        }
        else if (tag == 'select') {
            this.selectedIndex = -1;
        }
        else if (includeHidden) {
            // includeHidden can be the valud true, or it can be a selector string
            // indicating a special test; for example:
            //  $('#myForm').clearForm('.special:hidden')
            // the above would clean hidden inputs that have the class of 'special'
            if ( (includeHidden === true && /hidden/.test(t)) ||
                 (typeof includeHidden == 'string' && $(this).is(includeHidden)) )
                this.value = '';
        }
    });
};

/**
 * Resets the form data.  Causes all form elements to be reset to their original value.
 */
$.fn.resetForm = function() {
    return this.each(function() {
        // guard against an input with the name of 'reset'
        // note that IE reports the reset function as an 'object'
        if (typeof this.reset == 'function' || (typeof this.reset == 'object' && !this.reset.nodeType)) {
            this.reset();
        }
    });
};

/**
 * Enables or disables any matching elements.
 */
$.fn.enable = function(b) {
    if (b === undefined) {
        b = true;
    }
    return this.each(function() {
        this.disabled = !b;
    });
};

/**
 * Checks/unchecks any matching checkboxes or radio buttons and
 * selects/deselects and matching option elements.
 */
$.fn.selected = function(select) {
    if (select === undefined) {
        select = true;
    }
    return this.each(function() {
        var t = this.type;
        if (t == 'checkbox' || t == 'radio') {
            this.checked = select;
        }
        else if (this.tagName.toLowerCase() == 'option') {
            var $sel = $(this).parent('select');
            if (select && $sel[0] && $sel[0].type == 'select-one') {
                // deselect all other options
                $sel.find('option').selected(false);
            }
            this.selected = select;
        }
    });
};

// expose debug var
$.fn.ajaxSubmit.debug = false;

// helper fn for console logging
function log() {
    if (!$.fn.ajaxSubmit.debug) 
        return;
    var msg = '[jquery.form] ' + Array.prototype.join.call(arguments,'');
    if (window.console && window.console.log) {
        window.console.log(msg);
    }
    else if (window.opera && window.opera.postError) {
        window.opera.postError(msg);
    }
}

})(jQuery);

/*!
* Bootstrap.js by @fat & @mdo
* Copyright 2012 Twitter, Inc.
* http://www.apache.org/licenses/LICENSE-2.0.txt
*/
!function(e){"use strict";e(function(){e.support.transition=function(){var e=function(){var e=document.createElement("bootstrap"),t={WebkitTransition:"webkitTransitionEnd",MozTransition:"transitionend",OTransition:"oTransitionEnd otransitionend",transition:"transitionend"},n;for(n in t)if(e.style[n]!==undefined)return t[n]}();return e&&{end:e}}()})}(window.jQuery),!function(e){"use strict";var t='[data-dismiss="alert"]',n=function(n){e(n).on("click",t,this.close)};n.prototype.close=function(t){function s(){i.trigger("closed").remove()}var n=e(this),r=n.attr("data-target"),i;r||(r=n.attr("href"),r=r&&r.replace(/.*(?=#[^\s]*$)/,"")),i=e(r),t&&t.preventDefault(),i.length||(i=n.hasClass("alert")?n:n.parent()),i.trigger(t=e.Event("close"));if(t.isDefaultPrevented())return;i.removeClass("in"),e.support.transition&&i.hasClass("fade")?i.on(e.support.transition.end,s):s()};var r=e.fn.alert;e.fn.alert=function(t){return this.each(function(){var r=e(this),i=r.data("alert");i||r.data("alert",i=new n(this)),typeof t=="string"&&i[t].call(r)})},e.fn.alert.Constructor=n,e.fn.alert.noConflict=function(){return e.fn.alert=r,this},e(document).on("click.alert.data-api",t,n.prototype.close)}(window.jQuery),!function(e){"use strict";var t=function(t,n){this.$element=e(t),this.options=e.extend({},e.fn.button.defaults,n)};t.prototype.setState=function(e){var t="disabled",n=this.$element,r=n.data(),i=n.is("input")?"val":"html";e+="Text",r.resetText||n.data("resetText",n[i]()),n[i](r[e]||this.options[e]),setTimeout(function(){e=="loadingText"?n.addClass(t).attr(t,t):n.removeClass(t).removeAttr(t)},0)},t.prototype.toggle=function(){var e=this.$element.closest('[data-toggle="buttons-radio"]');e&&e.find(".active").removeClass("active"),this.$element.toggleClass("active")};var n=e.fn.button;e.fn.button=function(n){return this.each(function(){var r=e(this),i=r.data("button"),s=typeof n=="object"&&n;i||r.data("button",i=new t(this,s)),n=="toggle"?i.toggle():n&&i.setState(n)})},e.fn.button.defaults={loadingText:"loading..."},e.fn.button.Constructor=t,e.fn.button.noConflict=function(){return e.fn.button=n,this},e(document).on("click.button.data-api","[data-toggle^=button]",function(t){var n=e(t.target);n.hasClass("btn")||(n=n.closest(".btn")),n.button("toggle")})}(window.jQuery),!function(e){"use strict";var t=function(t,n){this.$element=e(t),this.$indicators=this.$element.find(".carousel-indicators"),this.options=n,this.options.pause=="hover"&&this.$element.on("mouseenter",e.proxy(this.pause,this)).on("mouseleave",e.proxy(this.cycle,this))};t.prototype={cycle:function(t){return t||(this.paused=!1),this.interval&&clearInterval(this.interval),this.options.interval&&!this.paused&&(this.interval=setInterval(e.proxy(this.next,this),this.options.interval)),this},getActiveIndex:function(){return this.$active=this.$element.find(".item.active"),this.$items=this.$active.parent().children(),this.$items.index(this.$active)},to:function(t){var n=this.getActiveIndex(),r=this;if(t>this.$items.length-1||t<0)return;return this.sliding?this.$element.one("slid",function(){r.to(t)}):n==t?this.pause().cycle():this.slide(t>n?"next":"prev",e(this.$items[t]))},pause:function(t){return t||(this.paused=!0),this.$element.find(".next, .prev").length&&e.support.transition.end&&(this.$element.trigger(e.support.transition.end),this.cycle(!0)),clearInterval(this.interval),this.interval=null,this},next:function(){if(this.sliding)return;return this.slide("next")},prev:function(){if(this.sliding)return;return this.slide("prev")},slide:function(t,n){var r=this.$element.find(".item.active"),i=n||r[t](),s=this.interval,o=t=="next"?"left":"right",u=t=="next"?"first":"last",a=this,f;this.sliding=!0,s&&this.pause(),i=i.length?i:this.$element.find(".item")[u](),f=e.Event("slide",{relatedTarget:i[0],direction:o});if(i.hasClass("active"))return;this.$indicators.length&&(this.$indicators.find(".active").removeClass("active"),this.$element.one("slid",function(){var t=e(a.$indicators.children()[a.getActiveIndex()]);t&&t.addClass("active")}));if(e.support.transition&&this.$element.hasClass("slide")){this.$element.trigger(f);if(f.isDefaultPrevented())return;i.addClass(t),i[0].offsetWidth,r.addClass(o),i.addClass(o),this.$element.one(e.support.transition.end,function(){i.removeClass([t,o].join(" ")).addClass("active"),r.removeClass(["active",o].join(" ")),a.sliding=!1,setTimeout(function(){a.$element.trigger("slid")},0)})}else{this.$element.trigger(f);if(f.isDefaultPrevented())return;r.removeClass("active"),i.addClass("active"),this.sliding=!1,this.$element.trigger("slid")}return s&&this.cycle(),this}};var n=e.fn.carousel;e.fn.carousel=function(n){return this.each(function(){var r=e(this),i=r.data("carousel"),s=e.extend({},e.fn.carousel.defaults,typeof n=="object"&&n),o=typeof n=="string"?n:s.slide;i||r.data("carousel",i=new t(this,s)),typeof n=="number"?i.to(n):o?i[o]():s.interval&&i.pause().cycle()})},e.fn.carousel.defaults={interval:5e3,pause:"hover"},e.fn.carousel.Constructor=t,e.fn.carousel.noConflict=function(){return e.fn.carousel=n,this},e(document).on("click.carousel.data-api","[data-slide], [data-slide-to]",function(t){var n=e(this),r,i=e(n.attr("data-target")||(r=n.attr("href"))&&r.replace(/.*(?=#[^\s]+$)/,"")),s=e.extend({},i.data(),n.data()),o;i.carousel(s),(o=n.attr("data-slide-to"))&&i.data("carousel").pause().to(o).cycle(),t.preventDefault()})}(window.jQuery),!function(e){"use strict";var t=function(t,n){this.$element=e(t),this.options=e.extend({},e.fn.collapse.defaults,n),this.options.parent&&(this.$parent=e(this.options.parent)),this.options.toggle&&this.toggle()};t.prototype={constructor:t,dimension:function(){var e=this.$element.hasClass("width");return e?"width":"height"},show:function(){var t,n,r,i;if(this.transitioning||this.$element.hasClass("in"))return;t=this.dimension(),n=e.camelCase(["scroll",t].join("-")),r=this.$parent&&this.$parent.find("> .accordion-group > .in");if(r&&r.length){i=r.data("collapse");if(i&&i.transitioning)return;r.collapse("hide"),i||r.data("collapse",null)}this.$element[t](0),this.transition("addClass",e.Event("show"),"shown"),e.support.transition&&this.$element[t](this.$element[0][n])},hide:function(){var t;if(this.transitioning||!this.$element.hasClass("in"))return;t=this.dimension(),this.reset(this.$element[t]()),this.transition("removeClass",e.Event("hide"),"hidden"),this.$element[t](0)},reset:function(e){var t=this.dimension();return this.$element.removeClass("collapse")[t](e||"auto")[0].offsetWidth,this.$element[e!==null?"addClass":"removeClass"]("collapse"),this},transition:function(t,n,r){var i=this,s=function(){n.type=="show"&&i.reset(),i.transitioning=0,i.$element.trigger(r)};this.$element.trigger(n);if(n.isDefaultPrevented())return;this.transitioning=1,this.$element[t]("in"),e.support.transition&&this.$element.hasClass("collapse")?this.$element.one(e.support.transition.end,s):s()},toggle:function(){this[this.$element.hasClass("in")?"hide":"show"]()}};var n=e.fn.collapse;e.fn.collapse=function(n){return this.each(function(){var r=e(this),i=r.data("collapse"),s=e.extend({},e.fn.collapse.defaults,r.data(),typeof n=="object"&&n);i||r.data("collapse",i=new t(this,s)),typeof n=="string"&&i[n]()})},e.fn.collapse.defaults={toggle:!0},e.fn.collapse.Constructor=t,e.fn.collapse.noConflict=function(){return e.fn.collapse=n,this},e(document).on("click.collapse.data-api","[data-toggle=collapse]",function(t){var n=e(this),r,i=n.attr("data-target")||t.preventDefault()||(r=n.attr("href"))&&r.replace(/.*(?=#[^\s]+$)/,""),s=e(i).data("collapse")?"toggle":n.data();n[e(i).hasClass("in")?"addClass":"removeClass"]("collapsed"),e(i).collapse(s)})}(window.jQuery),!function(e){"use strict";function r(){e(t).each(function(){i(e(this)).removeClass("open")})}function i(t){var n=t.attr("data-target"),r;n||(n=t.attr("href"),n=n&&/#/.test(n)&&n.replace(/.*(?=#[^\s]*$)/,"")),r=n&&e(n);if(!r||!r.length)r=t.parent();return r}var t="[data-toggle=dropdown]",n=function(t){var n=e(t).on("click.dropdown.data-api",this.toggle);e("html").on("click.dropdown.data-api",function(){n.parent().removeClass("open")})};n.prototype={constructor:n,toggle:function(t){var n=e(this),s,o;if(n.is(".disabled, :disabled"))return;return s=i(n),o=s.hasClass("open"),r(),o||s.toggleClass("open"),n.focus(),!1},keydown:function(n){var r,s,o,u,a,f;if(!/(38|40|27)/.test(n.keyCode))return;r=e(this),n.preventDefault(),n.stopPropagation();if(r.is(".disabled, :disabled"))return;u=i(r),a=u.hasClass("open");if(!a||a&&n.keyCode==27)return n.which==27&&u.find(t).focus(),r.click();s=e("[role=menu] li:not(.divider):visible a",u);if(!s.length)return;f=s.index(s.filter(":focus")),n.keyCode==38&&f>0&&f--,n.keyCode==40&&f<s.length-1&&f++,~f||(f=0),s.eq(f).focus()}};var s=e.fn.dropdown;e.fn.dropdown=function(t){return this.each(function(){var r=e(this),i=r.data("dropdown");i||r.data("dropdown",i=new n(this)),typeof t=="string"&&i[t].call(r)})},e.fn.dropdown.Constructor=n,e.fn.dropdown.noConflict=function(){return e.fn.dropdown=s,this},e(document).on("click.dropdown.data-api",r).on("click.dropdown.data-api",".dropdown form",function(e){e.stopPropagation()}).on("click.dropdown-menu",function(e){e.stopPropagation()}).on("click.dropdown.data-api",t,n.prototype.toggle).on("keydown.dropdown.data-api",t+", [role=menu]",n.prototype.keydown)}(window.jQuery),!function(e){"use strict";var t=function(t,n){this.options=n,this.$element=e(t).delegate('[data-dismiss="modal"]',"click.dismiss.modal",e.proxy(this.hide,this)),this.options.remote&&this.$element.find(".modal-body").load(this.options.remote)};t.prototype={constructor:t,toggle:function(){return this[this.isShown?"hide":"show"]()},show:function(){var t=this,n=e.Event("show");this.$element.trigger(n);if(this.isShown||n.isDefaultPrevented())return;this.isShown=!0,this.escape(),this.backdrop(function(){var n=e.support.transition&&t.$element.hasClass("fade");t.$element.parent().length||t.$element.appendTo(document.body),t.$element.show(),n&&t.$element[0].offsetWidth,t.$element.addClass("in").attr("aria-hidden",!1),t.enforceFocus(),n?t.$element.one(e.support.transition.end,function(){t.$element.focus().trigger("shown")}):t.$element.focus().trigger("shown")})},hide:function(t){t&&t.preventDefault();var n=this;t=e.Event("hide"),this.$element.trigger(t);if(!this.isShown||t.isDefaultPrevented())return;this.isShown=!1,this.escape(),e(document).off("focusin.modal"),this.$element.removeClass("in").attr("aria-hidden",!0),e.support.transition&&this.$element.hasClass("fade")?this.hideWithTransition():this.hideModal()},enforceFocus:function(){var t=this;e(document).on("focusin.modal",function(e){t.$element[0]!==e.target&&!t.$element.has(e.target).length&&t.$element.focus()})},escape:function(){var e=this;this.isShown&&this.options.keyboard?this.$element.on("keyup.dismiss.modal",function(t){t.which==27&&e.hide()}):this.isShown||this.$element.off("keyup.dismiss.modal")},hideWithTransition:function(){var t=this,n=setTimeout(function(){t.$element.off(e.support.transition.end),t.hideModal()},500);this.$element.one(e.support.transition.end,function(){clearTimeout(n),t.hideModal()})},hideModal:function(){var e=this;this.$element.hide(),this.backdrop(function(){e.removeBackdrop(),e.$element.trigger("hidden")})},removeBackdrop:function(){this.$backdrop&&this.$backdrop.remove(),this.$backdrop=null},backdrop:function(t){var n=this,r=this.$element.hasClass("fade")?"fade":"";if(this.isShown&&this.options.backdrop){var i=e.support.transition&&r;this.$backdrop=e('<div class="modal-backdrop '+r+'" />').appendTo(document.body),this.$backdrop.click(this.options.backdrop=="static"?e.proxy(this.$element[0].focus,this.$element[0]):e.proxy(this.hide,this)),i&&this.$backdrop[0].offsetWidth,this.$backdrop.addClass("in");if(!t)return;i?this.$backdrop.one(e.support.transition.end,t):t()}else!this.isShown&&this.$backdrop?(this.$backdrop.removeClass("in"),e.support.transition&&this.$element.hasClass("fade")?this.$backdrop.one(e.support.transition.end,t):t()):t&&t()}};var n=e.fn.modal;e.fn.modal=function(n){return this.each(function(){var r=e(this),i=r.data("modal"),s=e.extend({},e.fn.modal.defaults,r.data(),typeof n=="object"&&n);i||r.data("modal",i=new t(this,s)),typeof n=="string"?i[n]():s.show&&i.show()})},e.fn.modal.defaults={backdrop:!0,keyboard:!0,show:!0},e.fn.modal.Constructor=t,e.fn.modal.noConflict=function(){return e.fn.modal=n,this},e(document).on("click.modal.data-api",'[data-toggle="modal"]',function(t){var n=e(this),r=n.attr("href"),i=e(n.attr("data-target")||r&&r.replace(/.*(?=#[^\s]+$)/,"")),s=i.data("modal")?"toggle":e.extend({remote:!/#/.test(r)&&r},i.data(),n.data());t.preventDefault(),i.modal(s).one("hide",function(){n.focus()})})}(window.jQuery),!function(e){"use strict";var t=function(e,t){this.init("tooltip",e,t)};t.prototype={constructor:t,init:function(t,n,r){var i,s,o,u,a;this.type=t,this.$element=e(n),this.options=this.getOptions(r),this.enabled=!0,o=this.options.trigger.split(" ");for(a=o.length;a--;)u=o[a],u=="click"?this.$element.on("click."+this.type,this.options.selector,e.proxy(this.toggle,this)):u!="manual"&&(i=u=="hover"?"mouseenter":"focus",s=u=="hover"?"mouseleave":"blur",this.$element.on(i+"."+this.type,this.options.selector,e.proxy(this.enter,this)),this.$element.on(s+"."+this.type,this.options.selector,e.proxy(this.leave,this)));this.options.selector?this._options=e.extend({},this.options,{trigger:"manual",selector:""}):this.fixTitle()},getOptions:function(t){return t=e.extend({},e.fn[this.type].defaults,this.$element.data(),t),t.delay&&typeof t.delay=="number"&&(t.delay={show:t.delay,hide:t.delay}),t},enter:function(t){var n=e.fn[this.type].defaults,r={},i;this._options&&e.each(this._options,function(e,t){n[e]!=t&&(r[e]=t)},this),i=e(t.currentTarget)[this.type](r).data(this.type);if(!i.options.delay||!i.options.delay.show)return i.show();clearTimeout(this.timeout),i.hoverState="in",this.timeout=setTimeout(function(){i.hoverState=="in"&&i.show()},i.options.delay.show)},leave:function(t){var n=e(t.currentTarget)[this.type](this._options).data(this.type);this.timeout&&clearTimeout(this.timeout);if(!n.options.delay||!n.options.delay.hide)return n.hide();n.hoverState="out",this.timeout=setTimeout(function(){n.hoverState=="out"&&n.hide()},n.options.delay.hide)},show:function(){var t,n,r,i,s,o,u=e.Event("show");if(this.hasContent()&&this.enabled){this.$element.trigger(u);if(u.isDefaultPrevented())return;t=this.tip(),this.setContent(),this.options.animation&&t.addClass("fade"),s=typeof this.options.placement=="function"?this.options.placement.call(this,t[0],this.$element[0]):this.options.placement,t.detach().css({top:0,left:0,display:"block"}),this.options.container?t.appendTo(this.options.container):t.insertAfter(this.$element),n=this.getPosition(),r=t[0].offsetWidth,i=t[0].offsetHeight;switch(s){case"bottom":o={top:n.top+n.height,left:n.left+n.width/2-r/2};break;case"top":o={top:n.top-i,left:n.left+n.width/2-r/2};break;case"left":o={top:n.top+n.height/2-i/2,left:n.left-r};break;case"right":o={top:n.top+n.height/2-i/2,left:n.left+n.width}}this.applyPlacement(o,s),this.$element.trigger("shown")}},applyPlacement:function(e,t){var n=this.tip(),r=n[0].offsetWidth,i=n[0].offsetHeight,s,o,u,a;n.offset(e).addClass(t).addClass("in"),s=n[0].offsetWidth,o=n[0].offsetHeight,t=="top"&&o!=i&&(e.top=e.top+i-o,a=!0),t=="bottom"||t=="top"?(u=0,e.left<0&&(u=e.left*-2,e.left=0,n.offset(e),s=n[0].offsetWidth,o=n[0].offsetHeight),this.replaceArrow(u-r+s,s,"left")):this.replaceArrow(o-i,o,"top"),a&&n.offset(e)},replaceArrow:function(e,t,n){this.arrow().css(n,e?50*(1-e/t)+"%":"")},setContent:function(){var e=this.tip(),t=this.getTitle();e.find(".tooltip-inner")[this.options.html?"html":"text"](t),e.removeClass("fade in top bottom left right")},hide:function(){function i(){var t=setTimeout(function(){n.off(e.support.transition.end).detach()},500);n.one(e.support.transition.end,function(){clearTimeout(t),n.detach()})}var t=this,n=this.tip(),r=e.Event("hide");this.$element.trigger(r);if(r.isDefaultPrevented())return;return n.removeClass("in"),e.support.transition&&this.$tip.hasClass("fade")?i():n.detach(),this.$element.trigger("hidden"),this},fixTitle:function(){var e=this.$element;(e.attr("title")||typeof e.attr("data-original-title")!="string")&&e.attr("data-original-title",e.attr("title")||"").attr("title","")},hasContent:function(){return this.getTitle()},getPosition:function(){var t=this.$element[0];return e.extend({},typeof t.getBoundingClientRect=="function"?t.getBoundingClientRect():{width:t.offsetWidth,height:t.offsetHeight},this.$element.offset())},getTitle:function(){var e,t=this.$element,n=this.options;return e=t.attr("data-original-title")||(typeof n.title=="function"?n.title.call(t[0]):n.title),e},tip:function(){return this.$tip=this.$tip||e(this.options.template)},arrow:function(){return this.$arrow=this.$arrow||this.tip().find(".tooltip-arrow")},validate:function(){this.$element[0].parentNode||(this.hide(),this.$element=null,this.options=null)},enable:function(){this.enabled=!0},disable:function(){this.enabled=!1},toggleEnabled:function(){this.enabled=!this.enabled},toggle:function(t){var n=t?e(t.currentTarget)[this.type](this._options).data(this.type):this;n.tip().hasClass("in")?n.hide():n.show()},destroy:function(){this.hide().$element.off("."+this.type).removeData(this.type)}};var n=e.fn.tooltip;e.fn.tooltip=function(n){return this.each(function(){var r=e(this),i=r.data("tooltip"),s=typeof n=="object"&&n;i||r.data("tooltip",i=new t(this,s)),typeof n=="string"&&i[n]()})},e.fn.tooltip.Constructor=t,e.fn.tooltip.defaults={animation:!0,placement:"top",selector:!1,template:'<div class="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner"></div></div>',trigger:"hover focus",title:"",delay:0,html:!1,container:!1},e.fn.tooltip.noConflict=function(){return e.fn.tooltip=n,this}}(window.jQuery),!function(e){"use strict";var t=function(e,t){this.init("popover",e,t)};t.prototype=e.extend({},e.fn.tooltip.Constructor.prototype,{constructor:t,setContent:function(){var e=this.tip(),t=this.getTitle(),n=this.getContent();e.find(".popover-title")[this.options.html?"html":"text"](t),e.find(".popover-content")[this.options.html?"html":"text"](n),e.removeClass("fade top bottom left right in")},hasContent:function(){return this.getTitle()||this.getContent()},getContent:function(){var e,t=this.$element,n=this.options;return e=(typeof n.content=="function"?n.content.call(t[0]):n.content)||t.attr("data-content"),e},tip:function(){return this.$tip||(this.$tip=e(this.options.template)),this.$tip},destroy:function(){this.hide().$element.off("."+this.type).removeData(this.type)}});var n=e.fn.popover;e.fn.popover=function(n){return this.each(function(){var r=e(this),i=r.data("popover"),s=typeof n=="object"&&n;i||r.data("popover",i=new t(this,s)),typeof n=="string"&&i[n]()})},e.fn.popover.Constructor=t,e.fn.popover.defaults=e.extend({},e.fn.tooltip.defaults,{placement:"right",trigger:"click",content:"",template:'<div class="popover"><div class="arrow"></div><h3 class="popover-title"></h3><div class="popover-content"></div></div>'}),e.fn.popover.noConflict=function(){return e.fn.popover=n,this}}(window.jQuery),!function(e){"use strict";function t(t,n){var r=e.proxy(this.process,this),i=e(t).is("body")?e(window):e(t),s;this.options=e.extend({},e.fn.scrollspy.defaults,n),this.$scrollElement=i.on("scroll.scroll-spy.data-api",r),this.selector=(this.options.target||(s=e(t).attr("href"))&&s.replace(/.*(?=#[^\s]+$)/,"")||"")+" .nav li > a",this.$body=e("body"),this.refresh(),this.process()}t.prototype={constructor:t,refresh:function(){var t=this,n;this.offsets=e([]),this.targets=e([]),n=this.$body.find(this.selector).map(function(){var n=e(this),r=n.data("target")||n.attr("href"),i=/^#\w/.test(r)&&e(r);return i&&i.length&&[[i.position().top+(!e.isWindow(t.$scrollElement.get(0))&&t.$scrollElement.scrollTop()),r]]||null}).sort(function(e,t){return e[0]-t[0]}).each(function(){t.offsets.push(this[0]),t.targets.push(this[1])})},process:function(){var e=this.$scrollElement.scrollTop()+this.options.offset,t=this.$scrollElement[0].scrollHeight||this.$body[0].scrollHeight,n=t-this.$scrollElement.height(),r=this.offsets,i=this.targets,s=this.activeTarget,o;if(e>=n)return s!=(o=i.last()[0])&&this.activate(o);for(o=r.length;o--;)s!=i[o]&&e>=r[o]&&(!r[o+1]||e<=r[o+1])&&this.activate(i[o])},activate:function(t){var n,r;this.activeTarget=t,e(this.selector).parent(".active").removeClass("active"),r=this.selector+'[data-target="'+t+'"],'+this.selector+'[href="'+t+'"]',n=e(r).parent("li").addClass("active"),n.parent(".dropdown-menu").length&&(n=n.closest("li.dropdown").addClass("active")),n.trigger("activate")}};var n=e.fn.scrollspy;e.fn.scrollspy=function(n){return this.each(function(){var r=e(this),i=r.data("scrollspy"),s=typeof n=="object"&&n;i||r.data("scrollspy",i=new t(this,s)),typeof n=="string"&&i[n]()})},e.fn.scrollspy.Constructor=t,e.fn.scrollspy.defaults={offset:10},e.fn.scrollspy.noConflict=function(){return e.fn.scrollspy=n,this},e(window).on("load",function(){e('[data-spy="scroll"]').each(function(){var t=e(this);t.scrollspy(t.data())})})}(window.jQuery),!function(e){"use strict";var t=function(t){this.element=e(t)};t.prototype={constructor:t,show:function(){var t=this.element,n=t.closest("ul:not(.dropdown-menu)"),r=t.attr("data-target"),i,s,o;r||(r=t.attr("href"),r=r&&r.replace(/.*(?=#[^\s]*$)/,""));if(t.parent("li").hasClass("active"))return;i=n.find(".active:last a")[0],o=e.Event("show",{relatedTarget:i}),t.trigger(o);if(o.isDefaultPrevented())return;s=e(r),this.activate(t.parent("li"),n),this.activate(s,s.parent(),function(){t.trigger({type:"shown",relatedTarget:i})})},activate:function(t,n,r){function o(){i.removeClass("active").find("> .dropdown-menu > .active").removeClass("active"),t.addClass("active"),s?(t[0].offsetWidth,t.addClass("in")):t.removeClass("fade"),t.parent(".dropdown-menu")&&t.closest("li.dropdown").addClass("active"),r&&r()}var i=n.find("> .active"),s=r&&e.support.transition&&i.hasClass("fade");s?i.one(e.support.transition.end,o):o(),i.removeClass("in")}};var n=e.fn.tab;e.fn.tab=function(n){return this.each(function(){var r=e(this),i=r.data("tab");i||r.data("tab",i=new t(this)),typeof n=="string"&&i[n]()})},e.fn.tab.Constructor=t,e.fn.tab.noConflict=function(){return e.fn.tab=n,this},e(document).on("click.tab.data-api",'[data-toggle="tab"], [data-toggle="pill"]',function(t){t.preventDefault(),e(this).tab("show")})}(window.jQuery),!function(e){"use strict";var t=function(t,n){this.$element=e(t),this.options=e.extend({},e.fn.typeahead.defaults,n),this.matcher=this.options.matcher||this.matcher,this.sorter=this.options.sorter||this.sorter,this.highlighter=this.options.highlighter||this.highlighter,this.updater=this.options.updater||this.updater,this.source=this.options.source,this.$menu=e(this.options.menu),this.shown=!1,this.listen()};t.prototype={constructor:t,select:function(){var e=this.$menu.find(".active").attr("data-value");return this.$element.val(this.updater(e)).change(),this.hide()},updater:function(e){return e},show:function(){var t=e.extend({},this.$element.position(),{height:this.$element[0].offsetHeight});return this.$menu.insertAfter(this.$element).css({top:t.top+t.height,left:t.left}).show(),this.shown=!0,this},hide:function(){return this.$menu.hide(),this.shown=!1,this},lookup:function(t){var n;return this.query=this.$element.val(),!this.query||this.query.length<this.options.minLength?this.shown?this.hide():this:(n=e.isFunction(this.source)?this.source(this.query,e.proxy(this.process,this)):this.source,n?this.process(n):this)},process:function(t){var n=this;return t=e.grep(t,function(e){return n.matcher(e)}),t=this.sorter(t),t.length?this.render(t.slice(0,this.options.items)).show():this.shown?this.hide():this},matcher:function(e){return~e.toLowerCase().indexOf(this.query.toLowerCase())},sorter:function(e){var t=[],n=[],r=[],i;while(i=e.shift())i.toLowerCase().indexOf(this.query.toLowerCase())?~i.indexOf(this.query)?n.push(i):r.push(i):t.push(i);return t.concat(n,r)},highlighter:function(e){var t=this.query.replace(/[\-\[\]{}()*+?.,\\\^$|#\s]/g,"\\$&");return e.replace(new RegExp("("+t+")","ig"),function(e,t){return"<strong>"+t+"</strong>"})},render:function(t){var n=this;return t=e(t).map(function(t,r){return t=e(n.options.item).attr("data-value",r),t.find("a").html(n.highlighter(r)),t[0]}),t.first().addClass("active"),this.$menu.html(t),this},next:function(t){var n=this.$menu.find(".active").removeClass("active"),r=n.next();r.length||(r=e(this.$menu.find("li")[0])),r.addClass("active")},prev:function(e){var t=this.$menu.find(".active").removeClass("active"),n=t.prev();n.length||(n=this.$menu.find("li").last()),n.addClass("active")},listen:function(){this.$element.on("focus",e.proxy(this.focus,this)).on("blur",e.proxy(this.blur,this)).on("keypress",e.proxy(this.keypress,this)).on("keyup",e.proxy(this.keyup,this)),this.eventSupported("keydown")&&this.$element.on("keydown",e.proxy(this.keydown,this)),this.$menu.on("click",e.proxy(this.click,this)).on("mouseenter","li",e.proxy(this.mouseenter,this)).on("mouseleave","li",e.proxy(this.mouseleave,this))},eventSupported:function(e){var t=e in this.$element;return t||(this.$element.setAttribute(e,"return;"),t=typeof this.$element[e]=="function"),t},move:function(e){if(!this.shown)return;switch(e.keyCode){case 9:case 13:case 27:e.preventDefault();break;case 38:e.preventDefault(),this.prev();break;case 40:e.preventDefault(),this.next()}e.stopPropagation()},keydown:function(t){this.suppressKeyPressRepeat=~e.inArray(t.keyCode,[40,38,9,13,27]),this.move(t)},keypress:function(e){if(this.suppressKeyPressRepeat)return;this.move(e)},keyup:function(e){switch(e.keyCode){case 40:case 38:case 16:case 17:case 18:break;case 9:case 13:if(!this.shown)return;this.select();break;case 27:if(!this.shown)return;this.hide();break;default:this.lookup()}e.stopPropagation(),e.preventDefault()},focus:function(e){this.focused=!0},blur:function(e){this.focused=!1,!this.mousedover&&this.shown&&this.hide()},click:function(e){e.stopPropagation(),e.preventDefault(),this.select(),this.$element.focus()},mouseenter:function(t){this.mousedover=!0,this.$menu.find(".active").removeClass("active"),e(t.currentTarget).addClass("active")},mouseleave:function(e){this.mousedover=!1,!this.focused&&this.shown&&this.hide()}};var n=e.fn.typeahead;e.fn.typeahead=function(n){return this.each(function(){var r=e(this),i=r.data("typeahead"),s=typeof n=="object"&&n;i||r.data("typeahead",i=new t(this,s)),typeof n=="string"&&i[n]()})},e.fn.typeahead.defaults={source:[],items:8,menu:'<ul class="typeahead dropdown-menu"></ul>',item:'<li><a href="#"></a></li>',minLength:1},e.fn.typeahead.Constructor=t,e.fn.typeahead.noConflict=function(){return e.fn.typeahead=n,this},e(document).on("focus.typeahead.data-api",'[data-provide="typeahead"]',function(t){var n=e(this);if(n.data("typeahead"))return;n.typeahead(n.data())})}(window.jQuery),!function(e){"use strict";var t=function(t,n){this.options=e.extend({},e.fn.affix.defaults,n),this.$window=e(window).on("scroll.affix.data-api",e.proxy(this.checkPosition,this)).on("click.affix.data-api",e.proxy(function(){setTimeout(e.proxy(this.checkPosition,this),1)},this)),this.$element=e(t),this.checkPosition()};t.prototype.checkPosition=function(){if(!this.$element.is(":visible"))return;var t=e(document).height(),n=this.$window.scrollTop(),r=this.$element.offset(),i=this.options.offset,s=i.bottom,o=i.top,u="affix affix-top affix-bottom",a;typeof i!="object"&&(s=o=i),typeof o=="function"&&(o=i.top()),typeof s=="function"&&(s=i.bottom()),a=this.unpin!=null&&n+this.unpin<=r.top?!1:s!=null&&r.top+this.$element.height()>=t-s?"bottom":o!=null&&n<=o?"top":!1;if(this.affixed===a)return;this.affixed=a,this.unpin=a=="bottom"?r.top-n:null,this.$element.removeClass(u).addClass("affix"+(a?"-"+a:""))};var n=e.fn.affix;e.fn.affix=function(n){return this.each(function(){var r=e(this),i=r.data("affix"),s=typeof n=="object"&&n;i||r.data("affix",i=new t(this,s)),typeof n=="string"&&i[n]()})},e.fn.affix.Constructor=t,e.fn.affix.defaults={offset:0},e.fn.affix.noConflict=function(){return e.fn.affix=n,this},e(window).on("load",function(){e('[data-spy="affix"]').each(function(){var t=e(this),n=t.data();n.offset=n.offset||{},n.offsetBottom&&(n.offset.bottom=n.offsetBottom),n.offsetTop&&(n.offset.top=n.offsetTop),t.affix(n)})})}(window.jQuery);
/**
 * @summary     DataTables
 * @description Paginate, search and sort HTML tables
 * @version     1.9.4
 * @file        jquery.dataTables.js
 * @author      Allan Jardine (www.sprymedia.co.uk)
 * @contact     www.sprymedia.co.uk/contact
 *
 * @copyright Copyright 2008-2012 Allan Jardine, all rights reserved.
 *
 * This source file is free software, under either the GPL v2 license or a
 * BSD style license, available at:
 *   http://datatables.net/license_gpl2
 *   http://datatables.net/license_bsd
 * 
 * This source file is distributed in the hope that it will be useful, but 
 * WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY 
 * or FITNESS FOR A PARTICULAR PURPOSE. See the license files for details.
 * 
 * For details please refer to: http://www.datatables.net
 */

/*jslint evil: true, undef: true, browser: true */
/*globals $, jQuery,define,_fnExternApiFunc,_fnInitialise,_fnInitComplete,_fnLanguageCompat,_fnAddColumn,_fnColumnOptions,_fnAddData,_fnCreateTr,_fnGatherData,_fnBuildHead,_fnDrawHead,_fnDraw,_fnReDraw,_fnAjaxUpdate,_fnAjaxParameters,_fnAjaxUpdateDraw,_fnServerParams,_fnAddOptionsHtml,_fnFeatureHtmlTable,_fnScrollDraw,_fnAdjustColumnSizing,_fnFeatureHtmlFilter,_fnFilterComplete,_fnFilterCustom,_fnFilterColumn,_fnFilter,_fnBuildSearchArray,_fnBuildSearchRow,_fnFilterCreateSearch,_fnDataToSearch,_fnSort,_fnSortAttachListener,_fnSortingClasses,_fnFeatureHtmlPaginate,_fnPageChange,_fnFeatureHtmlInfo,_fnUpdateInfo,_fnFeatureHtmlLength,_fnFeatureHtmlProcessing,_fnProcessingDisplay,_fnVisibleToColumnIndex,_fnColumnIndexToVisible,_fnNodeToDataIndex,_fnVisbleColumns,_fnCalculateEnd,_fnConvertToWidth,_fnCalculateColumnWidths,_fnScrollingWidthAdjust,_fnGetWidestNode,_fnGetMaxLenString,_fnStringToCss,_fnDetectType,_fnSettingsFromNode,_fnGetDataMaster,_fnGetTrNodes,_fnGetTdNodes,_fnEscapeRegex,_fnDeleteIndex,_fnReOrderIndex,_fnColumnOrdering,_fnLog,_fnClearTable,_fnSaveState,_fnLoadState,_fnCreateCookie,_fnReadCookie,_fnDetectHeader,_fnGetUniqueThs,_fnScrollBarWidth,_fnApplyToChildren,_fnMap,_fnGetRowData,_fnGetCellData,_fnSetCellData,_fnGetObjectDataFn,_fnSetObjectDataFn,_fnApplyColumnDefs,_fnBindAction,_fnCallbackReg,_fnCallbackFire,_fnJsonString,_fnRender,_fnNodeToColumnIndex,_fnInfoMacros,_fnBrowserDetect,_fnGetColumns*/

(/** @lends <global> */function( window, document, undefined ) {

(function( factory ) {
	"use strict";

	// Define as an AMD module if possible
	if ( typeof define === 'function' && define.amd )
	{
		define( ['jquery'], factory );
	}
	/* Define using browser globals otherwise
	 * Prevent multiple instantiations if the script is loaded twice
	 */
	else if ( jQuery && !jQuery.fn.dataTable )
	{
		factory( jQuery );
	}
}
(/** @lends <global> */function( $ ) {
	"use strict";
	/** 
	 * DataTables is a plug-in for the jQuery Javascript library. It is a 
	 * highly flexible tool, based upon the foundations of progressive 
	 * enhancement, which will add advanced interaction controls to any 
	 * HTML table. For a full list of features please refer to
	 * <a href="http://datatables.net">DataTables.net</a>.
	 *
	 * Note that the <i>DataTable</i> object is not a global variable but is
	 * aliased to <i>jQuery.fn.DataTable</i> and <i>jQuery.fn.dataTable</i> through which 
	 * it may be  accessed.
	 *
	 *  @class
	 *  @param {object} [oInit={}] Configuration object for DataTables. Options
	 *    are defined by {@link DataTable.defaults}
	 *  @requires jQuery 1.3+
	 * 
	 *  @example
	 *    // Basic initialisation
	 *    $(document).ready( function {
	 *      $('#example').dataTable();
	 *    } );
	 *  
	 *  @example
	 *    // Initialisation with configuration options - in this case, disable
	 *    // pagination and sorting.
	 *    $(document).ready( function {
	 *      $('#example').dataTable( {
	 *        "bPaginate": false,
	 *        "bSort": false 
	 *      } );
	 *    } );
	 */
	var DataTable = function( oInit )
	{
		
		
		/**
		 * Add a column to the list used for the table with default values
		 *  @param {object} oSettings dataTables settings object
		 *  @param {node} nTh The th element for this column
		 *  @memberof DataTable#oApi
		 */
		function _fnAddColumn( oSettings, nTh )
		{
			var oDefaults = DataTable.defaults.columns;
			var iCol = oSettings.aoColumns.length;
			var oCol = $.extend( {}, DataTable.models.oColumn, oDefaults, {
				"sSortingClass": oSettings.oClasses.sSortable,
				"sSortingClassJUI": oSettings.oClasses.sSortJUI,
				"nTh": nTh ? nTh : document.createElement('th'),
				"sTitle":    oDefaults.sTitle    ? oDefaults.sTitle    : nTh ? nTh.innerHTML : '',
				"aDataSort": oDefaults.aDataSort ? oDefaults.aDataSort : [iCol],
				"mData": oDefaults.mData ? oDefaults.oDefaults : iCol
			} );
			oSettings.aoColumns.push( oCol );
			
			/* Add a column specific filter */
			if ( oSettings.aoPreSearchCols[ iCol ] === undefined || oSettings.aoPreSearchCols[ iCol ] === null )
			{
				oSettings.aoPreSearchCols[ iCol ] = $.extend( {}, DataTable.models.oSearch );
			}
			else
			{
				var oPre = oSettings.aoPreSearchCols[ iCol ];
				
				/* Don't require that the user must specify bRegex, bSmart or bCaseInsensitive */
				if ( oPre.bRegex === undefined )
				{
					oPre.bRegex = true;
				}
				
				if ( oPre.bSmart === undefined )
				{
					oPre.bSmart = true;
				}
				
				if ( oPre.bCaseInsensitive === undefined )
				{
					oPre.bCaseInsensitive = true;
				}
			}
			
			/* Use the column options function to initialise classes etc */
			_fnColumnOptions( oSettings, iCol, null );
		}
		
		
		/**
		 * Apply options for a column
		 *  @param {object} oSettings dataTables settings object
		 *  @param {int} iCol column index to consider
		 *  @param {object} oOptions object with sType, bVisible and bSearchable etc
		 *  @memberof DataTable#oApi
		 */
		function _fnColumnOptions( oSettings, iCol, oOptions )
		{
			var oCol = oSettings.aoColumns[ iCol ];
			
			/* User specified column options */
			if ( oOptions !== undefined && oOptions !== null )
			{
				/* Backwards compatibility for mDataProp */
				if ( oOptions.mDataProp && !oOptions.mData )
				{
					oOptions.mData = oOptions.mDataProp;
				}
		
				if ( oOptions.sType !== undefined )
				{
					oCol.sType = oOptions.sType;
					oCol._bAutoType = false;
				}
				
				$.extend( oCol, oOptions );
				_fnMap( oCol, oOptions, "sWidth", "sWidthOrig" );
		
				/* iDataSort to be applied (backwards compatibility), but aDataSort will take
				 * priority if defined
				 */
				if ( oOptions.iDataSort !== undefined )
				{
					oCol.aDataSort = [ oOptions.iDataSort ];
				}
				_fnMap( oCol, oOptions, "aDataSort" );
			}
		
			/* Cache the data get and set functions for speed */
			var mRender = oCol.mRender ? _fnGetObjectDataFn( oCol.mRender ) : null;
			var mData = _fnGetObjectDataFn( oCol.mData );
		
			oCol.fnGetData = function (oData, sSpecific) {
				var innerData = mData( oData, sSpecific );
		
				if ( oCol.mRender && (sSpecific && sSpecific !== '') )
				{
					return mRender( innerData, sSpecific, oData );
				}
				return innerData;
			};
			oCol.fnSetData = _fnSetObjectDataFn( oCol.mData );
			
			/* Feature sorting overrides column specific when off */
			if ( !oSettings.oFeatures.bSort )
			{
				oCol.bSortable = false;
			}
			
			/* Check that the class assignment is correct for sorting */
			if ( !oCol.bSortable ||
				 ($.inArray('asc', oCol.asSorting) == -1 && $.inArray('desc', oCol.asSorting) == -1) )
			{
				oCol.sSortingClass = oSettings.oClasses.sSortableNone;
				oCol.sSortingClassJUI = "";
			}
			else if ( $.inArray('asc', oCol.asSorting) == -1 && $.inArray('desc', oCol.asSorting) == -1 )
			{
				oCol.sSortingClass = oSettings.oClasses.sSortable;
				oCol.sSortingClassJUI = oSettings.oClasses.sSortJUI;
			}
			else if ( $.inArray('asc', oCol.asSorting) != -1 && $.inArray('desc', oCol.asSorting) == -1 )
			{
				oCol.sSortingClass = oSettings.oClasses.sSortableAsc;
				oCol.sSortingClassJUI = oSettings.oClasses.sSortJUIAscAllowed;
			}
			else if ( $.inArray('asc', oCol.asSorting) == -1 && $.inArray('desc', oCol.asSorting) != -1 )
			{
				oCol.sSortingClass = oSettings.oClasses.sSortableDesc;
				oCol.sSortingClassJUI = oSettings.oClasses.sSortJUIDescAllowed;
			}
		}
		
		
		/**
		 * Adjust the table column widths for new data. Note: you would probably want to 
		 * do a redraw after calling this function!
		 *  @param {object} oSettings dataTables settings object
		 *  @memberof DataTable#oApi
		 */
		function _fnAdjustColumnSizing ( oSettings )
		{
			/* Not interested in doing column width calculation if auto-width is disabled */
			if ( oSettings.oFeatures.bAutoWidth === false )
			{
				return false;
			}
			
			_fnCalculateColumnWidths( oSettings );
			for ( var i=0 , iLen=oSettings.aoColumns.length ; i<iLen ; i++ )
			{
				oSettings.aoColumns[i].nTh.style.width = oSettings.aoColumns[i].sWidth;
			}
		}
		
		
		/**
		 * Covert the index of a visible column to the index in the data array (take account
		 * of hidden columns)
		 *  @param {object} oSettings dataTables settings object
		 *  @param {int} iMatch Visible column index to lookup
		 *  @returns {int} i the data index
		 *  @memberof DataTable#oApi
		 */
		function _fnVisibleToColumnIndex( oSettings, iMatch )
		{
			var aiVis = _fnGetColumns( oSettings, 'bVisible' );
		
			return typeof aiVis[iMatch] === 'number' ?
				aiVis[iMatch] :
				null;
		}
		
		
		/**
		 * Covert the index of an index in the data array and convert it to the visible
		 *   column index (take account of hidden columns)
		 *  @param {int} iMatch Column index to lookup
		 *  @param {object} oSettings dataTables settings object
		 *  @returns {int} i the data index
		 *  @memberof DataTable#oApi
		 */
		function _fnColumnIndexToVisible( oSettings, iMatch )
		{
			var aiVis = _fnGetColumns( oSettings, 'bVisible' );
			var iPos = $.inArray( iMatch, aiVis );
		
			return iPos !== -1 ? iPos : null;
		}
		
		
		/**
		 * Get the number of visible columns
		 *  @param {object} oSettings dataTables settings object
		 *  @returns {int} i the number of visible columns
		 *  @memberof DataTable#oApi
		 */
		function _fnVisbleColumns( oSettings )
		{
			return _fnGetColumns( oSettings, 'bVisible' ).length;
		}
		
		
		/**
		 * Get an array of column indexes that match a given property
		 *  @param {object} oSettings dataTables settings object
		 *  @param {string} sParam Parameter in aoColumns to look for - typically 
		 *    bVisible or bSearchable
		 *  @returns {array} Array of indexes with matched properties
		 *  @memberof DataTable#oApi
		 */
		function _fnGetColumns( oSettings, sParam )
		{
			var a = [];
		
			$.map( oSettings.aoColumns, function(val, i) {
				if ( val[sParam] ) {
					a.push( i );
				}
			} );
		
			return a;
		}
		
		
		/**
		 * Get the sort type based on an input string
		 *  @param {string} sData data we wish to know the type of
		 *  @returns {string} type (defaults to 'string' if no type can be detected)
		 *  @memberof DataTable#oApi
		 */
		function _fnDetectType( sData )
		{
			var aTypes = DataTable.ext.aTypes;
			var iLen = aTypes.length;
			
			for ( var i=0 ; i<iLen ; i++ )
			{
				var sType = aTypes[i]( sData );
				if ( sType !== null )
				{
					return sType;
				}
			}
			
			return 'string';
		}
		
		
		/**
		 * Figure out how to reorder a display list
		 *  @param {object} oSettings dataTables settings object
		 *  @returns array {int} aiReturn index list for reordering
		 *  @memberof DataTable#oApi
		 */
		function _fnReOrderIndex ( oSettings, sColumns )
		{
			var aColumns = sColumns.split(',');
			var aiReturn = [];
			
			for ( var i=0, iLen=oSettings.aoColumns.length ; i<iLen ; i++ )
			{
				for ( var j=0 ; j<iLen ; j++ )
				{
					if ( oSettings.aoColumns[i].sName == aColumns[j] )
					{
						aiReturn.push( j );
						break;
					}
				}
			}
			
			return aiReturn;
		}
		
		
		/**
		 * Get the column ordering that DataTables expects
		 *  @param {object} oSettings dataTables settings object
		 *  @returns {string} comma separated list of names
		 *  @memberof DataTable#oApi
		 */
		function _fnColumnOrdering ( oSettings )
		{
			var sNames = '';
			for ( var i=0, iLen=oSettings.aoColumns.length ; i<iLen ; i++ )
			{
				sNames += oSettings.aoColumns[i].sName+',';
			}
			if ( sNames.length == iLen )
			{
				return "";
			}
			return sNames.slice(0, -1);
		}
		
		
		/**
		 * Take the column definitions and static columns arrays and calculate how
		 * they relate to column indexes. The callback function will then apply the
		 * definition found for a column to a suitable configuration object.
		 *  @param {object} oSettings dataTables settings object
		 *  @param {array} aoColDefs The aoColumnDefs array that is to be applied
		 *  @param {array} aoCols The aoColumns array that defines columns individually
		 *  @param {function} fn Callback function - takes two parameters, the calculated
		 *    column index and the definition for that column.
		 *  @memberof DataTable#oApi
		 */
		function _fnApplyColumnDefs( oSettings, aoColDefs, aoCols, fn )
		{
			var i, iLen, j, jLen, k, kLen;
		
			// Column definitions with aTargets
			if ( aoColDefs )
			{
				/* Loop over the definitions array - loop in reverse so first instance has priority */
				for ( i=aoColDefs.length-1 ; i>=0 ; i-- )
				{
					/* Each definition can target multiple columns, as it is an array */
					var aTargets = aoColDefs[i].aTargets;
					if ( !$.isArray( aTargets ) )
					{
						_fnLog( oSettings, 1, 'aTargets must be an array of targets, not a '+(typeof aTargets) );
					}
		
					for ( j=0, jLen=aTargets.length ; j<jLen ; j++ )
					{
						if ( typeof aTargets[j] === 'number' && aTargets[j] >= 0 )
						{
							/* Add columns that we don't yet know about */
							while( oSettings.aoColumns.length <= aTargets[j] )
							{
								_fnAddColumn( oSettings );
							}
		
							/* Integer, basic index */
							fn( aTargets[j], aoColDefs[i] );
						}
						else if ( typeof aTargets[j] === 'number' && aTargets[j] < 0 )
						{
							/* Negative integer, right to left column counting */
							fn( oSettings.aoColumns.length+aTargets[j], aoColDefs[i] );
						}
						else if ( typeof aTargets[j] === 'string' )
						{
							/* Class name matching on TH element */
							for ( k=0, kLen=oSettings.aoColumns.length ; k<kLen ; k++ )
							{
								if ( aTargets[j] == "_all" ||
								     $(oSettings.aoColumns[k].nTh).hasClass( aTargets[j] ) )
								{
									fn( k, aoColDefs[i] );
								}
							}
						}
					}
				}
			}
		
			// Statically defined columns array
			if ( aoCols )
			{
				for ( i=0, iLen=aoCols.length ; i<iLen ; i++ )
				{
					fn( i, aoCols[i] );
				}
			}
		}
		
		/**
		 * Add a data array to the table, creating DOM node etc. This is the parallel to 
		 * _fnGatherData, but for adding rows from a Javascript source, rather than a
		 * DOM source.
		 *  @param {object} oSettings dataTables settings object
		 *  @param {array} aData data array to be added
		 *  @returns {int} >=0 if successful (index of new aoData entry), -1 if failed
		 *  @memberof DataTable#oApi
		 */
		function _fnAddData ( oSettings, aDataSupplied )
		{
			var oCol;
			
			/* Take an independent copy of the data source so we can bash it about as we wish */
			var aDataIn = ($.isArray(aDataSupplied)) ?
				aDataSupplied.slice() :
				$.extend( true, {}, aDataSupplied );
			
			/* Create the object for storing information about this new row */
			var iRow = oSettings.aoData.length;
			var oData = $.extend( true, {}, DataTable.models.oRow );
			oData._aData = aDataIn;
			oSettings.aoData.push( oData );
		
			/* Create the cells */
			var nTd, sThisType;
			for ( var i=0, iLen=oSettings.aoColumns.length ; i<iLen ; i++ )
			{
				oCol = oSettings.aoColumns[i];
		
				/* Use rendered data for filtering / sorting */
				if ( typeof oCol.fnRender === 'function' && oCol.bUseRendered && oCol.mData !== null )
				{
					_fnSetCellData( oSettings, iRow, i, _fnRender(oSettings, iRow, i) );
				}
				else
				{
					_fnSetCellData( oSettings, iRow, i, _fnGetCellData( oSettings, iRow, i ) );
				}
				
				/* See if we should auto-detect the column type */
				if ( oCol._bAutoType && oCol.sType != 'string' )
				{
					/* Attempt to auto detect the type - same as _fnGatherData() */
					var sVarType = _fnGetCellData( oSettings, iRow, i, 'type' );
					if ( sVarType !== null && sVarType !== '' )
					{
						sThisType = _fnDetectType( sVarType );
						if ( oCol.sType === null )
						{
							oCol.sType = sThisType;
						}
						else if ( oCol.sType != sThisType && oCol.sType != "html" )
						{
							/* String is always the 'fallback' option */
							oCol.sType = 'string';
						}
					}
				}
			}
			
			/* Add to the display array */
			oSettings.aiDisplayMaster.push( iRow );
		
			/* Create the DOM information */
			if ( !oSettings.oFeatures.bDeferRender )
			{
				_fnCreateTr( oSettings, iRow );
			}
		
			return iRow;
		}
		
		
		/**
		 * Read in the data from the target table from the DOM
		 *  @param {object} oSettings dataTables settings object
		 *  @memberof DataTable#oApi
		 */
		function _fnGatherData( oSettings )
		{
			var iLoop, i, iLen, j, jLen, jInner,
			 	nTds, nTrs, nTd, nTr, aLocalData, iThisIndex,
				iRow, iRows, iColumn, iColumns, sNodeName,
				oCol, oData;
			
			/*
			 * Process by row first
			 * Add the data object for the whole table - storing the tr node. Note - no point in getting
			 * DOM based data if we are going to go and replace it with Ajax source data.
			 */
			if ( oSettings.bDeferLoading || oSettings.sAjaxSource === null )
			{
				nTr = oSettings.nTBody.firstChild;
				while ( nTr )
				{
					if ( nTr.nodeName.toUpperCase() == "TR" )
					{
						iThisIndex = oSettings.aoData.length;
						nTr._DT_RowIndex = iThisIndex;
						oSettings.aoData.push( $.extend( true, {}, DataTable.models.oRow, {
							"nTr": nTr
						} ) );
		
						oSettings.aiDisplayMaster.push( iThisIndex );
						nTd = nTr.firstChild;
						jInner = 0;
						while ( nTd )
						{
							sNodeName = nTd.nodeName.toUpperCase();
							if ( sNodeName == "TD" || sNodeName == "TH" )
							{
								_fnSetCellData( oSettings, iThisIndex, jInner, $.trim(nTd.innerHTML) );
								jInner++;
							}
							nTd = nTd.nextSibling;
						}
					}
					nTr = nTr.nextSibling;
				}
			}
			
			/* Gather in the TD elements of the Table - note that this is basically the same as
			 * fnGetTdNodes, but that function takes account of hidden columns, which we haven't yet
			 * setup!
			 */
			nTrs = _fnGetTrNodes( oSettings );
			nTds = [];
			for ( i=0, iLen=nTrs.length ; i<iLen ; i++ )
			{
				nTd = nTrs[i].firstChild;
				while ( nTd )
				{
					sNodeName = nTd.nodeName.toUpperCase();
					if ( sNodeName == "TD" || sNodeName == "TH" )
					{
						nTds.push( nTd );
					}
					nTd = nTd.nextSibling;
				}
			}
			
			/* Now process by column */
			for ( iColumn=0, iColumns=oSettings.aoColumns.length ; iColumn<iColumns ; iColumn++ )
			{
				oCol = oSettings.aoColumns[iColumn];
		
				/* Get the title of the column - unless there is a user set one */
				if ( oCol.sTitle === null )
				{
					oCol.sTitle = oCol.nTh.innerHTML;
				}
				
				var
					bAutoType = oCol._bAutoType,
					bRender = typeof oCol.fnRender === 'function',
					bClass = oCol.sClass !== null,
					bVisible = oCol.bVisible,
					nCell, sThisType, sRendered, sValType;
				
				/* A single loop to rule them all (and be more efficient) */
				if ( bAutoType || bRender || bClass || !bVisible )
				{
					for ( iRow=0, iRows=oSettings.aoData.length ; iRow<iRows ; iRow++ )
					{
						oData = oSettings.aoData[iRow];
						nCell = nTds[ (iRow*iColumns) + iColumn ];
						
						/* Type detection */
						if ( bAutoType && oCol.sType != 'string' )
						{
							sValType = _fnGetCellData( oSettings, iRow, iColumn, 'type' );
							if ( sValType !== '' )
							{
								sThisType = _fnDetectType( sValType );
								if ( oCol.sType === null )
								{
									oCol.sType = sThisType;
								}
								else if ( oCol.sType != sThisType && 
								          oCol.sType != "html" )
								{
									/* String is always the 'fallback' option */
									oCol.sType = 'string';
								}
							}
						}
		
						if ( oCol.mRender )
						{
							// mRender has been defined, so we need to get the value and set it
							nCell.innerHTML = _fnGetCellData( oSettings, iRow, iColumn, 'display' );
						}
						else if ( oCol.mData !== iColumn )
						{
							// If mData is not the same as the column number, then we need to
							// get the dev set value. If it is the column, no point in wasting
							// time setting the value that is already there!
							nCell.innerHTML = _fnGetCellData( oSettings, iRow, iColumn, 'display' );
						}
						
						/* Rendering */
						if ( bRender )
						{
							sRendered = _fnRender( oSettings, iRow, iColumn );
							nCell.innerHTML = sRendered;
							if ( oCol.bUseRendered )
							{
								/* Use the rendered data for filtering / sorting */
								_fnSetCellData( oSettings, iRow, iColumn, sRendered );
							}
						}
						
						/* Classes */
						if ( bClass )
						{
							nCell.className += ' '+oCol.sClass;
						}
						
						/* Column visibility */
						if ( !bVisible )
						{
							oData._anHidden[iColumn] = nCell;
							nCell.parentNode.removeChild( nCell );
						}
						else
						{
							oData._anHidden[iColumn] = null;
						}
		
						if ( oCol.fnCreatedCell )
						{
							oCol.fnCreatedCell.call( oSettings.oInstance,
								nCell, _fnGetCellData( oSettings, iRow, iColumn, 'display' ), oData._aData, iRow, iColumn
							);
						}
					}
				}
			}
		
			/* Row created callbacks */
			if ( oSettings.aoRowCreatedCallback.length !== 0 )
			{
				for ( i=0, iLen=oSettings.aoData.length ; i<iLen ; i++ )
				{
					oData = oSettings.aoData[i];
					_fnCallbackFire( oSettings, 'aoRowCreatedCallback', null, [oData.nTr, oData._aData, i] );
				}
			}
		}
		
		
		/**
		 * Take a TR element and convert it to an index in aoData
		 *  @param {object} oSettings dataTables settings object
		 *  @param {node} n the TR element to find
		 *  @returns {int} index if the node is found, null if not
		 *  @memberof DataTable#oApi
		 */
		function _fnNodeToDataIndex( oSettings, n )
		{
			return (n._DT_RowIndex!==undefined) ? n._DT_RowIndex : null;
		}
		
		
		/**
		 * Take a TD element and convert it into a column data index (not the visible index)
		 *  @param {object} oSettings dataTables settings object
		 *  @param {int} iRow The row number the TD/TH can be found in
		 *  @param {node} n The TD/TH element to find
		 *  @returns {int} index if the node is found, -1 if not
		 *  @memberof DataTable#oApi
		 */
		function _fnNodeToColumnIndex( oSettings, iRow, n )
		{
			var anCells = _fnGetTdNodes( oSettings, iRow );
		
			for ( var i=0, iLen=oSettings.aoColumns.length ; i<iLen ; i++ )
			{
				if ( anCells[i] === n )
				{
					return i;
				}
			}
			return -1;
		}
		
		
		/**
		 * Get an array of data for a given row from the internal data cache
		 *  @param {object} oSettings dataTables settings object
		 *  @param {int} iRow aoData row id
		 *  @param {string} sSpecific data get type ('type' 'filter' 'sort')
		 *  @param {array} aiColumns Array of column indexes to get data from
		 *  @returns {array} Data array
		 *  @memberof DataTable#oApi
		 */
		function _fnGetRowData( oSettings, iRow, sSpecific, aiColumns )
		{
			var out = [];
			for ( var i=0, iLen=aiColumns.length ; i<iLen ; i++ )
			{
				out.push( _fnGetCellData( oSettings, iRow, aiColumns[i], sSpecific ) );
			}
			return out;
		}
		
		
		/**
		 * Get the data for a given cell from the internal cache, taking into account data mapping
		 *  @param {object} oSettings dataTables settings object
		 *  @param {int} iRow aoData row id
		 *  @param {int} iCol Column index
		 *  @param {string} sSpecific data get type ('display', 'type' 'filter' 'sort')
		 *  @returns {*} Cell data
		 *  @memberof DataTable#oApi
		 */
		function _fnGetCellData( oSettings, iRow, iCol, sSpecific )
		{
			var sData;
			var oCol = oSettings.aoColumns[iCol];
			var oData = oSettings.aoData[iRow]._aData;
		
			if ( (sData=oCol.fnGetData( oData, sSpecific )) === undefined )
			{
				if ( oSettings.iDrawError != oSettings.iDraw && oCol.sDefaultContent === null )
				{
					_fnLog( oSettings, 0, "Requested unknown parameter "+
						(typeof oCol.mData=='function' ? '{mData function}' : "'"+oCol.mData+"'")+
						" from the data source for row "+iRow );
					oSettings.iDrawError = oSettings.iDraw;
				}
				return oCol.sDefaultContent;
			}
		
			/* When the data source is null, we can use default column data */
			if ( sData === null && oCol.sDefaultContent !== null )
			{
				sData = oCol.sDefaultContent;
			}
			else if ( typeof sData === 'function' )
			{
				/* If the data source is a function, then we run it and use the return */
				return sData();
			}
		
			if ( sSpecific == 'display' && sData === null )
			{
				return '';
			}
			return sData;
		}
		
		
		/**
		 * Set the value for a specific cell, into the internal data cache
		 *  @param {object} oSettings dataTables settings object
		 *  @param {int} iRow aoData row id
		 *  @param {int} iCol Column index
		 *  @param {*} val Value to set
		 *  @memberof DataTable#oApi
		 */
		function _fnSetCellData( oSettings, iRow, iCol, val )
		{
			var oCol = oSettings.aoColumns[iCol];
			var oData = oSettings.aoData[iRow]._aData;
		
			oCol.fnSetData( oData, val );
		}
		
		
		// Private variable that is used to match array syntax in the data property object
		var __reArray = /\[.*?\]$/;
		
		/**
		 * Return a function that can be used to get data from a source object, taking
		 * into account the ability to use nested objects as a source
		 *  @param {string|int|function} mSource The data source for the object
		 *  @returns {function} Data get function
		 *  @memberof DataTable#oApi
		 */
		function _fnGetObjectDataFn( mSource )
		{
			if ( mSource === null )
			{
				/* Give an empty string for rendering / sorting etc */
				return function (data, type) {
					return null;
				};
			}
			else if ( typeof mSource === 'function' )
			{
				return function (data, type, extra) {
					return mSource( data, type, extra );
				};
			}
			else if ( typeof mSource === 'string' && (mSource.indexOf('.') !== -1 || mSource.indexOf('[') !== -1) )
			{
				/* If there is a . in the source string then the data source is in a 
				 * nested object so we loop over the data for each level to get the next
				 * level down. On each loop we test for undefined, and if found immediately
				 * return. This allows entire objects to be missing and sDefaultContent to
				 * be used if defined, rather than throwing an error
				 */
				var fetchData = function (data, type, src) {
					var a = src.split('.');
					var arrayNotation, out, innerSrc;
		
					if ( src !== "" )
					{
						for ( var i=0, iLen=a.length ; i<iLen ; i++ )
						{
							// Check if we are dealing with an array notation request
							arrayNotation = a[i].match(__reArray);
		
							if ( arrayNotation ) {
								a[i] = a[i].replace(__reArray, '');
		
								// Condition allows simply [] to be passed in
								if ( a[i] !== "" ) {
									data = data[ a[i] ];
								}
								out = [];
								
								// Get the remainder of the nested object to get
								a.splice( 0, i+1 );
								innerSrc = a.join('.');
		
								// Traverse each entry in the array getting the properties requested
								for ( var j=0, jLen=data.length ; j<jLen ; j++ ) {
									out.push( fetchData( data[j], type, innerSrc ) );
								}
		
								// If a string is given in between the array notation indicators, that
								// is used to join the strings together, otherwise an array is returned
								var join = arrayNotation[0].substring(1, arrayNotation[0].length-1);
								data = (join==="") ? out : out.join(join);
		
								// The inner call to fetchData has already traversed through the remainder
								// of the source requested, so we exit from the loop
								break;
							}
		
							if ( data === null || data[ a[i] ] === undefined )
							{
								return undefined;
							}
							data = data[ a[i] ];
						}
					}
		
					return data;
				};
		
				return function (data, type) {
					return fetchData( data, type, mSource );
				};
			}
			else
			{
				/* Array or flat object mapping */
				return function (data, type) {
					return data[mSource];	
				};
			}
		}
		
		
		/**
		 * Return a function that can be used to set data from a source object, taking
		 * into account the ability to use nested objects as a source
		 *  @param {string|int|function} mSource The data source for the object
		 *  @returns {function} Data set function
		 *  @memberof DataTable#oApi
		 */
		function _fnSetObjectDataFn( mSource )
		{
			if ( mSource === null )
			{
				/* Nothing to do when the data source is null */
				return function (data, val) {};
			}
			else if ( typeof mSource === 'function' )
			{
				return function (data, val) {
					mSource( data, 'set', val );
				};
			}
			else if ( typeof mSource === 'string' && (mSource.indexOf('.') !== -1 || mSource.indexOf('[') !== -1) )
			{
				/* Like the get, we need to get data from a nested object */
				var setData = function (data, val, src) {
					var a = src.split('.'), b;
					var arrayNotation, o, innerSrc;
		
					for ( var i=0, iLen=a.length-1 ; i<iLen ; i++ )
					{
						// Check if we are dealing with an array notation request
						arrayNotation = a[i].match(__reArray);
		
						if ( arrayNotation )
						{
							a[i] = a[i].replace(__reArray, '');
							data[ a[i] ] = [];
							
							// Get the remainder of the nested object to set so we can recurse
							b = a.slice();
							b.splice( 0, i+1 );
							innerSrc = b.join('.');
		
							// Traverse each entry in the array setting the properties requested
							for ( var j=0, jLen=val.length ; j<jLen ; j++ )
							{
								o = {};
								setData( o, val[j], innerSrc );
								data[ a[i] ].push( o );
							}
		
							// The inner call to setData has already traversed through the remainder
							// of the source and has set the data, thus we can exit here
							return;
						}
		
						// If the nested object doesn't currently exist - since we are
						// trying to set the value - create it
						if ( data[ a[i] ] === null || data[ a[i] ] === undefined )
						{
							data[ a[i] ] = {};
						}
						data = data[ a[i] ];
					}
		
					// If array notation is used, we just want to strip it and use the property name
					// and assign the value. If it isn't used, then we get the result we want anyway
					data[ a[a.length-1].replace(__reArray, '') ] = val;
				};
		
				return function (data, val) {
					return setData( data, val, mSource );
				};
			}
			else
			{
				/* Array or flat object mapping */
				return function (data, val) {
					data[mSource] = val;	
				};
			}
		}
		
		
		/**
		 * Return an array with the full table data
		 *  @param {object} oSettings dataTables settings object
		 *  @returns array {array} aData Master data array
		 *  @memberof DataTable#oApi
		 */
		function _fnGetDataMaster ( oSettings )
		{
			var aData = [];
			var iLen = oSettings.aoData.length;
			for ( var i=0 ; i<iLen; i++ )
			{
				aData.push( oSettings.aoData[i]._aData );
			}
			return aData;
		}
		
		
		/**
		 * Nuke the table
		 *  @param {object} oSettings dataTables settings object
		 *  @memberof DataTable#oApi
		 */
		function _fnClearTable( oSettings )
		{
			oSettings.aoData.splice( 0, oSettings.aoData.length );
			oSettings.aiDisplayMaster.splice( 0, oSettings.aiDisplayMaster.length );
			oSettings.aiDisplay.splice( 0, oSettings.aiDisplay.length );
			_fnCalculateEnd( oSettings );
		}
		
		
		 /**
		 * Take an array of integers (index array) and remove a target integer (value - not 
		 * the key!)
		 *  @param {array} a Index array to target
		 *  @param {int} iTarget value to find
		 *  @memberof DataTable#oApi
		 */
		function _fnDeleteIndex( a, iTarget )
		{
			var iTargetIndex = -1;
			
			for ( var i=0, iLen=a.length ; i<iLen ; i++ )
			{
				if ( a[i] == iTarget )
				{
					iTargetIndex = i;
				}
				else if ( a[i] > iTarget )
				{
					a[i]--;
				}
			}
			
			if ( iTargetIndex != -1 )
			{
				a.splice( iTargetIndex, 1 );
			}
		}
		
		
		 /**
		 * Call the developer defined fnRender function for a given cell (row/column) with
		 * the required parameters and return the result.
		 *  @param {object} oSettings dataTables settings object
		 *  @param {int} iRow aoData index for the row
		 *  @param {int} iCol aoColumns index for the column
		 *  @returns {*} Return of the developer's fnRender function
		 *  @memberof DataTable#oApi
		 */
		function _fnRender( oSettings, iRow, iCol )
		{
			var oCol = oSettings.aoColumns[iCol];
		
			return oCol.fnRender( {
				"iDataRow":    iRow,
				"iDataColumn": iCol,
				"oSettings":   oSettings,
				"aData":       oSettings.aoData[iRow]._aData,
				"mDataProp":   oCol.mData
			}, _fnGetCellData(oSettings, iRow, iCol, 'display') );
		}
		/**
		 * Create a new TR element (and it's TD children) for a row
		 *  @param {object} oSettings dataTables settings object
		 *  @param {int} iRow Row to consider
		 *  @memberof DataTable#oApi
		 */
		function _fnCreateTr ( oSettings, iRow )
		{
			var oData = oSettings.aoData[iRow];
			var nTd;
		
			if ( oData.nTr === null )
			{
				oData.nTr = document.createElement('tr');
		
				/* Use a private property on the node to allow reserve mapping from the node
				 * to the aoData array for fast look up
				 */
				oData.nTr._DT_RowIndex = iRow;
		
				/* Special parameters can be given by the data source to be used on the row */
				if ( oData._aData.DT_RowId )
				{
					oData.nTr.id = oData._aData.DT_RowId;
				}
		
				if ( oData._aData.DT_RowClass )
				{
					oData.nTr.className = oData._aData.DT_RowClass;
				}
		
				/* Process each column */
				for ( var i=0, iLen=oSettings.aoColumns.length ; i<iLen ; i++ )
				{
					var oCol = oSettings.aoColumns[i];
					nTd = document.createElement( oCol.sCellType );
		
					/* Render if needed - if bUseRendered is true then we already have the rendered
					 * value in the data source - so can just use that
					 */
					nTd.innerHTML = (typeof oCol.fnRender === 'function' && (!oCol.bUseRendered || oCol.mData === null)) ?
						_fnRender( oSettings, iRow, i ) :
						_fnGetCellData( oSettings, iRow, i, 'display' );
				
					/* Add user defined class */
					if ( oCol.sClass !== null )
					{
						nTd.className = oCol.sClass;
					}
					
					if ( oCol.bVisible )
					{
						oData.nTr.appendChild( nTd );
						oData._anHidden[i] = null;
					}
					else
					{
						oData._anHidden[i] = nTd;
					}
		
					if ( oCol.fnCreatedCell )
					{
						oCol.fnCreatedCell.call( oSettings.oInstance,
							nTd, _fnGetCellData( oSettings, iRow, i, 'display' ), oData._aData, iRow, i
						);
					}
				}
		
				_fnCallbackFire( oSettings, 'aoRowCreatedCallback', null, [oData.nTr, oData._aData, iRow] );
			}
		}
		
		
		/**
		 * Create the HTML header for the table
		 *  @param {object} oSettings dataTables settings object
		 *  @memberof DataTable#oApi
		 */
		function _fnBuildHead( oSettings )
		{
			var i, nTh, iLen, j, jLen;
			var iThs = $('th, td', oSettings.nTHead).length;
			var iCorrector = 0;
			var jqChildren;
			
			/* If there is a header in place - then use it - otherwise it's going to get nuked... */
			if ( iThs !== 0 )
			{
				/* We've got a thead from the DOM, so remove hidden columns and apply width to vis cols */
				for ( i=0, iLen=oSettings.aoColumns.length ; i<iLen ; i++ )
				{
					nTh = oSettings.aoColumns[i].nTh;
					nTh.setAttribute('role', 'columnheader');
					if ( oSettings.aoColumns[i].bSortable )
					{
						nTh.setAttribute('tabindex', oSettings.iTabIndex);
						nTh.setAttribute('aria-controls', oSettings.sTableId);
					}
		
					if ( oSettings.aoColumns[i].sClass !== null )
					{
						$(nTh).addClass( oSettings.aoColumns[i].sClass );
					}
					
					/* Set the title of the column if it is user defined (not what was auto detected) */
					if ( oSettings.aoColumns[i].sTitle != nTh.innerHTML )
					{
						nTh.innerHTML = oSettings.aoColumns[i].sTitle;
					}
				}
			}
			else
			{
				/* We don't have a header in the DOM - so we are going to have to create one */
				var nTr = document.createElement( "tr" );
				
				for ( i=0, iLen=oSettings.aoColumns.length ; i<iLen ; i++ )
				{
					nTh = oSettings.aoColumns[i].nTh;
					nTh.innerHTML = oSettings.aoColumns[i].sTitle;
					nTh.setAttribute('tabindex', '0');
					
					if ( oSettings.aoColumns[i].sClass !== null )
					{
						$(nTh).addClass( oSettings.aoColumns[i].sClass );
					}
					
					nTr.appendChild( nTh );
				}
				$(oSettings.nTHead).html( '' )[0].appendChild( nTr );
				_fnDetectHeader( oSettings.aoHeader, oSettings.nTHead );
			}
			
			/* ARIA role for the rows */	
			$(oSettings.nTHead).children('tr').attr('role', 'row');
			
			/* Add the extra markup needed by jQuery UI's themes */
			if ( oSettings.bJUI )
			{
				for ( i=0, iLen=oSettings.aoColumns.length ; i<iLen ; i++ )
				{
					nTh = oSettings.aoColumns[i].nTh;
					
					var nDiv = document.createElement('div');
					nDiv.className = oSettings.oClasses.sSortJUIWrapper;
					$(nTh).contents().appendTo(nDiv);
					
					var nSpan = document.createElement('span');
					nSpan.className = oSettings.oClasses.sSortIcon;
					nDiv.appendChild( nSpan );
					nTh.appendChild( nDiv );
				}
			}
			
			if ( oSettings.oFeatures.bSort )
			{
				for ( i=0 ; i<oSettings.aoColumns.length ; i++ )
				{
					if ( oSettings.aoColumns[i].bSortable !== false )
					{
						_fnSortAttachListener( oSettings, oSettings.aoColumns[i].nTh, i );
					}
					else
					{
						$(oSettings.aoColumns[i].nTh).addClass( oSettings.oClasses.sSortableNone );
					}
				}
			}
			
			/* Deal with the footer - add classes if required */
			if ( oSettings.oClasses.sFooterTH !== "" )
			{
				$(oSettings.nTFoot).children('tr').children('th').addClass( oSettings.oClasses.sFooterTH );
			}
			
			/* Cache the footer elements */
			if ( oSettings.nTFoot !== null )
			{
				var anCells = _fnGetUniqueThs( oSettings, null, oSettings.aoFooter );
				for ( i=0, iLen=oSettings.aoColumns.length ; i<iLen ; i++ )
				{
					if ( anCells[i] )
					{
						oSettings.aoColumns[i].nTf = anCells[i];
						if ( oSettings.aoColumns[i].sClass )
						{
							$(anCells[i]).addClass( oSettings.aoColumns[i].sClass );
						}
					}
				}
			}
		}
		
		
		/**
		 * Draw the header (or footer) element based on the column visibility states. The
		 * methodology here is to use the layout array from _fnDetectHeader, modified for
		 * the instantaneous column visibility, to construct the new layout. The grid is
		 * traversed over cell at a time in a rows x columns grid fashion, although each 
		 * cell insert can cover multiple elements in the grid - which is tracks using the
		 * aApplied array. Cell inserts in the grid will only occur where there isn't
		 * already a cell in that position.
		 *  @param {object} oSettings dataTables settings object
		 *  @param array {objects} aoSource Layout array from _fnDetectHeader
		 *  @param {boolean} [bIncludeHidden=false] If true then include the hidden columns in the calc, 
		 *  @memberof DataTable#oApi
		 */
		function _fnDrawHead( oSettings, aoSource, bIncludeHidden )
		{
			var i, iLen, j, jLen, k, kLen, n, nLocalTr;
			var aoLocal = [];
			var aApplied = [];
			var iColumns = oSettings.aoColumns.length;
			var iRowspan, iColspan;
		
			if (  bIncludeHidden === undefined )
			{
				bIncludeHidden = false;
			}
		
			/* Make a copy of the master layout array, but without the visible columns in it */
			for ( i=0, iLen=aoSource.length ; i<iLen ; i++ )
			{
				aoLocal[i] = aoSource[i].slice();
				aoLocal[i].nTr = aoSource[i].nTr;
		
				/* Remove any columns which are currently hidden */
				for ( j=iColumns-1 ; j>=0 ; j-- )
				{
					if ( !oSettings.aoColumns[j].bVisible && !bIncludeHidden )
					{
						aoLocal[i].splice( j, 1 );
					}
				}
		
				/* Prep the applied array - it needs an element for each row */
				aApplied.push( [] );
			}
		
			for ( i=0, iLen=aoLocal.length ; i<iLen ; i++ )
			{
				nLocalTr = aoLocal[i].nTr;
				
				/* All cells are going to be replaced, so empty out the row */
				if ( nLocalTr )
				{
					while( (n = nLocalTr.firstChild) )
					{
						nLocalTr.removeChild( n );
					}
				}
		
				for ( j=0, jLen=aoLocal[i].length ; j<jLen ; j++ )
				{
					iRowspan = 1;
					iColspan = 1;
		
					/* Check to see if there is already a cell (row/colspan) covering our target
					 * insert point. If there is, then there is nothing to do.
					 */
					if ( aApplied[i][j] === undefined )
					{
						nLocalTr.appendChild( aoLocal[i][j].cell );
						aApplied[i][j] = 1;
		
						/* Expand the cell to cover as many rows as needed */
						while ( aoLocal[i+iRowspan] !== undefined &&
						        aoLocal[i][j].cell == aoLocal[i+iRowspan][j].cell )
						{
							aApplied[i+iRowspan][j] = 1;
							iRowspan++;
						}
		
						/* Expand the cell to cover as many columns as needed */
						while ( aoLocal[i][j+iColspan] !== undefined &&
						        aoLocal[i][j].cell == aoLocal[i][j+iColspan].cell )
						{
							/* Must update the applied array over the rows for the columns */
							for ( k=0 ; k<iRowspan ; k++ )
							{
								aApplied[i+k][j+iColspan] = 1;
							}
							iColspan++;
						}
		
						/* Do the actual expansion in the DOM */
						aoLocal[i][j].cell.rowSpan = iRowspan;
						aoLocal[i][j].cell.colSpan = iColspan;
					}
				}
			}
		}
		
		
		/**
		 * Insert the required TR nodes into the table for display
		 *  @param {object} oSettings dataTables settings object
		 *  @memberof DataTable#oApi
		 */
		function _fnDraw( oSettings )
		{
			/* Provide a pre-callback function which can be used to cancel the draw is false is returned */
			var aPreDraw = _fnCallbackFire( oSettings, 'aoPreDrawCallback', 'preDraw', [oSettings] );
			if ( $.inArray( false, aPreDraw ) !== -1 )
			{
				_fnProcessingDisplay( oSettings, false );
				return;
			}
			
			var i, iLen, n;
			var anRows = [];
			var iRowCount = 0;
			var iStripes = oSettings.asStripeClasses.length;
			var iOpenRows = oSettings.aoOpenRows.length;
			
			oSettings.bDrawing = true;
			
			/* Check and see if we have an initial draw position from state saving */
			if ( oSettings.iInitDisplayStart !== undefined && oSettings.iInitDisplayStart != -1 )
			{
				if ( oSettings.oFeatures.bServerSide )
				{
					oSettings._iDisplayStart = oSettings.iInitDisplayStart;
				}
				else
				{
					oSettings._iDisplayStart = (oSettings.iInitDisplayStart >= oSettings.fnRecordsDisplay()) ?
						0 : oSettings.iInitDisplayStart;
				}
				oSettings.iInitDisplayStart = -1;
				_fnCalculateEnd( oSettings );
			}
			
			/* Server-side processing draw intercept */
			if ( oSettings.bDeferLoading )
			{
				oSettings.bDeferLoading = false;
				oSettings.iDraw++;
			}
			else if ( !oSettings.oFeatures.bServerSide )
			{
				oSettings.iDraw++;
			}
			else if ( !oSettings.bDestroying && !_fnAjaxUpdate( oSettings ) )
			{
				return;
			}
			
			if ( oSettings.aiDisplay.length !== 0 )
			{
				var iStart = oSettings._iDisplayStart;
				var iEnd = oSettings._iDisplayEnd;
				
				if ( oSettings.oFeatures.bServerSide )
				{
					iStart = 0;
					iEnd = oSettings.aoData.length;
				}
				
				for ( var j=iStart ; j<iEnd ; j++ )
				{
					var aoData = oSettings.aoData[ oSettings.aiDisplay[j] ];
					if ( aoData.nTr === null )
					{
						_fnCreateTr( oSettings, oSettings.aiDisplay[j] );
					}
		
					var nRow = aoData.nTr;
					
					/* Remove the old striping classes and then add the new one */
					if ( iStripes !== 0 )
					{
						var sStripe = oSettings.asStripeClasses[ iRowCount % iStripes ];
						if ( aoData._sRowStripe != sStripe )
						{
							$(nRow).removeClass( aoData._sRowStripe ).addClass( sStripe );
							aoData._sRowStripe = sStripe;
						}
					}
					
					/* Row callback functions - might want to manipulate the row */
					_fnCallbackFire( oSettings, 'aoRowCallback', null, 
						[nRow, oSettings.aoData[ oSettings.aiDisplay[j] ]._aData, iRowCount, j] );
					
					anRows.push( nRow );
					iRowCount++;
					
					/* If there is an open row - and it is attached to this parent - attach it on redraw */
					if ( iOpenRows !== 0 )
					{
						for ( var k=0 ; k<iOpenRows ; k++ )
						{
							if ( nRow == oSettings.aoOpenRows[k].nParent )
							{
								anRows.push( oSettings.aoOpenRows[k].nTr );
								break;
							}
						}
					}
				}
			}
			else
			{
				/* Table is empty - create a row with an empty message in it */
				anRows[ 0 ] = document.createElement( 'tr' );
				
				if ( oSettings.asStripeClasses[0] )
				{
					anRows[ 0 ].className = oSettings.asStripeClasses[0];
				}
		
				var oLang = oSettings.oLanguage;
				var sZero = oLang.sZeroRecords;
				if ( oSettings.iDraw == 1 && oSettings.sAjaxSource !== null && !oSettings.oFeatures.bServerSide )
				{
					sZero = oLang.sLoadingRecords;
				}
				else if ( oLang.sEmptyTable && oSettings.fnRecordsTotal() === 0 )
				{
					sZero = oLang.sEmptyTable;
				}
		
				var nTd = document.createElement( 'td' );
				nTd.setAttribute( 'valign', "top" );
				nTd.colSpan = _fnVisbleColumns( oSettings );
				nTd.className = oSettings.oClasses.sRowEmpty;
				nTd.innerHTML = _fnInfoMacros( oSettings, sZero );
				
				anRows[ iRowCount ].appendChild( nTd );
			}
			
			/* Header and footer callbacks */
			_fnCallbackFire( oSettings, 'aoHeaderCallback', 'header', [ $(oSettings.nTHead).children('tr')[0], 
				_fnGetDataMaster( oSettings ), oSettings._iDisplayStart, oSettings.fnDisplayEnd(), oSettings.aiDisplay ] );
			
			_fnCallbackFire( oSettings, 'aoFooterCallback', 'footer', [ $(oSettings.nTFoot).children('tr')[0], 
				_fnGetDataMaster( oSettings ), oSettings._iDisplayStart, oSettings.fnDisplayEnd(), oSettings.aiDisplay ] );
			
			/* 
			 * Need to remove any old row from the display - note we can't just empty the tbody using
			 * $().html('') since this will unbind the jQuery event handlers (even although the node 
			 * still exists!) - equally we can't use innerHTML, since IE throws an exception.
			 */
			var
				nAddFrag = document.createDocumentFragment(),
				nRemoveFrag = document.createDocumentFragment(),
				nBodyPar, nTrs;
			
			if ( oSettings.nTBody )
			{
				nBodyPar = oSettings.nTBody.parentNode;
				nRemoveFrag.appendChild( oSettings.nTBody );
				
				/* When doing infinite scrolling, only remove child rows when sorting, filtering or start
				 * up. When not infinite scroll, always do it.
				 */
				if ( !oSettings.oScroll.bInfinite || !oSettings._bInitComplete ||
				 	oSettings.bSorted || oSettings.bFiltered )
				{
					while( (n = oSettings.nTBody.firstChild) )
					{
						oSettings.nTBody.removeChild( n );
					}
				}
				
				/* Put the draw table into the dom */
				for ( i=0, iLen=anRows.length ; i<iLen ; i++ )
				{
					nAddFrag.appendChild( anRows[i] );
				}
				
				oSettings.nTBody.appendChild( nAddFrag );
				if ( nBodyPar !== null )
				{
					nBodyPar.appendChild( oSettings.nTBody );
				}
			}
			
			/* Call all required callback functions for the end of a draw */
			_fnCallbackFire( oSettings, 'aoDrawCallback', 'draw', [oSettings] );
			
			/* Draw is complete, sorting and filtering must be as well */
			oSettings.bSorted = false;
			oSettings.bFiltered = false;
			oSettings.bDrawing = false;
			
			if ( oSettings.oFeatures.bServerSide )
			{
				_fnProcessingDisplay( oSettings, false );
				if ( !oSettings._bInitComplete )
				{
					_fnInitComplete( oSettings );
				}
			}
		}
		
		
		/**
		 * Redraw the table - taking account of the various features which are enabled
		 *  @param {object} oSettings dataTables settings object
		 *  @memberof DataTable#oApi
		 */
		function _fnReDraw( oSettings )
		{
			if ( oSettings.oFeatures.bSort )
			{
				/* Sorting will refilter and draw for us */
				_fnSort( oSettings, oSettings.oPreviousSearch );
			}
			else if ( oSettings.oFeatures.bFilter )
			{
				/* Filtering will redraw for us */
				_fnFilterComplete( oSettings, oSettings.oPreviousSearch );
			}
			else
			{
				_fnCalculateEnd( oSettings );
				_fnDraw( oSettings );
			}
		}
		
		
		/**
		 * Add the options to the page HTML for the table
		 *  @param {object} oSettings dataTables settings object
		 *  @memberof DataTable#oApi
		 */
		function _fnAddOptionsHtml ( oSettings )
		{
			/*
			 * Create a temporary, empty, div which we can later on replace with what we have generated
			 * we do it this way to rendering the 'options' html offline - speed :-)
			 */
			var nHolding = $('<div></div>')[0];
			oSettings.nTable.parentNode.insertBefore( nHolding, oSettings.nTable );
			
			/* 
			 * All DataTables are wrapped in a div
			 */
			oSettings.nTableWrapper = $('<div id="'+oSettings.sTableId+'_wrapper" class="'+oSettings.oClasses.sWrapper+'" role="grid"></div>')[0];
			oSettings.nTableReinsertBefore = oSettings.nTable.nextSibling;
		
			/* Track where we want to insert the option */
			var nInsertNode = oSettings.nTableWrapper;
			
			/* Loop over the user set positioning and place the elements as needed */
			var aDom = oSettings.sDom.split('');
			var nTmp, iPushFeature, cOption, nNewNode, cNext, sAttr, j;
			for ( var i=0 ; i<aDom.length ; i++ )
			{
				iPushFeature = 0;
				cOption = aDom[i];
				
				if ( cOption == '<' )
				{
					/* New container div */
					nNewNode = $('<div></div>')[0];
					
					/* Check to see if we should append an id and/or a class name to the container */
					cNext = aDom[i+1];
					if ( cNext == "'" || cNext == '"' )
					{
						sAttr = "";
						j = 2;
						while ( aDom[i+j] != cNext )
						{
							sAttr += aDom[i+j];
							j++;
						}
						
						/* Replace jQuery UI constants */
						if ( sAttr == "H" )
						{
							sAttr = oSettings.oClasses.sJUIHeader;
						}
						else if ( sAttr == "F" )
						{
							sAttr = oSettings.oClasses.sJUIFooter;
						}
						
						/* The attribute can be in the format of "#id.class", "#id" or "class" This logic
						 * breaks the string into parts and applies them as needed
						 */
						if ( sAttr.indexOf('.') != -1 )
						{
							var aSplit = sAttr.split('.');
							nNewNode.id = aSplit[0].substr(1, aSplit[0].length-1);
							nNewNode.className = aSplit[1];
						}
						else if ( sAttr.charAt(0) == "#" )
						{
							nNewNode.id = sAttr.substr(1, sAttr.length-1);
						}
						else
						{
							nNewNode.className = sAttr;
						}
						
						i += j; /* Move along the position array */
					}
					
					nInsertNode.appendChild( nNewNode );
					nInsertNode = nNewNode;
				}
				else if ( cOption == '>' )
				{
					/* End container div */
					nInsertNode = nInsertNode.parentNode;
				}
				else if ( cOption == 'l' && oSettings.oFeatures.bPaginate && oSettings.oFeatures.bLengthChange )
				{
					/* Length */
					nTmp = _fnFeatureHtmlLength( oSettings );
					iPushFeature = 1;
				}
				else if ( cOption == 'f' && oSettings.oFeatures.bFilter )
				{
					/* Filter */
					nTmp = _fnFeatureHtmlFilter( oSettings );
					iPushFeature = 1;
				}
				else if ( cOption == 'r' && oSettings.oFeatures.bProcessing )
				{
					/* pRocessing */
					nTmp = _fnFeatureHtmlProcessing( oSettings );
					iPushFeature = 1;
				}
				else if ( cOption == 't' )
				{
					/* Table */
					nTmp = _fnFeatureHtmlTable( oSettings );
					iPushFeature = 1;
				}
				else if ( cOption ==  'i' && oSettings.oFeatures.bInfo )
				{
					/* Info */
					nTmp = _fnFeatureHtmlInfo( oSettings );
					iPushFeature = 1;
				}
				else if ( cOption == 'p' && oSettings.oFeatures.bPaginate )
				{
					/* Pagination */
					nTmp = _fnFeatureHtmlPaginate( oSettings );
					iPushFeature = 1;
				}
				else if ( DataTable.ext.aoFeatures.length !== 0 )
				{
					/* Plug-in features */
					var aoFeatures = DataTable.ext.aoFeatures;
					for ( var k=0, kLen=aoFeatures.length ; k<kLen ; k++ )
					{
						if ( cOption == aoFeatures[k].cFeature )
						{
							nTmp = aoFeatures[k].fnInit( oSettings );
							if ( nTmp )
							{
								iPushFeature = 1;
							}
							break;
						}
					}
				}
				
				/* Add to the 2D features array */
				if ( iPushFeature == 1 && nTmp !== null )
				{
					if ( typeof oSettings.aanFeatures[cOption] !== 'object' )
					{
						oSettings.aanFeatures[cOption] = [];
					}
					oSettings.aanFeatures[cOption].push( nTmp );
					nInsertNode.appendChild( nTmp );
				}
			}
			
			/* Built our DOM structure - replace the holding div with what we want */
			nHolding.parentNode.replaceChild( oSettings.nTableWrapper, nHolding );
		}
		
		
		/**
		 * Use the DOM source to create up an array of header cells. The idea here is to
		 * create a layout grid (array) of rows x columns, which contains a reference
		 * to the cell that that point in the grid (regardless of col/rowspan), such that
		 * any column / row could be removed and the new grid constructed
		 *  @param array {object} aLayout Array to store the calculated layout in
		 *  @param {node} nThead The header/footer element for the table
		 *  @memberof DataTable#oApi
		 */
		function _fnDetectHeader ( aLayout, nThead )
		{
			var nTrs = $(nThead).children('tr');
			var nTr, nCell;
			var i, k, l, iLen, jLen, iColShifted, iColumn, iColspan, iRowspan;
			var bUnique;
			var fnShiftCol = function ( a, i, j ) {
				var k = a[i];
		                while ( k[j] ) {
					j++;
				}
				return j;
			};
		
			aLayout.splice( 0, aLayout.length );
			
			/* We know how many rows there are in the layout - so prep it */
			for ( i=0, iLen=nTrs.length ; i<iLen ; i++ )
			{
				aLayout.push( [] );
			}
			
			/* Calculate a layout array */
			for ( i=0, iLen=nTrs.length ; i<iLen ; i++ )
			{
				nTr = nTrs[i];
				iColumn = 0;
				
				/* For every cell in the row... */
				nCell = nTr.firstChild;
				while ( nCell ) {
					if ( nCell.nodeName.toUpperCase() == "TD" ||
					     nCell.nodeName.toUpperCase() == "TH" )
					{
						/* Get the col and rowspan attributes from the DOM and sanitise them */
						iColspan = nCell.getAttribute('colspan') * 1;
						iRowspan = nCell.getAttribute('rowspan') * 1;
						iColspan = (!iColspan || iColspan===0 || iColspan===1) ? 1 : iColspan;
						iRowspan = (!iRowspan || iRowspan===0 || iRowspan===1) ? 1 : iRowspan;
		
						/* There might be colspan cells already in this row, so shift our target 
						 * accordingly
						 */
						iColShifted = fnShiftCol( aLayout, i, iColumn );
						
						/* Cache calculation for unique columns */
						bUnique = iColspan === 1 ? true : false;
						
						/* If there is col / rowspan, copy the information into the layout grid */
						for ( l=0 ; l<iColspan ; l++ )
						{
							for ( k=0 ; k<iRowspan ; k++ )
							{
								aLayout[i+k][iColShifted+l] = {
									"cell": nCell,
									"unique": bUnique
								};
								aLayout[i+k].nTr = nTr;
							}
						}
					}
					nCell = nCell.nextSibling;
				}
			}
		}
		
		
		/**
		 * Get an array of unique th elements, one for each column
		 *  @param {object} oSettings dataTables settings object
		 *  @param {node} nHeader automatically detect the layout from this node - optional
		 *  @param {array} aLayout thead/tfoot layout from _fnDetectHeader - optional
		 *  @returns array {node} aReturn list of unique th's
		 *  @memberof DataTable#oApi
		 */
		function _fnGetUniqueThs ( oSettings, nHeader, aLayout )
		{
			var aReturn = [];
			if ( !aLayout )
			{
				aLayout = oSettings.aoHeader;
				if ( nHeader )
				{
					aLayout = [];
					_fnDetectHeader( aLayout, nHeader );
				}
			}
		
			for ( var i=0, iLen=aLayout.length ; i<iLen ; i++ )
			{
				for ( var j=0, jLen=aLayout[i].length ; j<jLen ; j++ )
				{
					if ( aLayout[i][j].unique && 
						 (!aReturn[j] || !oSettings.bSortCellsTop) )
					{
						aReturn[j] = aLayout[i][j].cell;
					}
				}
			}
			
			return aReturn;
		}
		
		
		
		/**
		 * Update the table using an Ajax call
		 *  @param {object} oSettings dataTables settings object
		 *  @returns {boolean} Block the table drawing or not
		 *  @memberof DataTable#oApi
		 */
		function _fnAjaxUpdate( oSettings )
		{
			if ( oSettings.bAjaxDataGet )
			{
				oSettings.iDraw++;
				_fnProcessingDisplay( oSettings, true );
				var iColumns = oSettings.aoColumns.length;
				var aoData = _fnAjaxParameters( oSettings );
				_fnServerParams( oSettings, aoData );
				
				oSettings.fnServerData.call( oSettings.oInstance, oSettings.sAjaxSource, aoData,
					function(json) {
						_fnAjaxUpdateDraw( oSettings, json );
					}, oSettings );
				return false;
			}
			else
			{
				return true;
			}
		}
		
		
		/**
		 * Build up the parameters in an object needed for a server-side processing request
		 *  @param {object} oSettings dataTables settings object
		 *  @returns {bool} block the table drawing or not
		 *  @memberof DataTable#oApi
		 */
		function _fnAjaxParameters( oSettings )
		{
			var iColumns = oSettings.aoColumns.length;
			var aoData = [], mDataProp, aaSort, aDataSort;
			var i, j;
			
			aoData.push( { "name": "sEcho",          "value": oSettings.iDraw } );
			aoData.push( { "name": "iColumns",       "value": iColumns } );
			aoData.push( { "name": "sColumns",       "value": _fnColumnOrdering(oSettings) } );
			aoData.push( { "name": "iDisplayStart",  "value": oSettings._iDisplayStart } );
			aoData.push( { "name": "iDisplayLength", "value": oSettings.oFeatures.bPaginate !== false ?
				oSettings._iDisplayLength : -1 } );
				
			for ( i=0 ; i<iColumns ; i++ )
			{
			  mDataProp = oSettings.aoColumns[i].mData;
				aoData.push( { "name": "mDataProp_"+i, "value": typeof(mDataProp)==="function" ? 'function' : mDataProp } );
			}
			
			/* Filtering */
			if ( oSettings.oFeatures.bFilter !== false )
			{
				aoData.push( { "name": "sSearch", "value": oSettings.oPreviousSearch.sSearch } );
				aoData.push( { "name": "bRegex",  "value": oSettings.oPreviousSearch.bRegex } );
				for ( i=0 ; i<iColumns ; i++ )
				{
					aoData.push( { "name": "sSearch_"+i,     "value": oSettings.aoPreSearchCols[i].sSearch } );
					aoData.push( { "name": "bRegex_"+i,      "value": oSettings.aoPreSearchCols[i].bRegex } );
					aoData.push( { "name": "bSearchable_"+i, "value": oSettings.aoColumns[i].bSearchable } );
				}
			}
			
			/* Sorting */
			if ( oSettings.oFeatures.bSort !== false )
			{
				var iCounter = 0;
		
				aaSort = ( oSettings.aaSortingFixed !== null ) ?
					oSettings.aaSortingFixed.concat( oSettings.aaSorting ) :
					oSettings.aaSorting.slice();
				
				for ( i=0 ; i<aaSort.length ; i++ )
				{
					aDataSort = oSettings.aoColumns[ aaSort[i][0] ].aDataSort;
					
					for ( j=0 ; j<aDataSort.length ; j++ )
					{
						aoData.push( { "name": "iSortCol_"+iCounter,  "value": aDataSort[j] } );
						aoData.push( { "name": "sSortDir_"+iCounter,  "value": aaSort[i][1] } );
						iCounter++;
					}
				}
				aoData.push( { "name": "iSortingCols",   "value": iCounter } );
				
				for ( i=0 ; i<iColumns ; i++ )
				{
					aoData.push( { "name": "bSortable_"+i,  "value": oSettings.aoColumns[i].bSortable } );
				}
			}
			
			return aoData;
		}
		
		
		/**
		 * Add Ajax parameters from plug-ins
		 *  @param {object} oSettings dataTables settings object
		 *  @param array {objects} aoData name/value pairs to send to the server
		 *  @memberof DataTable#oApi
		 */
		function _fnServerParams( oSettings, aoData )
		{
			_fnCallbackFire( oSettings, 'aoServerParams', 'serverParams', [aoData] );
		}
		
		
		/**
		 * Data the data from the server (nuking the old) and redraw the table
		 *  @param {object} oSettings dataTables settings object
		 *  @param {object} json json data return from the server.
		 *  @param {string} json.sEcho Tracking flag for DataTables to match requests
		 *  @param {int} json.iTotalRecords Number of records in the data set, not accounting for filtering
		 *  @param {int} json.iTotalDisplayRecords Number of records in the data set, accounting for filtering
		 *  @param {array} json.aaData The data to display on this page
		 *  @param {string} [json.sColumns] Column ordering (sName, comma separated)
		 *  @memberof DataTable#oApi
		 */
		function _fnAjaxUpdateDraw ( oSettings, json )
		{
			if ( json.sEcho !== undefined )
			{
				/* Protect against old returns over-writing a new one. Possible when you get
				 * very fast interaction, and later queries are completed much faster
				 */
				if ( json.sEcho*1 < oSettings.iDraw )
				{
					return;
				}
				else
				{
					oSettings.iDraw = json.sEcho * 1;
				}
			}
			
			if ( !oSettings.oScroll.bInfinite ||
				   (oSettings.oScroll.bInfinite && (oSettings.bSorted || oSettings.bFiltered)) )
			{
				_fnClearTable( oSettings );
			}
			oSettings._iRecordsTotal = parseInt(json.iTotalRecords, 10);
			oSettings._iRecordsDisplay = parseInt(json.iTotalDisplayRecords, 10);
			
			/* Determine if reordering is required */
			var sOrdering = _fnColumnOrdering(oSettings);
			var bReOrder = (json.sColumns !== undefined && sOrdering !== "" && json.sColumns != sOrdering );
			var aiIndex;
			if ( bReOrder )
			{
				aiIndex = _fnReOrderIndex( oSettings, json.sColumns );
			}
			
			var aData = _fnGetObjectDataFn( oSettings.sAjaxDataProp )( json );
			for ( var i=0, iLen=aData.length ; i<iLen ; i++ )
			{
				if ( bReOrder )
				{
					/* If we need to re-order, then create a new array with the correct order and add it */
					var aDataSorted = [];
					for ( var j=0, jLen=oSettings.aoColumns.length ; j<jLen ; j++ )
					{
						aDataSorted.push( aData[i][ aiIndex[j] ] );
					}
					_fnAddData( oSettings, aDataSorted );
				}
				else
				{
					/* No re-order required, sever got it "right" - just straight add */
					_fnAddData( oSettings, aData[i] );
				}
			}
			oSettings.aiDisplay = oSettings.aiDisplayMaster.slice();
			
			oSettings.bAjaxDataGet = false;
			_fnDraw( oSettings );
			oSettings.bAjaxDataGet = true;
			_fnProcessingDisplay( oSettings, false );
		}
		
		
		
		/**
		 * Generate the node required for filtering text
		 *  @returns {node} Filter control element
		 *  @param {object} oSettings dataTables settings object
		 *  @memberof DataTable#oApi
		 */
		function _fnFeatureHtmlFilter ( oSettings )
		{
			var oPreviousSearch = oSettings.oPreviousSearch;
			
			var sSearchStr = oSettings.oLanguage.sSearch;
			sSearchStr = (sSearchStr.indexOf('_INPUT_') !== -1) ?
			  sSearchStr.replace('_INPUT_', '<input type="text" />') :
			  sSearchStr==="" ? '<input type="text" />' : sSearchStr+' <input type="text" />';
			
			var nFilter = document.createElement( 'div' );
			nFilter.className = oSettings.oClasses.sFilter;
			nFilter.innerHTML = '<label>'+sSearchStr+'</label>';
			if ( !oSettings.aanFeatures.f )
			{
				nFilter.id = oSettings.sTableId+'_filter';
			}
			
			var jqFilter = $('input[type="text"]', nFilter);
		
			// Store a reference to the input element, so other input elements could be
			// added to the filter wrapper if needed (submit button for example)
			nFilter._DT_Input = jqFilter[0];
		
			jqFilter.val( oPreviousSearch.sSearch.replace('"','&quot;') );
			jqFilter.bind( 'keyup.DT', function(e) {
				/* Update all other filter input elements for the new display */
				var n = oSettings.aanFeatures.f;
				var val = this.value==="" ? "" : this.value; // mental IE8 fix :-(
		
				for ( var i=0, iLen=n.length ; i<iLen ; i++ )
				{
					if ( n[i] != $(this).parents('div.dataTables_filter')[0] )
					{
						$(n[i]._DT_Input).val( val );
					}
				}
				
				/* Now do the filter */
				if ( val != oPreviousSearch.sSearch )
				{
					_fnFilterComplete( oSettings, { 
						"sSearch": val, 
						"bRegex": oPreviousSearch.bRegex,
						"bSmart": oPreviousSearch.bSmart ,
						"bCaseInsensitive": oPreviousSearch.bCaseInsensitive 
					} );
				}
			} );
		
			jqFilter
				.attr('aria-controls', oSettings.sTableId)
				.bind( 'keypress.DT', function(e) {
					/* Prevent form submission */
					if ( e.keyCode == 13 )
					{
						return false;
					}
				}
			);
			
			return nFilter;
		}
		
		
		/**
		 * Filter the table using both the global filter and column based filtering
		 *  @param {object} oSettings dataTables settings object
		 *  @param {object} oSearch search information
		 *  @param {int} [iForce] force a research of the master array (1) or not (undefined or 0)
		 *  @memberof DataTable#oApi
		 */
		function _fnFilterComplete ( oSettings, oInput, iForce )
		{
			var oPrevSearch = oSettings.oPreviousSearch;
			var aoPrevSearch = oSettings.aoPreSearchCols;
			var fnSaveFilter = function ( oFilter ) {
				/* Save the filtering values */
				oPrevSearch.sSearch = oFilter.sSearch;
				oPrevSearch.bRegex = oFilter.bRegex;
				oPrevSearch.bSmart = oFilter.bSmart;
				oPrevSearch.bCaseInsensitive = oFilter.bCaseInsensitive;
			};
		
			/* In server-side processing all filtering is done by the server, so no point hanging around here */
			if ( !oSettings.oFeatures.bServerSide )
			{
				/* Global filter */
				_fnFilter( oSettings, oInput.sSearch, iForce, oInput.bRegex, oInput.bSmart, oInput.bCaseInsensitive );
				fnSaveFilter( oInput );
		
				/* Now do the individual column filter */
				for ( var i=0 ; i<oSettings.aoPreSearchCols.length ; i++ )
				{
					_fnFilterColumn( oSettings, aoPrevSearch[i].sSearch, i, aoPrevSearch[i].bRegex, 
						aoPrevSearch[i].bSmart, aoPrevSearch[i].bCaseInsensitive );
				}
				
				/* Custom filtering */
				_fnFilterCustom( oSettings );
			}
			else
			{
				fnSaveFilter( oInput );
			}
			
			/* Tell the draw function we have been filtering */
			oSettings.bFiltered = true;
			$(oSettings.oInstance).trigger('filter', oSettings);
			
			/* Redraw the table */
			oSettings._iDisplayStart = 0;
			_fnCalculateEnd( oSettings );
			_fnDraw( oSettings );
			
			/* Rebuild search array 'offline' */
			_fnBuildSearchArray( oSettings, 0 );
		}
		
		
		/**
		 * Apply custom filtering functions
		 *  @param {object} oSettings dataTables settings object
		 *  @memberof DataTable#oApi
		 */
		function _fnFilterCustom( oSettings )
		{
			var afnFilters = DataTable.ext.afnFiltering;
			var aiFilterColumns = _fnGetColumns( oSettings, 'bSearchable' );
		
			for ( var i=0, iLen=afnFilters.length ; i<iLen ; i++ )
			{
				var iCorrector = 0;
				for ( var j=0, jLen=oSettings.aiDisplay.length ; j<jLen ; j++ )
				{
					var iDisIndex = oSettings.aiDisplay[j-iCorrector];
					var bTest = afnFilters[i](
						oSettings,
						_fnGetRowData( oSettings, iDisIndex, 'filter', aiFilterColumns ),
						iDisIndex
					);
					
					/* Check if we should use this row based on the filtering function */
					if ( !bTest )
					{
						oSettings.aiDisplay.splice( j-iCorrector, 1 );
						iCorrector++;
					}
				}
			}
		}
		
		
		/**
		 * Filter the table on a per-column basis
		 *  @param {object} oSettings dataTables settings object
		 *  @param {string} sInput string to filter on
		 *  @param {int} iColumn column to filter
		 *  @param {bool} bRegex treat search string as a regular expression or not
		 *  @param {bool} bSmart use smart filtering or not
		 *  @param {bool} bCaseInsensitive Do case insenstive matching or not
		 *  @memberof DataTable#oApi
		 */
		function _fnFilterColumn ( oSettings, sInput, iColumn, bRegex, bSmart, bCaseInsensitive )
		{
			if ( sInput === "" )
			{
				return;
			}
			
			var iIndexCorrector = 0;
			var rpSearch = _fnFilterCreateSearch( sInput, bRegex, bSmart, bCaseInsensitive );
			
			for ( var i=oSettings.aiDisplay.length-1 ; i>=0 ; i-- )
			{
				var sData = _fnDataToSearch( _fnGetCellData( oSettings, oSettings.aiDisplay[i], iColumn, 'filter' ),
					oSettings.aoColumns[iColumn].sType );
				if ( ! rpSearch.test( sData ) )
				{
					oSettings.aiDisplay.splice( i, 1 );
					iIndexCorrector++;
				}
			}
		}
		
		
		/**
		 * Filter the data table based on user input and draw the table
		 *  @param {object} oSettings dataTables settings object
		 *  @param {string} sInput string to filter on
		 *  @param {int} iForce optional - force a research of the master array (1) or not (undefined or 0)
		 *  @param {bool} bRegex treat as a regular expression or not
		 *  @param {bool} bSmart perform smart filtering or not
		 *  @param {bool} bCaseInsensitive Do case insenstive matching or not
		 *  @memberof DataTable#oApi
		 */
		function _fnFilter( oSettings, sInput, iForce, bRegex, bSmart, bCaseInsensitive )
		{
			var i;
			var rpSearch = _fnFilterCreateSearch( sInput, bRegex, bSmart, bCaseInsensitive );
			var oPrevSearch = oSettings.oPreviousSearch;
			
			/* Check if we are forcing or not - optional parameter */
			if ( !iForce )
			{
				iForce = 0;
			}
			
			/* Need to take account of custom filtering functions - always filter */
			if ( DataTable.ext.afnFiltering.length !== 0 )
			{
				iForce = 1;
			}
			
			/*
			 * If the input is blank - we want the full data set
			 */
			if ( sInput.length <= 0 )
			{
				oSettings.aiDisplay.splice( 0, oSettings.aiDisplay.length);
				oSettings.aiDisplay = oSettings.aiDisplayMaster.slice();
			}
			else
			{
				/*
				 * We are starting a new search or the new search string is smaller 
				 * then the old one (i.e. delete). Search from the master array
			 	 */
				if ( oSettings.aiDisplay.length == oSettings.aiDisplayMaster.length ||
					   oPrevSearch.sSearch.length > sInput.length || iForce == 1 ||
					   sInput.indexOf(oPrevSearch.sSearch) !== 0 )
				{
					/* Nuke the old display array - we are going to rebuild it */
					oSettings.aiDisplay.splice( 0, oSettings.aiDisplay.length);
					
					/* Force a rebuild of the search array */
					_fnBuildSearchArray( oSettings, 1 );
					
					/* Search through all records to populate the search array
					 * The the oSettings.aiDisplayMaster and asDataSearch arrays have 1 to 1 
					 * mapping
					 */
					for ( i=0 ; i<oSettings.aiDisplayMaster.length ; i++ )
					{
						if ( rpSearch.test(oSettings.asDataSearch[i]) )
						{
							oSettings.aiDisplay.push( oSettings.aiDisplayMaster[i] );
						}
					}
			  }
			  else
				{
			  	/* Using old search array - refine it - do it this way for speed
			  	 * Don't have to search the whole master array again
					 */
			  	var iIndexCorrector = 0;
			  	
			  	/* Search the current results */
			  	for ( i=0 ; i<oSettings.asDataSearch.length ; i++ )
					{
			  		if ( ! rpSearch.test(oSettings.asDataSearch[i]) )
						{
			  			oSettings.aiDisplay.splice( i-iIndexCorrector, 1 );
			  			iIndexCorrector++;
			  		}
			  	}
			  }
			}
		}
		
		
		/**
		 * Create an array which can be quickly search through
		 *  @param {object} oSettings dataTables settings object
		 *  @param {int} iMaster use the master data array - optional
		 *  @memberof DataTable#oApi
		 */
		function _fnBuildSearchArray ( oSettings, iMaster )
		{
			if ( !oSettings.oFeatures.bServerSide )
			{
				/* Clear out the old data */
				oSettings.asDataSearch = [];
		
				var aiFilterColumns = _fnGetColumns( oSettings, 'bSearchable' );
				var aiIndex = (iMaster===1) ?
				 	oSettings.aiDisplayMaster :
				 	oSettings.aiDisplay;
				
				for ( var i=0, iLen=aiIndex.length ; i<iLen ; i++ )
				{
					oSettings.asDataSearch[i] = _fnBuildSearchRow(
						oSettings,
						_fnGetRowData( oSettings, aiIndex[i], 'filter', aiFilterColumns )
					);
				}
			}
		}
		
		
		/**
		 * Create a searchable string from a single data row
		 *  @param {object} oSettings dataTables settings object
		 *  @param {array} aData Row data array to use for the data to search
		 *  @memberof DataTable#oApi
		 */
		function _fnBuildSearchRow( oSettings, aData )
		{
			var sSearch = aData.join('  ');
			
			/* If it looks like there is an HTML entity in the string, attempt to decode it */
			if ( sSearch.indexOf('&') !== -1 )
			{
				sSearch = $('<div>').html(sSearch).text();
			}
			
			// Strip newline characters
			return sSearch.replace( /[\n\r]/g, " " );
		}
		
		/**
		 * Build a regular expression object suitable for searching a table
		 *  @param {string} sSearch string to search for
		 *  @param {bool} bRegex treat as a regular expression or not
		 *  @param {bool} bSmart perform smart filtering or not
		 *  @param {bool} bCaseInsensitive Do case insensitive matching or not
		 *  @returns {RegExp} constructed object
		 *  @memberof DataTable#oApi
		 */
		function _fnFilterCreateSearch( sSearch, bRegex, bSmart, bCaseInsensitive )
		{
			var asSearch, sRegExpString;
			
			if ( bSmart )
			{
				/* Generate the regular expression to use. Something along the lines of:
				 * ^(?=.*?\bone\b)(?=.*?\btwo\b)(?=.*?\bthree\b).*$
				 */
				asSearch = bRegex ? sSearch.split( ' ' ) : _fnEscapeRegex( sSearch ).split( ' ' );
				sRegExpString = '^(?=.*?'+asSearch.join( ')(?=.*?' )+').*$';
				return new RegExp( sRegExpString, bCaseInsensitive ? "i" : "" );
			}
			else
			{
				sSearch = bRegex ? sSearch : _fnEscapeRegex( sSearch );
				return new RegExp( sSearch, bCaseInsensitive ? "i" : "" );
			}
		}
		
		
		/**
		 * Convert raw data into something that the user can search on
		 *  @param {string} sData data to be modified
		 *  @param {string} sType data type
		 *  @returns {string} search string
		 *  @memberof DataTable#oApi
		 */
		function _fnDataToSearch ( sData, sType )
		{
			if ( typeof DataTable.ext.ofnSearch[sType] === "function" )
			{
				return DataTable.ext.ofnSearch[sType]( sData );
			}
			else if ( sData === null )
			{
				return '';
			}
			else if ( sType == "html" )
			{
				return sData.replace(/[\r\n]/g," ").replace( /<.*?>/g, "" );
			}
			else if ( typeof sData === "string" )
			{
				return sData.replace(/[\r\n]/g," ");
			}
			return sData;
		}
		
		
		/**
		 * scape a string such that it can be used in a regular expression
		 *  @param {string} sVal string to escape
		 *  @returns {string} escaped string
		 *  @memberof DataTable#oApi
		 */
		function _fnEscapeRegex ( sVal )
		{
			var acEscape = [ '/', '.', '*', '+', '?', '|', '(', ')', '[', ']', '{', '}', '\\', '$', '^', '-' ];
			var reReplace = new RegExp( '(\\' + acEscape.join('|\\') + ')', 'g' );
			return sVal.replace(reReplace, '\\$1');
		}
		
		
		/**
		 * Generate the node required for the info display
		 *  @param {object} oSettings dataTables settings object
		 *  @returns {node} Information element
		 *  @memberof DataTable#oApi
		 */
		function _fnFeatureHtmlInfo ( oSettings )
		{
			var nInfo = document.createElement( 'div' );
			nInfo.className = oSettings.oClasses.sInfo;
			
			/* Actions that are to be taken once only for this feature */
			if ( !oSettings.aanFeatures.i )
			{
				/* Add draw callback */
				oSettings.aoDrawCallback.push( {
					"fn": _fnUpdateInfo,
					"sName": "information"
				} );
				
				/* Add id */
				nInfo.id = oSettings.sTableId+'_info';
			}
			oSettings.nTable.setAttribute( 'aria-describedby', oSettings.sTableId+'_info' );
			
			return nInfo;
		}
		
		
		/**
		 * Update the information elements in the display
		 *  @param {object} oSettings dataTables settings object
		 *  @memberof DataTable#oApi
		 */
		function _fnUpdateInfo ( oSettings )
		{
			/* Show information about the table */
			if ( !oSettings.oFeatures.bInfo || oSettings.aanFeatures.i.length === 0 )
			{
				return;
			}
			
			var
				oLang = oSettings.oLanguage,
				iStart = oSettings._iDisplayStart+1,
				iEnd = oSettings.fnDisplayEnd(),
				iMax = oSettings.fnRecordsTotal(),
				iTotal = oSettings.fnRecordsDisplay(),
				sOut;
			
			if ( iTotal === 0 )
			{
				/* Empty record set */
				sOut = oLang.sInfoEmpty;
			}
			else {
				/* Normal record set */
				sOut = oLang.sInfo;
			}
		
			if ( iTotal != iMax )
			{
				/* Record set after filtering */
				sOut += ' ' + oLang.sInfoFiltered;
			}
		
			// Convert the macros
			sOut += oLang.sInfoPostFix;
			sOut = _fnInfoMacros( oSettings, sOut );
			
			if ( oLang.fnInfoCallback !== null )
			{
				sOut = oLang.fnInfoCallback.call( oSettings.oInstance, 
					oSettings, iStart, iEnd, iMax, iTotal, sOut );
			}
			
			var n = oSettings.aanFeatures.i;
			for ( var i=0, iLen=n.length ; i<iLen ; i++ )
			{
				$(n[i]).html( sOut );
			}
		}
		
		
		function _fnInfoMacros ( oSettings, str )
		{
			var
				iStart = oSettings._iDisplayStart+1,
				sStart = oSettings.fnFormatNumber( iStart ),
				iEnd = oSettings.fnDisplayEnd(),
				sEnd = oSettings.fnFormatNumber( iEnd ),
				iTotal = oSettings.fnRecordsDisplay(),
				sTotal = oSettings.fnFormatNumber( iTotal ),
				iMax = oSettings.fnRecordsTotal(),
				sMax = oSettings.fnFormatNumber( iMax );
		
			// When infinite scrolling, we are always starting at 1. _iDisplayStart is used only
			// internally
			if ( oSettings.oScroll.bInfinite )
			{
				sStart = oSettings.fnFormatNumber( 1 );
			}
		
			return str.
				replace(/_START_/g, sStart).
				replace(/_END_/g,   sEnd).
				replace(/_TOTAL_/g, sTotal).
				replace(/_MAX_/g,   sMax);
		}
		
		
		
		/**
		 * Draw the table for the first time, adding all required features
		 *  @param {object} oSettings dataTables settings object
		 *  @memberof DataTable#oApi
		 */
		function _fnInitialise ( oSettings )
		{
			var i, iLen, iAjaxStart=oSettings.iInitDisplayStart;
			
			/* Ensure that the table data is fully initialised */
			if ( oSettings.bInitialised === false )
			{
				setTimeout( function(){ _fnInitialise( oSettings ); }, 200 );
				return;
			}
			
			/* Show the display HTML options */
			_fnAddOptionsHtml( oSettings );
			
			/* Build and draw the header / footer for the table */
			_fnBuildHead( oSettings );
			_fnDrawHead( oSettings, oSettings.aoHeader );
			if ( oSettings.nTFoot )
			{
				_fnDrawHead( oSettings, oSettings.aoFooter );
			}
		
			/* Okay to show that something is going on now */
			_fnProcessingDisplay( oSettings, true );
			
			/* Calculate sizes for columns */
			if ( oSettings.oFeatures.bAutoWidth )
			{
				_fnCalculateColumnWidths( oSettings );
			}
			
			for ( i=0, iLen=oSettings.aoColumns.length ; i<iLen ; i++ )
			{
				if ( oSettings.aoColumns[i].sWidth !== null )
				{
					oSettings.aoColumns[i].nTh.style.width = _fnStringToCss( oSettings.aoColumns[i].sWidth );
				}
			}
			
			/* If there is default sorting required - let's do it. The sort function will do the
			 * drawing for us. Otherwise we draw the table regardless of the Ajax source - this allows
			 * the table to look initialised for Ajax sourcing data (show 'loading' message possibly)
			 */
			if ( oSettings.oFeatures.bSort )
			{
				_fnSort( oSettings );
			}
			else if ( oSettings.oFeatures.bFilter )
			{
				_fnFilterComplete( oSettings, oSettings.oPreviousSearch );
			}
			else
			{
				oSettings.aiDisplay = oSettings.aiDisplayMaster.slice();
				_fnCalculateEnd( oSettings );
				_fnDraw( oSettings );
			}
			
			/* if there is an ajax source load the data */
			if ( oSettings.sAjaxSource !== null && !oSettings.oFeatures.bServerSide )
			{
				var aoData = [];
				_fnServerParams( oSettings, aoData );
				oSettings.fnServerData.call( oSettings.oInstance, oSettings.sAjaxSource, aoData, function(json) {
					var aData = (oSettings.sAjaxDataProp !== "") ?
					 	_fnGetObjectDataFn( oSettings.sAjaxDataProp )(json) : json;
		
					/* Got the data - add it to the table */
					for ( i=0 ; i<aData.length ; i++ )
					{
						_fnAddData( oSettings, aData[i] );
					}
					
					/* Reset the init display for cookie saving. We've already done a filter, and
					 * therefore cleared it before. So we need to make it appear 'fresh'
					 */
					oSettings.iInitDisplayStart = iAjaxStart;
					
					if ( oSettings.oFeatures.bSort )
					{
						_fnSort( oSettings );
					}
					else
					{
						oSettings.aiDisplay = oSettings.aiDisplayMaster.slice();
						_fnCalculateEnd( oSettings );
						_fnDraw( oSettings );
					}
					
					_fnProcessingDisplay( oSettings, false );
					_fnInitComplete( oSettings, json );
				}, oSettings );
				return;
			}
			
			/* Server-side processing initialisation complete is done at the end of _fnDraw */
			if ( !oSettings.oFeatures.bServerSide )
			{
				_fnProcessingDisplay( oSettings, false );
				_fnInitComplete( oSettings );
			}
		}
		
		
		/**
		 * Draw the table for the first time, adding all required features
		 *  @param {object} oSettings dataTables settings object
		 *  @param {object} [json] JSON from the server that completed the table, if using Ajax source
		 *    with client-side processing (optional)
		 *  @memberof DataTable#oApi
		 */
		function _fnInitComplete ( oSettings, json )
		{
			oSettings._bInitComplete = true;
			_fnCallbackFire( oSettings, 'aoInitComplete', 'init', [oSettings, json] );
		}
		
		
		/**
		 * Language compatibility - when certain options are given, and others aren't, we
		 * need to duplicate the values over, in order to provide backwards compatibility
		 * with older language files.
		 *  @param {object} oSettings dataTables settings object
		 *  @memberof DataTable#oApi
		 */
		function _fnLanguageCompat( oLanguage )
		{
			var oDefaults = DataTable.defaults.oLanguage;
		
			/* Backwards compatibility - if there is no sEmptyTable given, then use the same as
			 * sZeroRecords - assuming that is given.
			 */
			if ( !oLanguage.sEmptyTable && oLanguage.sZeroRecords &&
				oDefaults.sEmptyTable === "No data available in table" )
			{
				_fnMap( oLanguage, oLanguage, 'sZeroRecords', 'sEmptyTable' );
			}
		
			/* Likewise with loading records */
			if ( !oLanguage.sLoadingRecords && oLanguage.sZeroRecords &&
				oDefaults.sLoadingRecords === "Loading..." )
			{
				_fnMap( oLanguage, oLanguage, 'sZeroRecords', 'sLoadingRecords' );
			}
		}
		
		
		
		/**
		 * Generate the node required for user display length changing
		 *  @param {object} oSettings dataTables settings object
		 *  @returns {node} Display length feature node
		 *  @memberof DataTable#oApi
		 */
		function _fnFeatureHtmlLength ( oSettings )
		{
			if ( oSettings.oScroll.bInfinite )
			{
				return null;
			}
			
			/* This can be overruled by not using the _MENU_ var/macro in the language variable */
			var sName = 'name="'+oSettings.sTableId+'_length"';
			var sStdMenu = '<select size="1" '+sName+'>';
			var i, iLen;
			var aLengthMenu = oSettings.aLengthMenu;
			
			if ( aLengthMenu.length == 2 && typeof aLengthMenu[0] === 'object' && 
					typeof aLengthMenu[1] === 'object' )
			{
				for ( i=0, iLen=aLengthMenu[0].length ; i<iLen ; i++ )
				{
					sStdMenu += '<option value="'+aLengthMenu[0][i]+'">'+aLengthMenu[1][i]+'</option>';
				}
			}
			else
			{
				for ( i=0, iLen=aLengthMenu.length ; i<iLen ; i++ )
				{
					sStdMenu += '<option value="'+aLengthMenu[i]+'">'+aLengthMenu[i]+'</option>';
				}
			}
			sStdMenu += '</select>';
			
			var nLength = document.createElement( 'div' );
			if ( !oSettings.aanFeatures.l )
			{
				nLength.id = oSettings.sTableId+'_length';
			}
			nLength.className = oSettings.oClasses.sLength;
			nLength.innerHTML = '<label>'+oSettings.oLanguage.sLengthMenu.replace( '_MENU_', sStdMenu )+'</label>';
			
			/*
			 * Set the length to the current display length - thanks to Andrea Pavlovic for this fix,
			 * and Stefan Skopnik for fixing the fix!
			 */
			$('select option[value="'+oSettings._iDisplayLength+'"]', nLength).attr("selected", true);
			
			$('select', nLength).bind( 'change.DT', function(e) {
				var iVal = $(this).val();
				
				/* Update all other length options for the new display */
				var n = oSettings.aanFeatures.l;
				for ( i=0, iLen=n.length ; i<iLen ; i++ )
				{
					if ( n[i] != this.parentNode )
					{
						$('select', n[i]).val( iVal );
					}
				}
				
				/* Redraw the table */
				oSettings._iDisplayLength = parseInt(iVal, 10);
				_fnCalculateEnd( oSettings );
				
				/* If we have space to show extra rows (backing up from the end point - then do so */
				if ( oSettings.fnDisplayEnd() == oSettings.fnRecordsDisplay() )
				{
					oSettings._iDisplayStart = oSettings.fnDisplayEnd() - oSettings._iDisplayLength;
					if ( oSettings._iDisplayStart < 0 )
					{
						oSettings._iDisplayStart = 0;
					}
				}
				
				if ( oSettings._iDisplayLength == -1 )
				{
					oSettings._iDisplayStart = 0;
				}
				
				_fnDraw( oSettings );
			} );
		
		
			$('select', nLength).attr('aria-controls', oSettings.sTableId);
			
			return nLength;
		}
		
		
		/**
		 * Recalculate the end point based on the start point
		 *  @param {object} oSettings dataTables settings object
		 *  @memberof DataTable#oApi
		 */
		function _fnCalculateEnd( oSettings )
		{
			if ( oSettings.oFeatures.bPaginate === false )
			{
				oSettings._iDisplayEnd = oSettings.aiDisplay.length;
			}
			else
			{
				/* Set the end point of the display - based on how many elements there are
				 * still to display
				 */
				if ( oSettings._iDisplayStart + oSettings._iDisplayLength > oSettings.aiDisplay.length ||
					   oSettings._iDisplayLength == -1 )
				{
					oSettings._iDisplayEnd = oSettings.aiDisplay.length;
				}
				else
				{
					oSettings._iDisplayEnd = oSettings._iDisplayStart + oSettings._iDisplayLength;
				}
			}
		}
		
		
		
		/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
		 * Note that most of the paging logic is done in 
		 * DataTable.ext.oPagination
		 */
		
		/**
		 * Generate the node required for default pagination
		 *  @param {object} oSettings dataTables settings object
		 *  @returns {node} Pagination feature node
		 *  @memberof DataTable#oApi
		 */
		function _fnFeatureHtmlPaginate ( oSettings )
		{
			if ( oSettings.oScroll.bInfinite )
			{
				return null;
			}
			
			var nPaginate = document.createElement( 'div' );
			nPaginate.className = oSettings.oClasses.sPaging+oSettings.sPaginationType;
			
			DataTable.ext.oPagination[ oSettings.sPaginationType ].fnInit( oSettings, nPaginate, 
				function( oSettings ) {
					_fnCalculateEnd( oSettings );
					_fnDraw( oSettings );
				}
			);
			
			/* Add a draw callback for the pagination on first instance, to update the paging display */
			if ( !oSettings.aanFeatures.p )
			{
				oSettings.aoDrawCallback.push( {
					"fn": function( oSettings ) {
						DataTable.ext.oPagination[ oSettings.sPaginationType ].fnUpdate( oSettings, function( oSettings ) {
							_fnCalculateEnd( oSettings );
							_fnDraw( oSettings );
						} );
					},
					"sName": "pagination"
				} );
			}
			return nPaginate;
		}
		
		
		/**
		 * Alter the display settings to change the page
		 *  @param {object} oSettings dataTables settings object
		 *  @param {string|int} mAction Paging action to take: "first", "previous", "next" or "last"
		 *    or page number to jump to (integer)
		 *  @returns {bool} true page has changed, false - no change (no effect) eg 'first' on page 1
		 *  @memberof DataTable#oApi
		 */
		function _fnPageChange ( oSettings, mAction )
		{
			var iOldStart = oSettings._iDisplayStart;
			
			if ( typeof mAction === "number" )
			{
				oSettings._iDisplayStart = mAction * oSettings._iDisplayLength;
				if ( oSettings._iDisplayStart > oSettings.fnRecordsDisplay() )
				{
					oSettings._iDisplayStart = 0;
				}
			}
			else if ( mAction == "first" )
			{
				oSettings._iDisplayStart = 0;
			}
			else if ( mAction == "previous" )
			{
				oSettings._iDisplayStart = oSettings._iDisplayLength>=0 ?
					oSettings._iDisplayStart - oSettings._iDisplayLength :
					0;
				
				/* Correct for under-run */
				if ( oSettings._iDisplayStart < 0 )
				{
				  oSettings._iDisplayStart = 0;
				}
			}
			else if ( mAction == "next" )
			{
				if ( oSettings._iDisplayLength >= 0 )
				{
					/* Make sure we are not over running the display array */
					if ( oSettings._iDisplayStart + oSettings._iDisplayLength < oSettings.fnRecordsDisplay() )
					{
						oSettings._iDisplayStart += oSettings._iDisplayLength;
					}
				}
				else
				{
					oSettings._iDisplayStart = 0;
				}
			}
			else if ( mAction == "last" )
			{
				if ( oSettings._iDisplayLength >= 0 )
				{
					var iPages = parseInt( (oSettings.fnRecordsDisplay()-1) / oSettings._iDisplayLength, 10 ) + 1;
					oSettings._iDisplayStart = (iPages-1) * oSettings._iDisplayLength;
				}
				else
				{
					oSettings._iDisplayStart = 0;
				}
			}
			else
			{
				_fnLog( oSettings, 0, "Unknown paging action: "+mAction );
			}
			$(oSettings.oInstance).trigger('page', oSettings);
			
			return iOldStart != oSettings._iDisplayStart;
		}
		
		
		
		/**
		 * Generate the node required for the processing node
		 *  @param {object} oSettings dataTables settings object
		 *  @returns {node} Processing element
		 *  @memberof DataTable#oApi
		 */
		function _fnFeatureHtmlProcessing ( oSettings )
		{
			var nProcessing = document.createElement( 'div' );
			
			if ( !oSettings.aanFeatures.r )
			{
				nProcessing.id = oSettings.sTableId+'_processing';
			}
			nProcessing.innerHTML = oSettings.oLanguage.sProcessing;
			nProcessing.className = oSettings.oClasses.sProcessing;
			oSettings.nTable.parentNode.insertBefore( nProcessing, oSettings.nTable );
			
			return nProcessing;
		}
		
		
		/**
		 * Display or hide the processing indicator
		 *  @param {object} oSettings dataTables settings object
		 *  @param {bool} bShow Show the processing indicator (true) or not (false)
		 *  @memberof DataTable#oApi
		 */
		function _fnProcessingDisplay ( oSettings, bShow )
		{
			if ( oSettings.oFeatures.bProcessing )
			{
				var an = oSettings.aanFeatures.r;
				for ( var i=0, iLen=an.length ; i<iLen ; i++ )
				{
					an[i].style.visibility = bShow ? "visible" : "hidden";
				}
			}
		
			$(oSettings.oInstance).trigger('processing', [oSettings, bShow]);
		}
		
		/**
		 * Add any control elements for the table - specifically scrolling
		 *  @param {object} oSettings dataTables settings object
		 *  @returns {node} Node to add to the DOM
		 *  @memberof DataTable#oApi
		 */
		function _fnFeatureHtmlTable ( oSettings )
		{
			/* Check if scrolling is enabled or not - if not then leave the DOM unaltered */
			if ( oSettings.oScroll.sX === "" && oSettings.oScroll.sY === "" )
			{
				return oSettings.nTable;
			}
			
			/*
			 * The HTML structure that we want to generate in this function is:
			 *  div - nScroller
			 *    div - nScrollHead
			 *      div - nScrollHeadInner
			 *        table - nScrollHeadTable
			 *          thead - nThead
			 *    div - nScrollBody
			 *      table - oSettings.nTable
			 *        thead - nTheadSize
			 *        tbody - nTbody
			 *    div - nScrollFoot
			 *      div - nScrollFootInner
			 *        table - nScrollFootTable
			 *          tfoot - nTfoot
			 */
			var
			 	nScroller = document.createElement('div'),
			 	nScrollHead = document.createElement('div'),
			 	nScrollHeadInner = document.createElement('div'),
			 	nScrollBody = document.createElement('div'),
			 	nScrollFoot = document.createElement('div'),
			 	nScrollFootInner = document.createElement('div'),
			 	nScrollHeadTable = oSettings.nTable.cloneNode(false),
			 	nScrollFootTable = oSettings.nTable.cloneNode(false),
				nThead = oSettings.nTable.getElementsByTagName('thead')[0],
			 	nTfoot = oSettings.nTable.getElementsByTagName('tfoot').length === 0 ? null : 
					oSettings.nTable.getElementsByTagName('tfoot')[0],
				oClasses = oSettings.oClasses;
			
			nScrollHead.appendChild( nScrollHeadInner );
			nScrollFoot.appendChild( nScrollFootInner );
			nScrollBody.appendChild( oSettings.nTable );
			nScroller.appendChild( nScrollHead );
			nScroller.appendChild( nScrollBody );
			nScrollHeadInner.appendChild( nScrollHeadTable );
			nScrollHeadTable.appendChild( nThead );
			if ( nTfoot !== null )
			{
				nScroller.appendChild( nScrollFoot );
				nScrollFootInner.appendChild( nScrollFootTable );
				nScrollFootTable.appendChild( nTfoot );
			}
			
			nScroller.className = oClasses.sScrollWrapper;
			nScrollHead.className = oClasses.sScrollHead;
			nScrollHeadInner.className = oClasses.sScrollHeadInner;
			nScrollBody.className = oClasses.sScrollBody;
			nScrollFoot.className = oClasses.sScrollFoot;
			nScrollFootInner.className = oClasses.sScrollFootInner;
			
			if ( oSettings.oScroll.bAutoCss )
			{
				nScrollHead.style.overflow = "hidden";
				nScrollHead.style.position = "relative";
				nScrollFoot.style.overflow = "hidden";
				nScrollBody.style.overflow = "auto";
			}
			
			nScrollHead.style.border = "0";
			nScrollHead.style.width = "100%";
			nScrollFoot.style.border = "0";
			nScrollHeadInner.style.width = oSettings.oScroll.sXInner !== "" ?
				oSettings.oScroll.sXInner : "100%"; /* will be overwritten */
			
			/* Modify attributes to respect the clones */
			nScrollHeadTable.removeAttribute('id');
			nScrollHeadTable.style.marginLeft = "0";
			oSettings.nTable.style.marginLeft = "0";
			if ( nTfoot !== null )
			{
				nScrollFootTable.removeAttribute('id');
				nScrollFootTable.style.marginLeft = "0";
			}
			
			/* Move caption elements from the body to the header, footer or leave where it is
			 * depending on the configuration. Note that the DTD says there can be only one caption */
			var nCaption = $(oSettings.nTable).children('caption');
			if ( nCaption.length > 0 )
			{
				nCaption = nCaption[0];
				if ( nCaption._captionSide === "top" )
				{
					nScrollHeadTable.appendChild( nCaption );
				}
				else if ( nCaption._captionSide === "bottom" && nTfoot )
				{
					nScrollFootTable.appendChild( nCaption );
				}
			}
			
			/*
			 * Sizing
			 */
			/* When x-scrolling add the width and a scroller to move the header with the body */
			if ( oSettings.oScroll.sX !== "" )
			{
				nScrollHead.style.width = _fnStringToCss( oSettings.oScroll.sX );
				nScrollBody.style.width = _fnStringToCss( oSettings.oScroll.sX );
				
				if ( nTfoot !== null )
				{
					nScrollFoot.style.width = _fnStringToCss( oSettings.oScroll.sX );	
				}
				
				/* When the body is scrolled, then we also want to scroll the headers */
				$(nScrollBody).scroll( function (e) {
					nScrollHead.scrollLeft = this.scrollLeft;
					
					if ( nTfoot !== null )
					{
						nScrollFoot.scrollLeft = this.scrollLeft;
					}
				} );
			}
			
			/* When yscrolling, add the height */
			if ( oSettings.oScroll.sY !== "" )
			{
				nScrollBody.style.height = _fnStringToCss( oSettings.oScroll.sY );
			}
			
			/* Redraw - align columns across the tables */
			oSettings.aoDrawCallback.push( {
				"fn": _fnScrollDraw,
				"sName": "scrolling"
			} );
			
			/* Infinite scrolling event handlers */
			if ( oSettings.oScroll.bInfinite )
			{
				$(nScrollBody).scroll( function() {
					/* Use a blocker to stop scrolling from loading more data while other data is still loading */
					if ( !oSettings.bDrawing && $(this).scrollTop() !== 0 )
					{
						/* Check if we should load the next data set */
						if ( $(this).scrollTop() + $(this).height() > 
							$(oSettings.nTable).height() - oSettings.oScroll.iLoadGap )
						{
							/* Only do the redraw if we have to - we might be at the end of the data */
							if ( oSettings.fnDisplayEnd() < oSettings.fnRecordsDisplay() )
							{
								_fnPageChange( oSettings, 'next' );
								_fnCalculateEnd( oSettings );
								_fnDraw( oSettings );
							}
						}
					}
				} );
			}
			
			oSettings.nScrollHead = nScrollHead;
			oSettings.nScrollFoot = nScrollFoot;
			
			return nScroller;
		}
		
		
		/**
		 * Update the various tables for resizing. It's a bit of a pig this function, but
		 * basically the idea to:
		 *   1. Re-create the table inside the scrolling div
		 *   2. Take live measurements from the DOM
		 *   3. Apply the measurements
		 *   4. Clean up
		 *  @param {object} o dataTables settings object
		 *  @returns {node} Node to add to the DOM
		 *  @memberof DataTable#oApi
		 */
		function _fnScrollDraw ( o )
		{
			var
				nScrollHeadInner = o.nScrollHead.getElementsByTagName('div')[0],
				nScrollHeadTable = nScrollHeadInner.getElementsByTagName('table')[0],
				nScrollBody = o.nTable.parentNode,
				i, iLen, j, jLen, anHeadToSize, anHeadSizers, anFootSizers, anFootToSize, oStyle, iVis,
				nTheadSize, nTfootSize,
				iWidth, aApplied=[], aAppliedFooter=[], iSanityWidth,
				nScrollFootInner = (o.nTFoot !== null) ? o.nScrollFoot.getElementsByTagName('div')[0] : null,
				nScrollFootTable = (o.nTFoot !== null) ? nScrollFootInner.getElementsByTagName('table')[0] : null,
				ie67 = o.oBrowser.bScrollOversize,
				zeroOut = function(nSizer) {
					oStyle = nSizer.style;
					oStyle.paddingTop = "0";
					oStyle.paddingBottom = "0";
					oStyle.borderTopWidth = "0";
					oStyle.borderBottomWidth = "0";
					oStyle.height = 0;
				};
			
			/*
			 * 1. Re-create the table inside the scrolling div
			 */
			
			/* Remove the old minimised thead and tfoot elements in the inner table */
			$(o.nTable).children('thead, tfoot').remove();
		
			/* Clone the current header and footer elements and then place it into the inner table */
			nTheadSize = $(o.nTHead).clone()[0];
			o.nTable.insertBefore( nTheadSize, o.nTable.childNodes[0] );
			anHeadToSize = o.nTHead.getElementsByTagName('tr');
			anHeadSizers = nTheadSize.getElementsByTagName('tr');
			
			if ( o.nTFoot !== null )
			{
				nTfootSize = $(o.nTFoot).clone()[0];
				o.nTable.insertBefore( nTfootSize, o.nTable.childNodes[1] );
				anFootToSize = o.nTFoot.getElementsByTagName('tr');
				anFootSizers = nTfootSize.getElementsByTagName('tr');
			}
			
			/*
			 * 2. Take live measurements from the DOM - do not alter the DOM itself!
			 */
			
			/* Remove old sizing and apply the calculated column widths
			 * Get the unique column headers in the newly created (cloned) header. We want to apply the
			 * calculated sizes to this header
			 */
			if ( o.oScroll.sX === "" )
			{
				nScrollBody.style.width = '100%';
				nScrollHeadInner.parentNode.style.width = '100%';
			}
			
			var nThs = _fnGetUniqueThs( o, nTheadSize );
			for ( i=0, iLen=nThs.length ; i<iLen ; i++ )
			{
				iVis = _fnVisibleToColumnIndex( o, i );
				nThs[i].style.width = o.aoColumns[iVis].sWidth;
			}
			
			if ( o.nTFoot !== null )
			{
				_fnApplyToChildren( function(n) {
					n.style.width = "";
				}, anFootSizers );
			}
		
			// If scroll collapse is enabled, when we put the headers back into the body for sizing, we
			// will end up forcing the scrollbar to appear, making our measurements wrong for when we
			// then hide it (end of this function), so add the header height to the body scroller.
			if ( o.oScroll.bCollapse && o.oScroll.sY !== "" )
			{
				nScrollBody.style.height = (nScrollBody.offsetHeight + o.nTHead.offsetHeight)+"px";
			}
			
			/* Size the table as a whole */
			iSanityWidth = $(o.nTable).outerWidth();
			if ( o.oScroll.sX === "" )
			{
				/* No x scrolling */
				o.nTable.style.width = "100%";
				
				/* I know this is rubbish - but IE7 will make the width of the table when 100% include
				 * the scrollbar - which is shouldn't. When there is a scrollbar we need to take this
				 * into account.
				 */
				if ( ie67 && ($('tbody', nScrollBody).height() > nScrollBody.offsetHeight || 
					$(nScrollBody).css('overflow-y') == "scroll")  )
				{
					o.nTable.style.width = _fnStringToCss( $(o.nTable).outerWidth() - o.oScroll.iBarWidth);
				}
			}
			else
			{
				if ( o.oScroll.sXInner !== "" )
				{
					/* x scroll inner has been given - use it */
					o.nTable.style.width = _fnStringToCss(o.oScroll.sXInner);
				}
				else if ( iSanityWidth == $(nScrollBody).width() &&
				   $(nScrollBody).height() < $(o.nTable).height() )
				{
					/* There is y-scrolling - try to take account of the y scroll bar */
					o.nTable.style.width = _fnStringToCss( iSanityWidth-o.oScroll.iBarWidth );
					if ( $(o.nTable).outerWidth() > iSanityWidth-o.oScroll.iBarWidth )
					{
						/* Not possible to take account of it */
						o.nTable.style.width = _fnStringToCss( iSanityWidth );
					}
				}
				else
				{
					/* All else fails */
					o.nTable.style.width = _fnStringToCss( iSanityWidth );
				}
			}
			
			/* Recalculate the sanity width - now that we've applied the required width, before it was
			 * a temporary variable. This is required because the column width calculation is done
			 * before this table DOM is created.
			 */
			iSanityWidth = $(o.nTable).outerWidth();
			
			/* We want the hidden header to have zero height, so remove padding and borders. Then
			 * set the width based on the real headers
			 */
			
			// Apply all styles in one pass. Invalidates layout only once because we don't read any 
			// DOM properties.
			_fnApplyToChildren( zeroOut, anHeadSizers );
			 
			// Read all widths in next pass. Forces layout only once because we do not change 
			// any DOM properties.
			_fnApplyToChildren( function(nSizer) {
				aApplied.push( _fnStringToCss( $(nSizer).width() ) );
			}, anHeadSizers );
			 
			// Apply all widths in final pass. Invalidates layout only once because we do not
			// read any DOM properties.
			_fnApplyToChildren( function(nToSize, i) {
				nToSize.style.width = aApplied[i];
			}, anHeadToSize );
		
			$(anHeadSizers).height(0);
			
			/* Same again with the footer if we have one */
			if ( o.nTFoot !== null )
			{
				_fnApplyToChildren( zeroOut, anFootSizers );
				 
				_fnApplyToChildren( function(nSizer) {
					aAppliedFooter.push( _fnStringToCss( $(nSizer).width() ) );
				}, anFootSizers );
				 
				_fnApplyToChildren( function(nToSize, i) {
					nToSize.style.width = aAppliedFooter[i];
				}, anFootToSize );
		
				$(anFootSizers).height(0);
			}
			
			/*
			 * 3. Apply the measurements
			 */
			
			/* "Hide" the header and footer that we used for the sizing. We want to also fix their width
			 * to what they currently are
			 */
			_fnApplyToChildren( function(nSizer, i) {
				nSizer.innerHTML = "";
				nSizer.style.width = aApplied[i];
			}, anHeadSizers );
			
			if ( o.nTFoot !== null )
			{
				_fnApplyToChildren( function(nSizer, i) {
					nSizer.innerHTML = "";
					nSizer.style.width = aAppliedFooter[i];
				}, anFootSizers );
			}
			
			/* Sanity check that the table is of a sensible width. If not then we are going to get
			 * misalignment - try to prevent this by not allowing the table to shrink below its min width
			 */
			if ( $(o.nTable).outerWidth() < iSanityWidth )
			{
				/* The min width depends upon if we have a vertical scrollbar visible or not */
				var iCorrection = ((nScrollBody.scrollHeight > nScrollBody.offsetHeight || 
					$(nScrollBody).css('overflow-y') == "scroll")) ?
						iSanityWidth+o.oScroll.iBarWidth : iSanityWidth;
				
				/* IE6/7 are a law unto themselves... */
				if ( ie67 && (nScrollBody.scrollHeight > 
					nScrollBody.offsetHeight || $(nScrollBody).css('overflow-y') == "scroll")  )
				{
					o.nTable.style.width = _fnStringToCss( iCorrection-o.oScroll.iBarWidth );
				}
				
				/* Apply the calculated minimum width to the table wrappers */
				nScrollBody.style.width = _fnStringToCss( iCorrection );
				o.nScrollHead.style.width = _fnStringToCss( iCorrection );
				
				if ( o.nTFoot !== null )
				{
					o.nScrollFoot.style.width = _fnStringToCss( iCorrection );
				}
				
				/* And give the user a warning that we've stopped the table getting too small */
				if ( o.oScroll.sX === "" )
				{
					_fnLog( o, 1, "The table cannot fit into the current element which will cause column"+
						" misalignment. The table has been drawn at its minimum possible width." );
				}
				else if ( o.oScroll.sXInner !== "" )
				{
					_fnLog( o, 1, "The table cannot fit into the current element which will cause column"+
						" misalignment. Increase the sScrollXInner value or remove it to allow automatic"+
						" calculation" );
				}
			}
			else
			{
				nScrollBody.style.width = _fnStringToCss( '100%' );
				o.nScrollHead.style.width = _fnStringToCss( '100%' );
				
				if ( o.nTFoot !== null )
				{
					o.nScrollFoot.style.width = _fnStringToCss( '100%' );
				}
			}
			
			
			/*
			 * 4. Clean up
			 */
			if ( o.oScroll.sY === "" )
			{
				/* IE7< puts a vertical scrollbar in place (when it shouldn't be) due to subtracting
				 * the scrollbar height from the visible display, rather than adding it on. We need to
				 * set the height in order to sort this. Don't want to do it in any other browsers.
				 */
				if ( ie67 )
				{
					nScrollBody.style.height = _fnStringToCss( o.nTable.offsetHeight+o.oScroll.iBarWidth );
				}
			}
			
			if ( o.oScroll.sY !== "" && o.oScroll.bCollapse )
			{
				nScrollBody.style.height = _fnStringToCss( o.oScroll.sY );
				
				var iExtra = (o.oScroll.sX !== "" && o.nTable.offsetWidth > nScrollBody.offsetWidth) ?
				 	o.oScroll.iBarWidth : 0;
				if ( o.nTable.offsetHeight < nScrollBody.offsetHeight )
				{
					nScrollBody.style.height = _fnStringToCss( o.nTable.offsetHeight+iExtra );
				}
			}
			
			/* Finally set the width's of the header and footer tables */
			var iOuterWidth = $(o.nTable).outerWidth();
			nScrollHeadTable.style.width = _fnStringToCss( iOuterWidth );
			nScrollHeadInner.style.width = _fnStringToCss( iOuterWidth );
		
			// Figure out if there are scrollbar present - if so then we need a the header and footer to
			// provide a bit more space to allow "overflow" scrolling (i.e. past the scrollbar)
			var bScrolling = $(o.nTable).height() > nScrollBody.clientHeight || $(nScrollBody).css('overflow-y') == "scroll";
			nScrollHeadInner.style.paddingRight = bScrolling ? o.oScroll.iBarWidth+"px" : "0px";
			
			if ( o.nTFoot !== null )
			{
				nScrollFootTable.style.width = _fnStringToCss( iOuterWidth );
				nScrollFootInner.style.width = _fnStringToCss( iOuterWidth );
				nScrollFootInner.style.paddingRight = bScrolling ? o.oScroll.iBarWidth+"px" : "0px";
			}
		
			/* Adjust the position of the header in case we loose the y-scrollbar */
			$(nScrollBody).scroll();
			
			/* If sorting or filtering has occurred, jump the scrolling back to the top */
			if ( o.bSorted || o.bFiltered )
			{
				nScrollBody.scrollTop = 0;
			}
		}
		
		
		/**
		 * Apply a given function to the display child nodes of an element array (typically
		 * TD children of TR rows
		 *  @param {function} fn Method to apply to the objects
		 *  @param array {nodes} an1 List of elements to look through for display children
		 *  @param array {nodes} an2 Another list (identical structure to the first) - optional
		 *  @memberof DataTable#oApi
		 */
		function _fnApplyToChildren( fn, an1, an2 )
		{
			var index=0, i=0, iLen=an1.length;
			var nNode1, nNode2;
		
			while ( i < iLen )
			{
				nNode1 = an1[i].firstChild;
				nNode2 = an2 ? an2[i].firstChild : null;
				while ( nNode1 )
				{
					if ( nNode1.nodeType === 1 )
					{
						if ( an2 )
						{
							fn( nNode1, nNode2, index );
						}
						else
						{
							fn( nNode1, index );
						}
						index++;
					}
					nNode1 = nNode1.nextSibling;
					nNode2 = an2 ? nNode2.nextSibling : null;
				}
				i++;
			}
		}
		
		/**
		 * Convert a CSS unit width to pixels (e.g. 2em)
		 *  @param {string} sWidth width to be converted
		 *  @param {node} nParent parent to get the with for (required for relative widths) - optional
		 *  @returns {int} iWidth width in pixels
		 *  @memberof DataTable#oApi
		 */
		function _fnConvertToWidth ( sWidth, nParent )
		{
			if ( !sWidth || sWidth === null || sWidth === '' )
			{
				return 0;
			}
			
			if ( !nParent )
			{
				nParent = document.body;
			}
			
			var iWidth;
			var nTmp = document.createElement( "div" );
			nTmp.style.width = _fnStringToCss( sWidth );
			
			nParent.appendChild( nTmp );
			iWidth = nTmp.offsetWidth;
			nParent.removeChild( nTmp );
			
			return ( iWidth );
		}
		
		
		/**
		 * Calculate the width of columns for the table
		 *  @param {object} oSettings dataTables settings object
		 *  @memberof DataTable#oApi
		 */
		function _fnCalculateColumnWidths ( oSettings )
		{
			var iTableWidth = oSettings.nTable.offsetWidth;
			var iUserInputs = 0;
			var iTmpWidth;
			var iVisibleColumns = 0;
			var iColums = oSettings.aoColumns.length;
			var i, iIndex, iCorrector, iWidth;
			var oHeaders = $('th', oSettings.nTHead);
			var widthAttr = oSettings.nTable.getAttribute('width');
			var nWrapper = oSettings.nTable.parentNode;
			
			/* Convert any user input sizes into pixel sizes */
			for ( i=0 ; i<iColums ; i++ )
			{
				if ( oSettings.aoColumns[i].bVisible )
				{
					iVisibleColumns++;
					
					if ( oSettings.aoColumns[i].sWidth !== null )
					{
						iTmpWidth = _fnConvertToWidth( oSettings.aoColumns[i].sWidthOrig, 
							nWrapper );
						if ( iTmpWidth !== null )
						{
							oSettings.aoColumns[i].sWidth = _fnStringToCss( iTmpWidth );
						}
							
						iUserInputs++;
					}
				}
			}
			
			/* If the number of columns in the DOM equals the number that we have to process in 
			 * DataTables, then we can use the offsets that are created by the web-browser. No custom 
			 * sizes can be set in order for this to happen, nor scrolling used
			 */
			if ( iColums == oHeaders.length && iUserInputs === 0 && iVisibleColumns == iColums &&
				oSettings.oScroll.sX === "" && oSettings.oScroll.sY === "" )
			{
				for ( i=0 ; i<oSettings.aoColumns.length ; i++ )
				{
					iTmpWidth = $(oHeaders[i]).width();
					if ( iTmpWidth !== null )
					{
						oSettings.aoColumns[i].sWidth = _fnStringToCss( iTmpWidth );
					}
				}
			}
			else
			{
				/* Otherwise we are going to have to do some calculations to get the width of each column.
				 * Construct a 1 row table with the widest node in the data, and any user defined widths,
				 * then insert it into the DOM and allow the browser to do all the hard work of
				 * calculating table widths.
				 */
				var
					nCalcTmp = oSettings.nTable.cloneNode( false ),
					nTheadClone = oSettings.nTHead.cloneNode(true),
					nBody = document.createElement( 'tbody' ),
					nTr = document.createElement( 'tr' ),
					nDivSizing;
				
				nCalcTmp.removeAttribute( "id" );
				nCalcTmp.appendChild( nTheadClone );
				if ( oSettings.nTFoot !== null )
				{
					nCalcTmp.appendChild( oSettings.nTFoot.cloneNode(true) );
					_fnApplyToChildren( function(n) {
						n.style.width = "";
					}, nCalcTmp.getElementsByTagName('tr') );
				}
				
				nCalcTmp.appendChild( nBody );
				nBody.appendChild( nTr );
				
				/* Remove any sizing that was previously applied by the styles */
				var jqColSizing = $('thead th', nCalcTmp);
				if ( jqColSizing.length === 0 )
				{
					jqColSizing = $('tbody tr:eq(0)>td', nCalcTmp);
				}
		
				/* Apply custom sizing to the cloned header */
				var nThs = _fnGetUniqueThs( oSettings, nTheadClone );
				iCorrector = 0;
				for ( i=0 ; i<iColums ; i++ )
				{
					var oColumn = oSettings.aoColumns[i];
					if ( oColumn.bVisible && oColumn.sWidthOrig !== null && oColumn.sWidthOrig !== "" )
					{
						nThs[i-iCorrector].style.width = _fnStringToCss( oColumn.sWidthOrig );
					}
					else if ( oColumn.bVisible )
					{
						nThs[i-iCorrector].style.width = "";
					}
					else
					{
						iCorrector++;
					}
				}
		
				/* Find the biggest td for each column and put it into the table */
				for ( i=0 ; i<iColums ; i++ )
				{
					if ( oSettings.aoColumns[i].bVisible )
					{
						var nTd = _fnGetWidestNode( oSettings, i );
						if ( nTd !== null )
						{
							nTd = nTd.cloneNode(true);
							if ( oSettings.aoColumns[i].sContentPadding !== "" )
							{
								nTd.innerHTML += oSettings.aoColumns[i].sContentPadding;
							}
							nTr.appendChild( nTd );
						}
					}
				}
				
				/* Build the table and 'display' it */
				nWrapper.appendChild( nCalcTmp );
				
				/* When scrolling (X or Y) we want to set the width of the table as appropriate. However,
				 * when not scrolling leave the table width as it is. This results in slightly different,
				 * but I think correct behaviour
				 */
				if ( oSettings.oScroll.sX !== "" && oSettings.oScroll.sXInner !== "" )
				{
					nCalcTmp.style.width = _fnStringToCss(oSettings.oScroll.sXInner);
				}
				else if ( oSettings.oScroll.sX !== "" )
				{
					nCalcTmp.style.width = "";
					if ( $(nCalcTmp).width() < nWrapper.offsetWidth )
					{
						nCalcTmp.style.width = _fnStringToCss( nWrapper.offsetWidth );
					}
				}
				else if ( oSettings.oScroll.sY !== "" )
				{
					nCalcTmp.style.width = _fnStringToCss( nWrapper.offsetWidth );
				}
				else if ( widthAttr )
				{
					nCalcTmp.style.width = _fnStringToCss( widthAttr );
				}
				nCalcTmp.style.visibility = "hidden";
				
				/* Scrolling considerations */
				_fnScrollingWidthAdjust( oSettings, nCalcTmp );
				
				/* Read the width's calculated by the browser and store them for use by the caller. We
				 * first of all try to use the elements in the body, but it is possible that there are
				 * no elements there, under which circumstances we use the header elements
				 */
				var oNodes = $("tbody tr:eq(0)", nCalcTmp).children();
				if ( oNodes.length === 0 )
				{
					oNodes = _fnGetUniqueThs( oSettings, $('thead', nCalcTmp)[0] );
				}
		
				/* Browsers need a bit of a hand when a width is assigned to any columns when 
				 * x-scrolling as they tend to collapse the table to the min-width, even if
				 * we sent the column widths. So we need to keep track of what the table width
				 * should be by summing the user given values, and the automatic values
				 */
				if ( oSettings.oScroll.sX !== "" )
				{
					var iTotal = 0;
					iCorrector = 0;
					for ( i=0 ; i<oSettings.aoColumns.length ; i++ )
					{
						if ( oSettings.aoColumns[i].bVisible )
						{
							if ( oSettings.aoColumns[i].sWidthOrig === null )
							{
								iTotal += $(oNodes[iCorrector]).outerWidth();
							}
							else
							{
								iTotal += parseInt(oSettings.aoColumns[i].sWidth.replace('px',''), 10) +
									($(oNodes[iCorrector]).outerWidth() - $(oNodes[iCorrector]).width());
							}
							iCorrector++;
						}
					}
					
					nCalcTmp.style.width = _fnStringToCss( iTotal );
					oSettings.nTable.style.width = _fnStringToCss( iTotal );
				}
		
				iCorrector = 0;
				for ( i=0 ; i<oSettings.aoColumns.length ; i++ )
				{
					if ( oSettings.aoColumns[i].bVisible )
					{
						iWidth = $(oNodes[iCorrector]).width();
						if ( iWidth !== null && iWidth > 0 )
						{
							oSettings.aoColumns[i].sWidth = _fnStringToCss( iWidth );
						}
						iCorrector++;
					}
				}
		
				var cssWidth = $(nCalcTmp).css('width');
				oSettings.nTable.style.width = (cssWidth.indexOf('%') !== -1) ?
				    cssWidth : _fnStringToCss( $(nCalcTmp).outerWidth() );
				nCalcTmp.parentNode.removeChild( nCalcTmp );
			}
		
			if ( widthAttr )
			{
				oSettings.nTable.style.width = _fnStringToCss( widthAttr );
			}
		}
		
		
		/**
		 * Adjust a table's width to take account of scrolling
		 *  @param {object} oSettings dataTables settings object
		 *  @param {node} n table node
		 *  @memberof DataTable#oApi
		 */
		function _fnScrollingWidthAdjust ( oSettings, n )
		{
			if ( oSettings.oScroll.sX === "" && oSettings.oScroll.sY !== "" )
			{
				/* When y-scrolling only, we want to remove the width of the scroll bar so the table
				 * + scroll bar will fit into the area avaialble.
				 */
				var iOrigWidth = $(n).width();
				n.style.width = _fnStringToCss( $(n).outerWidth()-oSettings.oScroll.iBarWidth );
			}
			else if ( oSettings.oScroll.sX !== "" )
			{
				/* When x-scrolling both ways, fix the table at it's current size, without adjusting */
				n.style.width = _fnStringToCss( $(n).outerWidth() );
			}
		}
		
		
		/**
		 * Get the widest node
		 *  @param {object} oSettings dataTables settings object
		 *  @param {int} iCol column of interest
		 *  @returns {node} widest table node
		 *  @memberof DataTable#oApi
		 */
		function _fnGetWidestNode( oSettings, iCol )
		{
			var iMaxIndex = _fnGetMaxLenString( oSettings, iCol );
			if ( iMaxIndex < 0 )
			{
				return null;
			}
		
			if ( oSettings.aoData[iMaxIndex].nTr === null )
			{
				var n = document.createElement('td');
				n.innerHTML = _fnGetCellData( oSettings, iMaxIndex, iCol, '' );
				return n;
			}
			return _fnGetTdNodes(oSettings, iMaxIndex)[iCol];
		}
		
		
		/**
		 * Get the maximum strlen for each data column
		 *  @param {object} oSettings dataTables settings object
		 *  @param {int} iCol column of interest
		 *  @returns {string} max string length for each column
		 *  @memberof DataTable#oApi
		 */
		function _fnGetMaxLenString( oSettings, iCol )
		{
			var iMax = -1;
			var iMaxIndex = -1;
			
			for ( var i=0 ; i<oSettings.aoData.length ; i++ )
			{
				var s = _fnGetCellData( oSettings, i, iCol, 'display' )+"";
				s = s.replace( /<.*?>/g, "" );
				if ( s.length > iMax )
				{
					iMax = s.length;
					iMaxIndex = i;
				}
			}
			
			return iMaxIndex;
		}
		
		
		/**
		 * Append a CSS unit (only if required) to a string
		 *  @param {array} aArray1 first array
		 *  @param {array} aArray2 second array
		 *  @returns {int} 0 if match, 1 if length is different, 2 if no match
		 *  @memberof DataTable#oApi
		 */
		function _fnStringToCss( s )
		{
			if ( s === null )
			{
				return "0px";
			}
			
			if ( typeof s == 'number' )
			{
				if ( s < 0 )
				{
					return "0px";
				}
				return s+"px";
			}
			
			/* Check if the last character is not 0-9 */
			var c = s.charCodeAt( s.length-1 );
			if (c < 0x30 || c > 0x39)
			{
				return s;
			}
			return s+"px";
		}
		
		
		/**
		 * Get the width of a scroll bar in this browser being used
		 *  @returns {int} width in pixels
		 *  @memberof DataTable#oApi
		 */
		function _fnScrollBarWidth ()
		{  
			var inner = document.createElement('p');
			var style = inner.style;
			style.width = "100%";
			style.height = "200px";
			style.padding = "0px";
			
			var outer = document.createElement('div');
			style = outer.style;
			style.position = "absolute";
			style.top = "0px";
			style.left = "0px";
			style.visibility = "hidden";
			style.width = "200px";
			style.height = "150px";
			style.padding = "0px";
			style.overflow = "hidden";
			outer.appendChild(inner);
			
			document.body.appendChild(outer);
			var w1 = inner.offsetWidth;
			outer.style.overflow = 'scroll';
			var w2 = inner.offsetWidth;
			if ( w1 == w2 )
			{
				w2 = outer.clientWidth;
			}
			
			document.body.removeChild(outer);
			return (w1 - w2);  
		}
		
		/**
		 * Change the order of the table
		 *  @param {object} oSettings dataTables settings object
		 *  @param {bool} bApplyClasses optional - should we apply classes or not
		 *  @memberof DataTable#oApi
		 */
		function _fnSort ( oSettings, bApplyClasses )
		{
			var
				i, iLen, j, jLen, k, kLen,
				sDataType, nTh,
				aaSort = [],
			 	aiOrig = [],
				oSort = DataTable.ext.oSort,
				aoData = oSettings.aoData,
				aoColumns = oSettings.aoColumns,
				oAria = oSettings.oLanguage.oAria;
			
			/* No sorting required if server-side or no sorting array */
			if ( !oSettings.oFeatures.bServerSide && 
				(oSettings.aaSorting.length !== 0 || oSettings.aaSortingFixed !== null) )
			{
				aaSort = ( oSettings.aaSortingFixed !== null ) ?
					oSettings.aaSortingFixed.concat( oSettings.aaSorting ) :
					oSettings.aaSorting.slice();
				
				/* If there is a sorting data type, and a function belonging to it, then we need to
				 * get the data from the developer's function and apply it for this column
				 */
				for ( i=0 ; i<aaSort.length ; i++ )
				{
					var iColumn = aaSort[i][0];
					var iVisColumn = _fnColumnIndexToVisible( oSettings, iColumn );
					sDataType = oSettings.aoColumns[ iColumn ].sSortDataType;
					if ( DataTable.ext.afnSortData[sDataType] )
					{
						var aData = DataTable.ext.afnSortData[sDataType].call( 
							oSettings.oInstance, oSettings, iColumn, iVisColumn
						);
						if ( aData.length === aoData.length )
						{
							for ( j=0, jLen=aoData.length ; j<jLen ; j++ )
							{
								_fnSetCellData( oSettings, j, iColumn, aData[j] );
							}
						}
						else
						{
							_fnLog( oSettings, 0, "Returned data sort array (col "+iColumn+") is the wrong length" );
						}
					}
				}
				
				/* Create a value - key array of the current row positions such that we can use their
				 * current position during the sort, if values match, in order to perform stable sorting
				 */
				for ( i=0, iLen=oSettings.aiDisplayMaster.length ; i<iLen ; i++ )
				{
					aiOrig[ oSettings.aiDisplayMaster[i] ] = i;
				}
		
				/* Build an internal data array which is specific to the sort, so we can get and prep
				 * the data to be sorted only once, rather than needing to do it every time the sorting
				 * function runs. This make the sorting function a very simple comparison
				 */
				var iSortLen = aaSort.length;
				var fnSortFormat, aDataSort;
				for ( i=0, iLen=aoData.length ; i<iLen ; i++ )
				{
					for ( j=0 ; j<iSortLen ; j++ )
					{
						aDataSort = aoColumns[ aaSort[j][0] ].aDataSort;
		
						for ( k=0, kLen=aDataSort.length ; k<kLen ; k++ )
						{
							sDataType = aoColumns[ aDataSort[k] ].sType;
							fnSortFormat = oSort[ (sDataType ? sDataType : 'string')+"-pre" ];
							
							aoData[i]._aSortData[ aDataSort[k] ] = fnSortFormat ?
								fnSortFormat( _fnGetCellData( oSettings, i, aDataSort[k], 'sort' ) ) :
								_fnGetCellData( oSettings, i, aDataSort[k], 'sort' );
						}
					}
				}
				
				/* Do the sort - here we want multi-column sorting based on a given data source (column)
				 * and sorting function (from oSort) in a certain direction. It's reasonably complex to
				 * follow on it's own, but this is what we want (example two column sorting):
				 *  fnLocalSorting = function(a,b){
				 *  	var iTest;
				 *  	iTest = oSort['string-asc']('data11', 'data12');
				 *  	if (iTest !== 0)
				 *  		return iTest;
				 *    iTest = oSort['numeric-desc']('data21', 'data22');
				 *    if (iTest !== 0)
				 *  		return iTest;
				 *  	return oSort['numeric-asc']( aiOrig[a], aiOrig[b] );
				 *  }
				 * Basically we have a test for each sorting column, if the data in that column is equal,
				 * test the next column. If all columns match, then we use a numeric sort on the row 
				 * positions in the original data array to provide a stable sort.
				 */
				oSettings.aiDisplayMaster.sort( function ( a, b ) {
					var k, l, lLen, iTest, aDataSort, sDataType;
					for ( k=0 ; k<iSortLen ; k++ )
					{
						aDataSort = aoColumns[ aaSort[k][0] ].aDataSort;
		
						for ( l=0, lLen=aDataSort.length ; l<lLen ; l++ )
						{
							sDataType = aoColumns[ aDataSort[l] ].sType;
							
							iTest = oSort[ (sDataType ? sDataType : 'string')+"-"+aaSort[k][1] ](
								aoData[a]._aSortData[ aDataSort[l] ],
								aoData[b]._aSortData[ aDataSort[l] ]
							);
						
							if ( iTest !== 0 )
							{
								return iTest;
							}
						}
					}
					
					return oSort['numeric-asc']( aiOrig[a], aiOrig[b] );
				} );
			}
			
			/* Alter the sorting classes to take account of the changes */
			if ( (bApplyClasses === undefined || bApplyClasses) && !oSettings.oFeatures.bDeferRender )
			{
				_fnSortingClasses( oSettings );
			}
		
			for ( i=0, iLen=oSettings.aoColumns.length ; i<iLen ; i++ )
			{
				var sTitle = aoColumns[i].sTitle.replace( /<.*?>/g, "" );
				nTh = aoColumns[i].nTh;
				nTh.removeAttribute('aria-sort');
				nTh.removeAttribute('aria-label');
				
				/* In ARIA only the first sorting column can be marked as sorting - no multi-sort option */
				if ( aoColumns[i].bSortable )
				{
					if ( aaSort.length > 0 && aaSort[0][0] == i )
					{
						nTh.setAttribute('aria-sort', aaSort[0][1]=="asc" ? "ascending" : "descending" );
						
						var nextSort = (aoColumns[i].asSorting[ aaSort[0][2]+1 ]) ? 
							aoColumns[i].asSorting[ aaSort[0][2]+1 ] : aoColumns[i].asSorting[0];
						nTh.setAttribute('aria-label', sTitle+
							(nextSort=="asc" ? oAria.sSortAscending : oAria.sSortDescending) );
					}
					else
					{
						nTh.setAttribute('aria-label', sTitle+
							(aoColumns[i].asSorting[0]=="asc" ? oAria.sSortAscending : oAria.sSortDescending) );
					}
				}
				else
				{
					nTh.setAttribute('aria-label', sTitle);
				}
			}
			
			/* Tell the draw function that we have sorted the data */
			oSettings.bSorted = true;
			$(oSettings.oInstance).trigger('sort', oSettings);
			
			/* Copy the master data into the draw array and re-draw */
			if ( oSettings.oFeatures.bFilter )
			{
				/* _fnFilter() will redraw the table for us */
				_fnFilterComplete( oSettings, oSettings.oPreviousSearch, 1 );
			}
			else
			{
				oSettings.aiDisplay = oSettings.aiDisplayMaster.slice();
				oSettings._iDisplayStart = 0; /* reset display back to page 0 */
				_fnCalculateEnd( oSettings );
				_fnDraw( oSettings );
			}
		}
		
		
		/**
		 * Attach a sort handler (click) to a node
		 *  @param {object} oSettings dataTables settings object
		 *  @param {node} nNode node to attach the handler to
		 *  @param {int} iDataIndex column sorting index
		 *  @param {function} [fnCallback] callback function
		 *  @memberof DataTable#oApi
		 */
		function _fnSortAttachListener ( oSettings, nNode, iDataIndex, fnCallback )
		{
			_fnBindAction( nNode, {}, function (e) {
				/* If the column is not sortable - don't to anything */
				if ( oSettings.aoColumns[iDataIndex].bSortable === false )
				{
					return;
				}
				
				/*
				 * This is a little bit odd I admit... I declare a temporary function inside the scope of
				 * _fnBuildHead and the click handler in order that the code presented here can be used 
				 * twice - once for when bProcessing is enabled, and another time for when it is 
				 * disabled, as we need to perform slightly different actions.
				 *   Basically the issue here is that the Javascript engine in modern browsers don't 
				 * appear to allow the rendering engine to update the display while it is still executing
				 * it's thread (well - it does but only after long intervals). This means that the 
				 * 'processing' display doesn't appear for a table sort. To break the js thread up a bit
				 * I force an execution break by using setTimeout - but this breaks the expected 
				 * thread continuation for the end-developer's point of view (their code would execute
				 * too early), so we only do it when we absolutely have to.
				 */
				var fnInnerSorting = function () {
					var iColumn, iNextSort;
					
					/* If the shift key is pressed then we are multiple column sorting */
					if ( e.shiftKey )
					{
						/* Are we already doing some kind of sort on this column? */
						var bFound = false;
						for ( var i=0 ; i<oSettings.aaSorting.length ; i++ )
						{
							if ( oSettings.aaSorting[i][0] == iDataIndex )
							{
								bFound = true;
								iColumn = oSettings.aaSorting[i][0];
								iNextSort = oSettings.aaSorting[i][2]+1;
								
								if ( !oSettings.aoColumns[iColumn].asSorting[iNextSort] )
								{
									/* Reached the end of the sorting options, remove from multi-col sort */
									oSettings.aaSorting.splice( i, 1 );
								}
								else
								{
									/* Move onto next sorting direction */
									oSettings.aaSorting[i][1] = oSettings.aoColumns[iColumn].asSorting[iNextSort];
									oSettings.aaSorting[i][2] = iNextSort;
								}
								break;
							}
						}
						
						/* No sort yet - add it in */
						if ( bFound === false )
						{
							oSettings.aaSorting.push( [ iDataIndex, 
								oSettings.aoColumns[iDataIndex].asSorting[0], 0 ] );
						}
					}
					else
					{
						/* If no shift key then single column sort */
						if ( oSettings.aaSorting.length == 1 && oSettings.aaSorting[0][0] == iDataIndex )
						{
							iColumn = oSettings.aaSorting[0][0];
							iNextSort = oSettings.aaSorting[0][2]+1;
							if ( !oSettings.aoColumns[iColumn].asSorting[iNextSort] )
							{
								iNextSort = 0;
							}
							oSettings.aaSorting[0][1] = oSettings.aoColumns[iColumn].asSorting[iNextSort];
							oSettings.aaSorting[0][2] = iNextSort;
						}
						else
						{
							oSettings.aaSorting.splice( 0, oSettings.aaSorting.length );
							oSettings.aaSorting.push( [ iDataIndex, 
								oSettings.aoColumns[iDataIndex].asSorting[0], 0 ] );
						}
					}
					
					/* Run the sort */
					_fnSort( oSettings );
				}; /* /fnInnerSorting */
				
				if ( !oSettings.oFeatures.bProcessing )
				{
					fnInnerSorting();
				}
				else
				{
					_fnProcessingDisplay( oSettings, true );
					setTimeout( function() {
						fnInnerSorting();
						if ( !oSettings.oFeatures.bServerSide )
						{
							_fnProcessingDisplay( oSettings, false );
						}
					}, 0 );
				}
				
				/* Call the user specified callback function - used for async user interaction */
				if ( typeof fnCallback == 'function' )
				{
					fnCallback( oSettings );
				}
			} );
		}
		
		
		/**
		 * Set the sorting classes on the header, Note: it is safe to call this function 
		 * when bSort and bSortClasses are false
		 *  @param {object} oSettings dataTables settings object
		 *  @memberof DataTable#oApi
		 */
		function _fnSortingClasses( oSettings )
		{
			var i, iLen, j, jLen, iFound;
			var aaSort, sClass;
			var iColumns = oSettings.aoColumns.length;
			var oClasses = oSettings.oClasses;
			
			for ( i=0 ; i<iColumns ; i++ )
			{
				if ( oSettings.aoColumns[i].bSortable )
				{
					$(oSettings.aoColumns[i].nTh).removeClass( oClasses.sSortAsc +" "+ oClasses.sSortDesc +
						" "+ oSettings.aoColumns[i].sSortingClass );
				}
			}
			
			if ( oSettings.aaSortingFixed !== null )
			{
				aaSort = oSettings.aaSortingFixed.concat( oSettings.aaSorting );
			}
			else
			{
				aaSort = oSettings.aaSorting.slice();
			}
			
			/* Apply the required classes to the header */
			for ( i=0 ; i<oSettings.aoColumns.length ; i++ )
			{
				if ( oSettings.aoColumns[i].bSortable )
				{
					sClass = oSettings.aoColumns[i].sSortingClass;
					iFound = -1;
					for ( j=0 ; j<aaSort.length ; j++ )
					{
						if ( aaSort[j][0] == i )
						{
							sClass = ( aaSort[j][1] == "asc" ) ?
								oClasses.sSortAsc : oClasses.sSortDesc;
							iFound = j;
							break;
						}
					}
					$(oSettings.aoColumns[i].nTh).addClass( sClass );
					
					if ( oSettings.bJUI )
					{
						/* jQuery UI uses extra markup */
						var jqSpan = $("span."+oClasses.sSortIcon,  oSettings.aoColumns[i].nTh);
						jqSpan.removeClass(oClasses.sSortJUIAsc +" "+ oClasses.sSortJUIDesc +" "+ 
							oClasses.sSortJUI +" "+ oClasses.sSortJUIAscAllowed +" "+ oClasses.sSortJUIDescAllowed );
						
						var sSpanClass;
						if ( iFound == -1 )
						{
						 	sSpanClass = oSettings.aoColumns[i].sSortingClassJUI;
						}
						else if ( aaSort[iFound][1] == "asc" )
						{
							sSpanClass = oClasses.sSortJUIAsc;
						}
						else
						{
							sSpanClass = oClasses.sSortJUIDesc;
						}
						
						jqSpan.addClass( sSpanClass );
					}
				}
				else
				{
					/* No sorting on this column, so add the base class. This will have been assigned by
					 * _fnAddColumn
					 */
					$(oSettings.aoColumns[i].nTh).addClass( oSettings.aoColumns[i].sSortingClass );
				}
			}
			
			/* 
			 * Apply the required classes to the table body
			 * Note that this is given as a feature switch since it can significantly slow down a sort
			 * on large data sets (adding and removing of classes is always slow at the best of times..)
			 * Further to this, note that this code is admittedly fairly ugly. It could be made a lot 
			 * simpler using jQuery selectors and add/removeClass, but that is significantly slower
			 * (on the order of 5 times slower) - hence the direct DOM manipulation here.
			 * Note that for deferred drawing we do use jQuery - the reason being that taking the first
			 * row found to see if the whole column needs processed can miss classes since the first
			 * column might be new.
			 */
			sClass = oClasses.sSortColumn;
			
			if ( oSettings.oFeatures.bSort && oSettings.oFeatures.bSortClasses )
			{
				var nTds = _fnGetTdNodes( oSettings );
				
				/* Determine what the sorting class for each column should be */
				var iClass, iTargetCol;
				var asClasses = [];
				for (i = 0; i < iColumns; i++)
				{
					asClasses.push("");
				}
				for (i = 0, iClass = 1; i < aaSort.length; i++)
				{
					iTargetCol = parseInt( aaSort[i][0], 10 );
					asClasses[iTargetCol] = sClass + iClass;
					
					if ( iClass < 3 )
					{
						iClass++;
					}
				}
				
				/* Make changes to the classes for each cell as needed */
				var reClass = new RegExp(sClass + "[123]");
				var sTmpClass, sCurrentClass, sNewClass;
				for ( i=0, iLen=nTds.length; i<iLen; i++ )
				{
					/* Determine which column we're looking at */
					iTargetCol = i % iColumns;
					
					/* What is the full list of classes now */
					sCurrentClass = nTds[i].className;
					/* What sorting class should be applied? */
					sNewClass = asClasses[iTargetCol];
					/* What would the new full list be if we did a replacement? */
					sTmpClass = sCurrentClass.replace(reClass, sNewClass);
					
					if ( sTmpClass != sCurrentClass )
					{
						/* We changed something */
						nTds[i].className = $.trim( sTmpClass );
					}
					else if ( sNewClass.length > 0 && sCurrentClass.indexOf(sNewClass) == -1 )
					{
						/* We need to add a class */
						nTds[i].className = sCurrentClass + " " + sNewClass;
					}
				}
			}
		}
		
		
		
		/**
		 * Save the state of a table in a cookie such that the page can be reloaded
		 *  @param {object} oSettings dataTables settings object
		 *  @memberof DataTable#oApi
		 */
		function _fnSaveState ( oSettings )
		{
			if ( !oSettings.oFeatures.bStateSave || oSettings.bDestroying )
			{
				return;
			}
		
			/* Store the interesting variables */
			var i, iLen, bInfinite=oSettings.oScroll.bInfinite;
			var oState = {
				"iCreate":      new Date().getTime(),
				"iStart":       (bInfinite ? 0 : oSettings._iDisplayStart),
				"iEnd":         (bInfinite ? oSettings._iDisplayLength : oSettings._iDisplayEnd),
				"iLength":      oSettings._iDisplayLength,
				"aaSorting":    $.extend( true, [], oSettings.aaSorting ),
				"oSearch":      $.extend( true, {}, oSettings.oPreviousSearch ),
				"aoSearchCols": $.extend( true, [], oSettings.aoPreSearchCols ),
				"abVisCols":    []
			};
		
			for ( i=0, iLen=oSettings.aoColumns.length ; i<iLen ; i++ )
			{
				oState.abVisCols.push( oSettings.aoColumns[i].bVisible );
			}
		
			_fnCallbackFire( oSettings, "aoStateSaveParams", 'stateSaveParams', [oSettings, oState] );
			
			oSettings.fnStateSave.call( oSettings.oInstance, oSettings, oState );
		}
		
		
		/**
		 * Attempt to load a saved table state from a cookie
		 *  @param {object} oSettings dataTables settings object
		 *  @param {object} oInit DataTables init object so we can override settings
		 *  @memberof DataTable#oApi
		 */
		function _fnLoadState ( oSettings, oInit )
		{
			if ( !oSettings.oFeatures.bStateSave )
			{
				return;
			}
		
			var oData = oSettings.fnStateLoad.call( oSettings.oInstance, oSettings );
			if ( !oData )
			{
				return;
			}
			
			/* Allow custom and plug-in manipulation functions to alter the saved data set and
			 * cancelling of loading by returning false
			 */
			var abStateLoad = _fnCallbackFire( oSettings, 'aoStateLoadParams', 'stateLoadParams', [oSettings, oData] );
			if ( $.inArray( false, abStateLoad ) !== -1 )
			{
				return;
			}
			
			/* Store the saved state so it might be accessed at any time */
			oSettings.oLoadedState = $.extend( true, {}, oData );
			
			/* Restore key features */
			oSettings._iDisplayStart    = oData.iStart;
			oSettings.iInitDisplayStart = oData.iStart;
			oSettings._iDisplayEnd      = oData.iEnd;
			oSettings._iDisplayLength   = oData.iLength;
			oSettings.aaSorting         = oData.aaSorting.slice();
			oSettings.saved_aaSorting   = oData.aaSorting.slice();
			
			/* Search filtering  */
			$.extend( oSettings.oPreviousSearch, oData.oSearch );
			$.extend( true, oSettings.aoPreSearchCols, oData.aoSearchCols );
			
			/* Column visibility state
			 * Pass back visibility settings to the init handler, but to do not here override
			 * the init object that the user might have passed in
			 */
			oInit.saved_aoColumns = [];
			for ( var i=0 ; i<oData.abVisCols.length ; i++ )
			{
				oInit.saved_aoColumns[i] = {};
				oInit.saved_aoColumns[i].bVisible = oData.abVisCols[i];
			}
		
			_fnCallbackFire( oSettings, 'aoStateLoaded', 'stateLoaded', [oSettings, oData] );
		}
		
		
		/**
		 * Create a new cookie with a value to store the state of a table
		 *  @param {string} sName name of the cookie to create
		 *  @param {string} sValue the value the cookie should take
		 *  @param {int} iSecs duration of the cookie
		 *  @param {string} sBaseName sName is made up of the base + file name - this is the base
		 *  @param {function} fnCallback User definable function to modify the cookie
		 *  @memberof DataTable#oApi
		 */
		function _fnCreateCookie ( sName, sValue, iSecs, sBaseName, fnCallback )
		{
			var date = new Date();
			date.setTime( date.getTime()+(iSecs*1000) );
			
			/* 
			 * Shocking but true - it would appear IE has major issues with having the path not having
			 * a trailing slash on it. We need the cookie to be available based on the path, so we
			 * have to append the file name to the cookie name. Appalling. Thanks to vex for adding the
			 * patch to use at least some of the path
			 */
			var aParts = window.location.pathname.split('/');
			var sNameFile = sName + '_' + aParts.pop().replace(/[\/:]/g,"").toLowerCase();
			var sFullCookie, oData;
			
			if ( fnCallback !== null )
			{
				oData = (typeof $.parseJSON === 'function') ? 
					$.parseJSON( sValue ) : eval( '('+sValue+')' );
				sFullCookie = fnCallback( sNameFile, oData, date.toGMTString(),
					aParts.join('/')+"/" );
			}
			else
			{
				sFullCookie = sNameFile + "=" + encodeURIComponent(sValue) +
					"; expires=" + date.toGMTString() +"; path=" + aParts.join('/')+"/";
			}
			
			/* Are we going to go over the cookie limit of 4KiB? If so, try to delete a cookies
			 * belonging to DataTables.
			 */
			var
				aCookies =document.cookie.split(';'),
				iNewCookieLen = sFullCookie.split(';')[0].length,
				aOldCookies = [];
			
			if ( iNewCookieLen+document.cookie.length+10 > 4096 ) /* Magic 10 for padding */
			{
				for ( var i=0, iLen=aCookies.length ; i<iLen ; i++ )
				{
					if ( aCookies[i].indexOf( sBaseName ) != -1 )
					{
						/* It's a DataTables cookie, so eval it and check the time stamp */
						var aSplitCookie = aCookies[i].split('=');
						try {
							oData = eval( '('+decodeURIComponent(aSplitCookie[1])+')' );
		
							if ( oData && oData.iCreate )
							{
								aOldCookies.push( {
									"name": aSplitCookie[0],
									"time": oData.iCreate
								} );
							}
						}
						catch( e ) {}
					}
				}
		
				// Make sure we delete the oldest ones first
				aOldCookies.sort( function (a, b) {
					return b.time - a.time;
				} );
		
				// Eliminate as many old DataTables cookies as we need to
				while ( iNewCookieLen + document.cookie.length + 10 > 4096 ) {
					if ( aOldCookies.length === 0 ) {
						// Deleted all DT cookies and still not enough space. Can't state save
						return;
					}
					
					var old = aOldCookies.pop();
					document.cookie = old.name+"=; expires=Thu, 01-Jan-1970 00:00:01 GMT; path="+
						aParts.join('/') + "/";
				}
			}
			
			document.cookie = sFullCookie;
		}
		
		
		/**
		 * Read an old cookie to get a cookie with an old table state
		 *  @param {string} sName name of the cookie to read
		 *  @returns {string} contents of the cookie - or null if no cookie with that name found
		 *  @memberof DataTable#oApi
		 */
		function _fnReadCookie ( sName )
		{
			var
				aParts = window.location.pathname.split('/'),
				sNameEQ = sName + '_' + aParts[aParts.length-1].replace(/[\/:]/g,"").toLowerCase() + '=',
			 	sCookieContents = document.cookie.split(';');
			
			for( var i=0 ; i<sCookieContents.length ; i++ )
			{
				var c = sCookieContents[i];
				
				while (c.charAt(0)==' ')
				{
					c = c.substring(1,c.length);
				}
				
				if (c.indexOf(sNameEQ) === 0)
				{
					return decodeURIComponent( c.substring(sNameEQ.length,c.length) );
				}
			}
			return null;
		}
		
		
		/**
		 * Return the settings object for a particular table
		 *  @param {node} nTable table we are using as a dataTable
		 *  @returns {object} Settings object - or null if not found
		 *  @memberof DataTable#oApi
		 */
		function _fnSettingsFromNode ( nTable )
		{
			for ( var i=0 ; i<DataTable.settings.length ; i++ )
			{
				if ( DataTable.settings[i].nTable === nTable )
				{
					return DataTable.settings[i];
				}
			}
			
			return null;
		}
		
		
		/**
		 * Return an array with the TR nodes for the table
		 *  @param {object} oSettings dataTables settings object
		 *  @returns {array} TR array
		 *  @memberof DataTable#oApi
		 */
		function _fnGetTrNodes ( oSettings )
		{
			var aNodes = [];
			var aoData = oSettings.aoData;
			for ( var i=0, iLen=aoData.length ; i<iLen ; i++ )
			{
				if ( aoData[i].nTr !== null )
				{
					aNodes.push( aoData[i].nTr );
				}
			}
			return aNodes;
		}
		
		
		/**
		 * Return an flat array with all TD nodes for the table, or row
		 *  @param {object} oSettings dataTables settings object
		 *  @param {int} [iIndividualRow] aoData index to get the nodes for - optional 
		 *    if not given then the return array will contain all nodes for the table
		 *  @returns {array} TD array
		 *  @memberof DataTable#oApi
		 */
		function _fnGetTdNodes ( oSettings, iIndividualRow )
		{
			var anReturn = [];
			var iCorrector;
			var anTds, nTd;
			var iRow, iRows=oSettings.aoData.length,
				iColumn, iColumns, oData, sNodeName, iStart=0, iEnd=iRows;
			
			/* Allow the collection to be limited to just one row */
			if ( iIndividualRow !== undefined )
			{
				iStart = iIndividualRow;
				iEnd = iIndividualRow+1;
			}
		
			for ( iRow=iStart ; iRow<iEnd ; iRow++ )
			{
				oData = oSettings.aoData[iRow];
				if ( oData.nTr !== null )
				{
					/* get the TD child nodes - taking into account text etc nodes */
					anTds = [];
					nTd = oData.nTr.firstChild;
					while ( nTd )
					{
						sNodeName = nTd.nodeName.toLowerCase();
						if ( sNodeName == 'td' || sNodeName == 'th' )
						{
							anTds.push( nTd );
						}
						nTd = nTd.nextSibling;
					}
		
					iCorrector = 0;
					for ( iColumn=0, iColumns=oSettings.aoColumns.length ; iColumn<iColumns ; iColumn++ )
					{
						if ( oSettings.aoColumns[iColumn].bVisible )
						{
							anReturn.push( anTds[iColumn-iCorrector] );
						}
						else
						{
							anReturn.push( oData._anHidden[iColumn] );
							iCorrector++;
						}
					}
				}
			}
		
			return anReturn;
		}
		
		
		/**
		 * Log an error message
		 *  @param {object} oSettings dataTables settings object
		 *  @param {int} iLevel log error messages, or display them to the user
		 *  @param {string} sMesg error message
		 *  @memberof DataTable#oApi
		 */
		function _fnLog( oSettings, iLevel, sMesg )
		{
			var sAlert = (oSettings===null) ?
				"DataTables warning: "+sMesg :
				"DataTables warning (table id = '"+oSettings.sTableId+"'): "+sMesg;
			
			if ( iLevel === 0 )
			{
				if ( DataTable.ext.sErrMode == 'alert' )
				{
					alert( sAlert );
				}
				else
				{
					throw new Error(sAlert);
				}
				return;
			}
			else if ( window.console && console.log )
			{
				console.log( sAlert );
			}
		}
		
		
		/**
		 * See if a property is defined on one object, if so assign it to the other object
		 *  @param {object} oRet target object
		 *  @param {object} oSrc source object
		 *  @param {string} sName property
		 *  @param {string} [sMappedName] name to map too - optional, sName used if not given
		 *  @memberof DataTable#oApi
		 */
		function _fnMap( oRet, oSrc, sName, sMappedName )
		{
			if ( sMappedName === undefined )
			{
				sMappedName = sName;
			}
			if ( oSrc[sName] !== undefined )
			{
				oRet[sMappedName] = oSrc[sName];
			}
		}
		
		
		/**
		 * Extend objects - very similar to jQuery.extend, but deep copy objects, and shallow
		 * copy arrays. The reason we need to do this, is that we don't want to deep copy array
		 * init values (such as aaSorting) since the dev wouldn't be able to override them, but
		 * we do want to deep copy arrays.
		 *  @param {object} oOut Object to extend
		 *  @param {object} oExtender Object from which the properties will be applied to oOut
		 *  @returns {object} oOut Reference, just for convenience - oOut === the return.
		 *  @memberof DataTable#oApi
		 *  @todo This doesn't take account of arrays inside the deep copied objects.
		 */
		function _fnExtend( oOut, oExtender )
		{
			var val;
			
			for ( var prop in oExtender )
			{
				if ( oExtender.hasOwnProperty(prop) )
				{
					val = oExtender[prop];
		
					if ( typeof oInit[prop] === 'object' && val !== null && $.isArray(val) === false )
					{
						$.extend( true, oOut[prop], val );
					}
					else
					{
						oOut[prop] = val;
					}
				}
			}
		
			return oOut;
		}
		
		
		/**
		 * Bind an event handers to allow a click or return key to activate the callback.
		 * This is good for accessibility since a return on the keyboard will have the
		 * same effect as a click, if the element has focus.
		 *  @param {element} n Element to bind the action to
		 *  @param {object} oData Data object to pass to the triggered function
		 *  @param {function} fn Callback function for when the event is triggered
		 *  @memberof DataTable#oApi
		 */
		function _fnBindAction( n, oData, fn )
		{
			$(n)
				.bind( 'click.DT', oData, function (e) {
						n.blur(); // Remove focus outline for mouse users
						fn(e);
					} )
				.bind( 'keypress.DT', oData, function (e){
					if ( e.which === 13 ) {
						fn(e);
					} } )
				.bind( 'selectstart.DT', function () {
					/* Take the brutal approach to cancelling text selection */
					return false;
					} );
		}
		
		
		/**
		 * Register a callback function. Easily allows a callback function to be added to
		 * an array store of callback functions that can then all be called together.
		 *  @param {object} oSettings dataTables settings object
		 *  @param {string} sStore Name of the array storage for the callbacks in oSettings
		 *  @param {function} fn Function to be called back
		 *  @param {string} sName Identifying name for the callback (i.e. a label)
		 *  @memberof DataTable#oApi
		 */
		function _fnCallbackReg( oSettings, sStore, fn, sName )
		{
			if ( fn )
			{
				oSettings[sStore].push( {
					"fn": fn,
					"sName": sName
				} );
			}
		}
		
		
		/**
		 * Fire callback functions and trigger events. Note that the loop over the callback
		 * array store is done backwards! Further note that you do not want to fire off triggers
		 * in time sensitive applications (for example cell creation) as its slow.
		 *  @param {object} oSettings dataTables settings object
		 *  @param {string} sStore Name of the array storage for the callbacks in oSettings
		 *  @param {string} sTrigger Name of the jQuery custom event to trigger. If null no trigger
		 *    is fired
		 *  @param {array} aArgs Array of arguments to pass to the callback function / trigger
		 *  @memberof DataTable#oApi
		 */
		function _fnCallbackFire( oSettings, sStore, sTrigger, aArgs )
		{
			var aoStore = oSettings[sStore];
			var aRet =[];
		
			for ( var i=aoStore.length-1 ; i>=0 ; i-- )
			{
				aRet.push( aoStore[i].fn.apply( oSettings.oInstance, aArgs ) );
			}
		
			if ( sTrigger !== null )
			{
				$(oSettings.oInstance).trigger(sTrigger, aArgs);
			}
		
			return aRet;
		}
		
		
		/**
		 * JSON stringify. If JSON.stringify it provided by the browser, json2.js or any other
		 * library, then we use that as it is fast, safe and accurate. If the function isn't 
		 * available then we need to built it ourselves - the inspiration for this function comes
		 * from Craig Buckler ( http://www.sitepoint.com/javascript-json-serialization/ ). It is
		 * not perfect and absolutely should not be used as a replacement to json2.js - but it does
		 * do what we need, without requiring a dependency for DataTables.
		 *  @param {object} o JSON object to be converted
		 *  @returns {string} JSON string
		 *  @memberof DataTable#oApi
		 */
		var _fnJsonString = (window.JSON) ? JSON.stringify : function( o )
		{
			/* Not an object or array */
			var sType = typeof o;
			if (sType !== "object" || o === null)
			{
				// simple data type
				if (sType === "string")
				{
					o = '"'+o+'"';
				}
				return o+"";
			}
		
			/* If object or array, need to recurse over it */
			var
				sProp, mValue,
				json = [],
				bArr = $.isArray(o);
			
			for (sProp in o)
			{
				mValue = o[sProp];
				sType = typeof mValue;
		
				if (sType === "string")
				{
					mValue = '"'+mValue+'"';
				}
				else if (sType === "object" && mValue !== null)
				{
					mValue = _fnJsonString(mValue);
				}
		
				json.push((bArr ? "" : '"'+sProp+'":') + mValue);
			}
		
			return (bArr ? "[" : "{") + json + (bArr ? "]" : "}");
		};
		
		
		/**
		 * From some browsers (specifically IE6/7) we need special handling to work around browser
		 * bugs - this function is used to detect when these workarounds are needed.
		 *  @param {object} oSettings dataTables settings object
		 *  @memberof DataTable#oApi
		 */
		function _fnBrowserDetect( oSettings )
		{
			/* IE6/7 will oversize a width 100% element inside a scrolling element, to include the
			 * width of the scrollbar, while other browsers ensure the inner element is contained
			 * without forcing scrolling
			 */
			var n = $(
				'<div style="position:absolute; top:0; left:0; height:1px; width:1px; overflow:hidden">'+
					'<div style="position:absolute; top:1px; left:1px; width:100px; overflow:scroll;">'+
						'<div id="DT_BrowserTest" style="width:100%; height:10px;"></div>'+
					'</div>'+
				'</div>')[0];
		
			document.body.appendChild( n );
			oSettings.oBrowser.bScrollOversize = $('#DT_BrowserTest', n)[0].offsetWidth === 100 ? true : false;
			document.body.removeChild( n );
		}
		

		/**
		 * Perform a jQuery selector action on the table's TR elements (from the tbody) and
		 * return the resulting jQuery object.
		 *  @param {string|node|jQuery} sSelector jQuery selector or node collection to act on
		 *  @param {object} [oOpts] Optional parameters for modifying the rows to be included
		 *  @param {string} [oOpts.filter=none] Select TR elements that meet the current filter
		 *    criterion ("applied") or all TR elements (i.e. no filter).
		 *  @param {string} [oOpts.order=current] Order of the TR elements in the processed array.
		 *    Can be either 'current', whereby the current sorting of the table is used, or
		 *    'original' whereby the original order the data was read into the table is used.
		 *  @param {string} [oOpts.page=all] Limit the selection to the currently displayed page
		 *    ("current") or not ("all"). If 'current' is given, then order is assumed to be 
		 *    'current' and filter is 'applied', regardless of what they might be given as.
		 *  @returns {object} jQuery object, filtered by the given selector.
		 *  @dtopt API
		 *
		 *  @example
		 *    $(document).ready(function() {
		 *      var oTable = $('#example').dataTable();
		 *
		 *      // Highlight every second row
		 *      oTable.$('tr:odd').css('backgroundColor', 'blue');
		 *    } );
		 *
		 *  @example
		 *    $(document).ready(function() {
		 *      var oTable = $('#example').dataTable();
		 *
		 *      // Filter to rows with 'Webkit' in them, add a background colour and then
		 *      // remove the filter, thus highlighting the 'Webkit' rows only.
		 *      oTable.fnFilter('Webkit');
		 *      oTable.$('tr', {"filter": "applied"}).css('backgroundColor', 'blue');
		 *      oTable.fnFilter('');
		 *    } );
		 */
		this.$ = function ( sSelector, oOpts )
		{
			var i, iLen, a = [], tr;
			var oSettings = _fnSettingsFromNode( this[DataTable.ext.iApiIndex] );
			var aoData = oSettings.aoData;
			var aiDisplay = oSettings.aiDisplay;
			var aiDisplayMaster = oSettings.aiDisplayMaster;
		
			if ( !oOpts )
			{
				oOpts = {};
			}
		
			oOpts = $.extend( {}, {
				"filter": "none", // applied
				"order": "current", // "original"
				"page": "all" // current
			}, oOpts );
		
			// Current page implies that order=current and fitler=applied, since it is fairly
			// senseless otherwise
			if ( oOpts.page == 'current' )
			{
				for ( i=oSettings._iDisplayStart, iLen=oSettings.fnDisplayEnd() ; i<iLen ; i++ )
				{
					tr = aoData[ aiDisplay[i] ].nTr;
					if ( tr )
					{
						a.push( tr );
					}
				}
			}
			else if ( oOpts.order == "current" && oOpts.filter == "none" )
			{
				for ( i=0, iLen=aiDisplayMaster.length ; i<iLen ; i++ )
				{
					tr = aoData[ aiDisplayMaster[i] ].nTr;
					if ( tr )
					{
						a.push( tr );
					}
				}
			}
			else if ( oOpts.order == "current" && oOpts.filter == "applied" )
			{
				for ( i=0, iLen=aiDisplay.length ; i<iLen ; i++ )
				{
					tr = aoData[ aiDisplay[i] ].nTr;
					if ( tr )
					{
						a.push( tr );
					}
				}
			}
			else if ( oOpts.order == "original" && oOpts.filter == "none" )
			{
				for ( i=0, iLen=aoData.length ; i<iLen ; i++ )
				{
					tr = aoData[ i ].nTr ;
					if ( tr )
					{
						a.push( tr );
					}
				}
			}
			else if ( oOpts.order == "original" && oOpts.filter == "applied" )
			{
				for ( i=0, iLen=aoData.length ; i<iLen ; i++ )
				{
					tr = aoData[ i ].nTr;
					if ( $.inArray( i, aiDisplay ) !== -1 && tr )
					{
						a.push( tr );
					}
				}
			}
			else
			{
				_fnLog( oSettings, 1, "Unknown selection options" );
			}
		
			/* We need to filter on the TR elements and also 'find' in their descendants
			 * to make the selector act like it would in a full table - so we need
			 * to build both results and then combine them together
			 */
			var jqA = $(a);
			var jqTRs = jqA.filter( sSelector );
			var jqDescendants = jqA.find( sSelector );
		
			return $( [].concat($.makeArray(jqTRs), $.makeArray(jqDescendants)) );
		};
		
		
		/**
		 * Almost identical to $ in operation, but in this case returns the data for the matched
		 * rows - as such, the jQuery selector used should match TR row nodes or TD/TH cell nodes
		 * rather than any descendants, so the data can be obtained for the row/cell. If matching
		 * rows are found, the data returned is the original data array/object that was used to  
		 * create the row (or a generated array if from a DOM source).
		 *
		 * This method is often useful in-combination with $ where both functions are given the
		 * same parameters and the array indexes will match identically.
		 *  @param {string|node|jQuery} sSelector jQuery selector or node collection to act on
		 *  @param {object} [oOpts] Optional parameters for modifying the rows to be included
		 *  @param {string} [oOpts.filter=none] Select elements that meet the current filter
		 *    criterion ("applied") or all elements (i.e. no filter).
		 *  @param {string} [oOpts.order=current] Order of the data in the processed array.
		 *    Can be either 'current', whereby the current sorting of the table is used, or
		 *    'original' whereby the original order the data was read into the table is used.
		 *  @param {string} [oOpts.page=all] Limit the selection to the currently displayed page
		 *    ("current") or not ("all"). If 'current' is given, then order is assumed to be 
		 *    'current' and filter is 'applied', regardless of what they might be given as.
		 *  @returns {array} Data for the matched elements. If any elements, as a result of the
		 *    selector, were not TR, TD or TH elements in the DataTable, they will have a null 
		 *    entry in the array.
		 *  @dtopt API
		 *
		 *  @example
		 *    $(document).ready(function() {
		 *      var oTable = $('#example').dataTable();
		 *
		 *      // Get the data from the first row in the table
		 *      var data = oTable._('tr:first');
		 *
		 *      // Do something useful with the data
		 *      alert( "First cell is: "+data[0] );
		 *    } );
		 *
		 *  @example
		 *    $(document).ready(function() {
		 *      var oTable = $('#example').dataTable();
		 *
		 *      // Filter to 'Webkit' and get all data for 
		 *      oTable.fnFilter('Webkit');
		 *      var data = oTable._('tr', {"filter": "applied"});
		 *      
		 *      // Do something with the data
		 *      alert( data.length+" rows matched the filter" );
		 *    } );
		 */
		this._ = function ( sSelector, oOpts )
		{
			var aOut = [];
			var i, iLen, iIndex;
			var aTrs = this.$( sSelector, oOpts );
		
			for ( i=0, iLen=aTrs.length ; i<iLen ; i++ )
			{
				aOut.push( this.fnGetData(aTrs[i]) );
			}
		
			return aOut;
		};
		
		
		/**
		 * Add a single new row or multiple rows of data to the table. Please note
		 * that this is suitable for client-side processing only - if you are using 
		 * server-side processing (i.e. "bServerSide": true), then to add data, you
		 * must add it to the data source, i.e. the server-side, through an Ajax call.
		 *  @param {array|object} mData The data to be added to the table. This can be:
		 *    <ul>
		 *      <li>1D array of data - add a single row with the data provided</li>
		 *      <li>2D array of arrays - add multiple rows in a single call</li>
		 *      <li>object - data object when using <i>mData</i></li>
		 *      <li>array of objects - multiple data objects when using <i>mData</i></li>
		 *    </ul>
		 *  @param {bool} [bRedraw=true] redraw the table or not
		 *  @returns {array} An array of integers, representing the list of indexes in 
		 *    <i>aoData</i> ({@link DataTable.models.oSettings}) that have been added to 
		 *    the table.
		 *  @dtopt API
		 *
		 *  @example
		 *    // Global var for counter
		 *    var giCount = 2;
		 *    
		 *    $(document).ready(function() {
		 *      $('#example').dataTable();
		 *    } );
		 *    
		 *    function fnClickAddRow() {
		 *      $('#example').dataTable().fnAddData( [
		 *        giCount+".1",
		 *        giCount+".2",
		 *        giCount+".3",
		 *        giCount+".4" ]
		 *      );
		 *        
		 *      giCount++;
		 *    }
		 */
		this.fnAddData = function( mData, bRedraw )
		{
			if ( mData.length === 0 )
			{
				return [];
			}
			
			var aiReturn = [];
			var iTest;
			
			/* Find settings from table node */
			var oSettings = _fnSettingsFromNode( this[DataTable.ext.iApiIndex] );
			
			/* Check if we want to add multiple rows or not */
			if ( typeof mData[0] === "object" && mData[0] !== null )
			{
				for ( var i=0 ; i<mData.length ; i++ )
				{
					iTest = _fnAddData( oSettings, mData[i] );
					if ( iTest == -1 )
					{
						return aiReturn;
					}
					aiReturn.push( iTest );
				}
			}
			else
			{
				iTest = _fnAddData( oSettings, mData );
				if ( iTest == -1 )
				{
					return aiReturn;
				}
				aiReturn.push( iTest );
			}
			
			oSettings.aiDisplay = oSettings.aiDisplayMaster.slice();
			
			if ( bRedraw === undefined || bRedraw )
			{
				_fnReDraw( oSettings );
			}
			return aiReturn;
		};
		
		
		/**
		 * This function will make DataTables recalculate the column sizes, based on the data 
		 * contained in the table and the sizes applied to the columns (in the DOM, CSS or 
		 * through the sWidth parameter). This can be useful when the width of the table's 
		 * parent element changes (for example a window resize).
		 *  @param {boolean} [bRedraw=true] Redraw the table or not, you will typically want to
		 *  @dtopt API
		 *
		 *  @example
		 *    $(document).ready(function() {
		 *      var oTable = $('#example').dataTable( {
		 *        "sScrollY": "200px",
		 *        "bPaginate": false
		 *      } );
		 *      
		 *      $(window).bind('resize', function () {
		 *        oTable.fnAdjustColumnSizing();
		 *      } );
		 *    } );
		 */
		this.fnAdjustColumnSizing = function ( bRedraw )
		{
			var oSettings = _fnSettingsFromNode(this[DataTable.ext.iApiIndex]);
			_fnAdjustColumnSizing( oSettings );
			
			if ( bRedraw === undefined || bRedraw )
			{
				this.fnDraw( false );
			}
			else if ( oSettings.oScroll.sX !== "" || oSettings.oScroll.sY !== "" )
			{
				/* If not redrawing, but scrolling, we want to apply the new column sizes anyway */
				this.oApi._fnScrollDraw(oSettings);
			}
		};
		
		
		/**
		 * Quickly and simply clear a table
		 *  @param {bool} [bRedraw=true] redraw the table or not
		 *  @dtopt API
		 *
		 *  @example
		 *    $(document).ready(function() {
		 *      var oTable = $('#example').dataTable();
		 *      
		 *      // Immediately 'nuke' the current rows (perhaps waiting for an Ajax callback...)
		 *      oTable.fnClearTable();
		 *    } );
		 */
		this.fnClearTable = function( bRedraw )
		{
			/* Find settings from table node */
			var oSettings = _fnSettingsFromNode( this[DataTable.ext.iApiIndex] );
			_fnClearTable( oSettings );
			
			if ( bRedraw === undefined || bRedraw )
			{
				_fnDraw( oSettings );
			}
		};
		
		
		/**
		 * The exact opposite of 'opening' a row, this function will close any rows which 
		 * are currently 'open'.
		 *  @param {node} nTr the table row to 'close'
		 *  @returns {int} 0 on success, or 1 if failed (can't find the row)
		 *  @dtopt API
		 *
		 *  @example
		 *    $(document).ready(function() {
		 *      var oTable;
		 *      
		 *      // 'open' an information row when a row is clicked on
		 *      $('#example tbody tr').click( function () {
		 *        if ( oTable.fnIsOpen(this) ) {
		 *          oTable.fnClose( this );
		 *        } else {
		 *          oTable.fnOpen( this, "Temporary row opened", "info_row" );
		 *        }
		 *      } );
		 *      
		 *      oTable = $('#example').dataTable();
		 *    } );
		 */
		this.fnClose = function( nTr )
		{
			/* Find settings from table node */
			var oSettings = _fnSettingsFromNode( this[DataTable.ext.iApiIndex] );
			
			for ( var i=0 ; i<oSettings.aoOpenRows.length ; i++ )
			{
				if ( oSettings.aoOpenRows[i].nParent == nTr )
				{
					var nTrParent = oSettings.aoOpenRows[i].nTr.parentNode;
					if ( nTrParent )
					{
						/* Remove it if it is currently on display */
						nTrParent.removeChild( oSettings.aoOpenRows[i].nTr );
					}
					oSettings.aoOpenRows.splice( i, 1 );
					return 0;
				}
			}
			return 1;
		};
		
		
		/**
		 * Remove a row for the table
		 *  @param {mixed} mTarget The index of the row from aoData to be deleted, or
		 *    the TR element you want to delete
		 *  @param {function|null} [fnCallBack] Callback function
		 *  @param {bool} [bRedraw=true] Redraw the table or not
		 *  @returns {array} The row that was deleted
		 *  @dtopt API
		 *
		 *  @example
		 *    $(document).ready(function() {
		 *      var oTable = $('#example').dataTable();
		 *      
		 *      // Immediately remove the first row
		 *      oTable.fnDeleteRow( 0 );
		 *    } );
		 */
		this.fnDeleteRow = function( mTarget, fnCallBack, bRedraw )
		{
			/* Find settings from table node */
			var oSettings = _fnSettingsFromNode( this[DataTable.ext.iApiIndex] );
			var i, iLen, iAODataIndex;
			
			iAODataIndex = (typeof mTarget === 'object') ? 
				_fnNodeToDataIndex(oSettings, mTarget) : mTarget;
			
			/* Return the data array from this row */
			var oData = oSettings.aoData.splice( iAODataIndex, 1 );
		
			/* Update the _DT_RowIndex parameter */
			for ( i=0, iLen=oSettings.aoData.length ; i<iLen ; i++ )
			{
				if ( oSettings.aoData[i].nTr !== null )
				{
					oSettings.aoData[i].nTr._DT_RowIndex = i;
				}
			}
			
			/* Remove the target row from the search array */
			var iDisplayIndex = $.inArray( iAODataIndex, oSettings.aiDisplay );
			oSettings.asDataSearch.splice( iDisplayIndex, 1 );
			
			/* Delete from the display arrays */
			_fnDeleteIndex( oSettings.aiDisplayMaster, iAODataIndex );
			_fnDeleteIndex( oSettings.aiDisplay, iAODataIndex );
			
			/* If there is a user callback function - call it */
			if ( typeof fnCallBack === "function" )
			{
				fnCallBack.call( this, oSettings, oData );
			}
			
			/* Check for an 'overflow' they case for displaying the table */
			if ( oSettings._iDisplayStart >= oSettings.fnRecordsDisplay() )
			{
				oSettings._iDisplayStart -= oSettings._iDisplayLength;
				if ( oSettings._iDisplayStart < 0 )
				{
					oSettings._iDisplayStart = 0;
				}
			}
			
			if ( bRedraw === undefined || bRedraw )
			{
				_fnCalculateEnd( oSettings );
				_fnDraw( oSettings );
			}
			
			return oData;
		};
		
		
		/**
		 * Restore the table to it's original state in the DOM by removing all of DataTables 
		 * enhancements, alterations to the DOM structure of the table and event listeners.
		 *  @param {boolean} [bRemove=false] Completely remove the table from the DOM
		 *  @dtopt API
		 *
		 *  @example
		 *    $(document).ready(function() {
		 *      // This example is fairly pointless in reality, but shows how fnDestroy can be used
		 *      var oTable = $('#example').dataTable();
		 *      oTable.fnDestroy();
		 *    } );
		 */
		this.fnDestroy = function ( bRemove )
		{
			var oSettings = _fnSettingsFromNode( this[DataTable.ext.iApiIndex] );
			var nOrig = oSettings.nTableWrapper.parentNode;
			var nBody = oSettings.nTBody;
			var i, iLen;
		
			bRemove = (bRemove===undefined) ? false : bRemove;
			
			/* Flag to note that the table is currently being destroyed - no action should be taken */
			oSettings.bDestroying = true;
			
			/* Fire off the destroy callbacks for plug-ins etc */
			_fnCallbackFire( oSettings, "aoDestroyCallback", "destroy", [oSettings] );
		
			/* If the table is not being removed, restore the hidden columns */
			if ( !bRemove )
			{
				for ( i=0, iLen=oSettings.aoColumns.length ; i<iLen ; i++ )
				{
					if ( oSettings.aoColumns[i].bVisible === false )
					{
						this.fnSetColumnVis( i, true );
					}
				}
			}
			
			/* Blitz all DT events */
			$(oSettings.nTableWrapper).find('*').andSelf().unbind('.DT');
			
			/* If there is an 'empty' indicator row, remove it */
			$('tbody>tr>td.'+oSettings.oClasses.sRowEmpty, oSettings.nTable).parent().remove();
			
			/* When scrolling we had to break the table up - restore it */
			if ( oSettings.nTable != oSettings.nTHead.parentNode )
			{
				$(oSettings.nTable).children('thead').remove();
				oSettings.nTable.appendChild( oSettings.nTHead );
			}
			
			if ( oSettings.nTFoot && oSettings.nTable != oSettings.nTFoot.parentNode )
			{
				$(oSettings.nTable).children('tfoot').remove();
				oSettings.nTable.appendChild( oSettings.nTFoot );
			}
			
			/* Remove the DataTables generated nodes, events and classes */
			oSettings.nTable.parentNode.removeChild( oSettings.nTable );
			$(oSettings.nTableWrapper).remove();
			
			oSettings.aaSorting = [];
			oSettings.aaSortingFixed = [];
			_fnSortingClasses( oSettings );
			
			$(_fnGetTrNodes( oSettings )).removeClass( oSettings.asStripeClasses.join(' ') );
			
			$('th, td', oSettings.nTHead).removeClass( [
				oSettings.oClasses.sSortable,
				oSettings.oClasses.sSortableAsc,
				oSettings.oClasses.sSortableDesc,
				oSettings.oClasses.sSortableNone ].join(' ')
			);
			if ( oSettings.bJUI )
			{
				$('th span.'+oSettings.oClasses.sSortIcon
					+ ', td span.'+oSettings.oClasses.sSortIcon, oSettings.nTHead).remove();
		
				$('th, td', oSettings.nTHead).each( function () {
					var jqWrapper = $('div.'+oSettings.oClasses.sSortJUIWrapper, this);
					var kids = jqWrapper.contents();
					$(this).append( kids );
					jqWrapper.remove();
				} );
			}
			
			/* Add the TR elements back into the table in their original order */
			if ( !bRemove && oSettings.nTableReinsertBefore )
			{
				nOrig.insertBefore( oSettings.nTable, oSettings.nTableReinsertBefore );
			}
			else if ( !bRemove )
			{
				nOrig.appendChild( oSettings.nTable );
			}
		
			for ( i=0, iLen=oSettings.aoData.length ; i<iLen ; i++ )
			{
				if ( oSettings.aoData[i].nTr !== null )
				{
					nBody.appendChild( oSettings.aoData[i].nTr );
				}
			}
			
			/* Restore the width of the original table */
			if ( oSettings.oFeatures.bAutoWidth === true )
			{
			  oSettings.nTable.style.width = _fnStringToCss(oSettings.sDestroyWidth);
			}
			
			/* If the were originally stripe classes - then we add them back here. Note
			 * this is not fool proof (for example if not all rows had stripe classes - but
			 * it's a good effort without getting carried away
			 */
			iLen = oSettings.asDestroyStripes.length;
			if (iLen)
			{
				var anRows = $(nBody).children('tr');
				for ( i=0 ; i<iLen ; i++ )
				{
					anRows.filter(':nth-child(' + iLen + 'n + ' + i + ')').addClass( oSettings.asDestroyStripes[i] );
				}
			}
			
			/* Remove the settings object from the settings array */
			for ( i=0, iLen=DataTable.settings.length ; i<iLen ; i++ )
			{
				if ( DataTable.settings[i] == oSettings )
				{
					DataTable.settings.splice( i, 1 );
				}
			}
			
			/* End it all */
			oSettings = null;
			oInit = null;
		};
		
		
		/**
		 * Redraw the table
		 *  @param {bool} [bComplete=true] Re-filter and resort (if enabled) the table before the draw.
		 *  @dtopt API
		 *
		 *  @example
		 *    $(document).ready(function() {
		 *      var oTable = $('#example').dataTable();
		 *      
		 *      // Re-draw the table - you wouldn't want to do it here, but it's an example :-)
		 *      oTable.fnDraw();
		 *    } );
		 */
		this.fnDraw = function( bComplete )
		{
			var oSettings = _fnSettingsFromNode( this[DataTable.ext.iApiIndex] );
			if ( bComplete === false )
			{
				_fnCalculateEnd( oSettings );
				_fnDraw( oSettings );
			}
			else
			{
				_fnReDraw( oSettings );
			}
		};
		
		
		/**
		 * Filter the input based on data
		 *  @param {string} sInput String to filter the table on
		 *  @param {int|null} [iColumn] Column to limit filtering to
		 *  @param {bool} [bRegex=false] Treat as regular expression or not
		 *  @param {bool} [bSmart=true] Perform smart filtering or not
		 *  @param {bool} [bShowGlobal=true] Show the input global filter in it's input box(es)
		 *  @param {bool} [bCaseInsensitive=true] Do case-insensitive matching (true) or not (false)
		 *  @dtopt API
		 *
		 *  @example
		 *    $(document).ready(function() {
		 *      var oTable = $('#example').dataTable();
		 *      
		 *      // Sometime later - filter...
		 *      oTable.fnFilter( 'test string' );
		 *    } );
		 */
		this.fnFilter = function( sInput, iColumn, bRegex, bSmart, bShowGlobal, bCaseInsensitive )
		{
			var oSettings = _fnSettingsFromNode( this[DataTable.ext.iApiIndex] );
			
			if ( !oSettings.oFeatures.bFilter )
			{
				return;
			}
			
			if ( bRegex === undefined || bRegex === null )
			{
				bRegex = false;
			}
			
			if ( bSmart === undefined || bSmart === null )
			{
				bSmart = true;
			}
			
			if ( bShowGlobal === undefined || bShowGlobal === null )
			{
				bShowGlobal = true;
			}
			
			if ( bCaseInsensitive === undefined || bCaseInsensitive === null )
			{
				bCaseInsensitive = true;
			}
			
			if ( iColumn === undefined || iColumn === null )
			{
				/* Global filter */
				_fnFilterComplete( oSettings, {
					"sSearch":sInput+"",
					"bRegex": bRegex,
					"bSmart": bSmart,
					"bCaseInsensitive": bCaseInsensitive
				}, 1 );
				
				if ( bShowGlobal && oSettings.aanFeatures.f )
				{
					var n = oSettings.aanFeatures.f;
					for ( var i=0, iLen=n.length ; i<iLen ; i++ )
					{
						// IE9 throws an 'unknown error' if document.activeElement is used
						// inside an iframe or frame...
						try {
							if ( n[i]._DT_Input != document.activeElement )
							{
								$(n[i]._DT_Input).val( sInput );
							}
						}
						catch ( e ) {
							$(n[i]._DT_Input).val( sInput );
						}
					}
				}
			}
			else
			{
				/* Single column filter */
				$.extend( oSettings.aoPreSearchCols[ iColumn ], {
					"sSearch": sInput+"",
					"bRegex": bRegex,
					"bSmart": bSmart,
					"bCaseInsensitive": bCaseInsensitive
				} );
				_fnFilterComplete( oSettings, oSettings.oPreviousSearch, 1 );
			}
		};
		
		
		/**
		 * Get the data for the whole table, an individual row or an individual cell based on the 
		 * provided parameters.
		 *  @param {int|node} [mRow] A TR row node, TD/TH cell node or an integer. If given as
		 *    a TR node then the data source for the whole row will be returned. If given as a
		 *    TD/TH cell node then iCol will be automatically calculated and the data for the
		 *    cell returned. If given as an integer, then this is treated as the aoData internal
		 *    data index for the row (see fnGetPosition) and the data for that row used.
		 *  @param {int} [iCol] Optional column index that you want the data of.
		 *  @returns {array|object|string} If mRow is undefined, then the data for all rows is
		 *    returned. If mRow is defined, just data for that row, and is iCol is
		 *    defined, only data for the designated cell is returned.
		 *  @dtopt API
		 *
		 *  @example
		 *    // Row data
		 *    $(document).ready(function() {
		 *      oTable = $('#example').dataTable();
		 *
		 *      oTable.$('tr').click( function () {
		 *        var data = oTable.fnGetData( this );
		 *        // ... do something with the array / object of data for the row
		 *      } );
		 *    } );
		 *
		 *  @example
		 *    // Individual cell data
		 *    $(document).ready(function() {
		 *      oTable = $('#example').dataTable();
		 *
		 *      oTable.$('td').click( function () {
		 *        var sData = oTable.fnGetData( this );
		 *        alert( 'The cell clicked on had the value of '+sData );
		 *      } );
		 *    } );
		 */
		this.fnGetData = function( mRow, iCol )
		{
			var oSettings = _fnSettingsFromNode( this[DataTable.ext.iApiIndex] );
			
			if ( mRow !== undefined )
			{
				var iRow = mRow;
				if ( typeof mRow === 'object' )
				{
					var sNode = mRow.nodeName.toLowerCase();
					if (sNode === "tr" )
					{
						iRow = _fnNodeToDataIndex(oSettings, mRow);
					}
					else if ( sNode === "td" )
					{
						iRow = _fnNodeToDataIndex(oSettings, mRow.parentNode);
						iCol = _fnNodeToColumnIndex( oSettings, iRow, mRow );
					}
				}
		
				if ( iCol !== undefined )
				{
					return _fnGetCellData( oSettings, iRow, iCol, '' );
				}
				return (oSettings.aoData[iRow]!==undefined) ?
					oSettings.aoData[iRow]._aData : null;
			}
			return _fnGetDataMaster( oSettings );
		};
		
		
		/**
		 * Get an array of the TR nodes that are used in the table's body. Note that you will 
		 * typically want to use the '$' API method in preference to this as it is more 
		 * flexible.
		 *  @param {int} [iRow] Optional row index for the TR element you want
		 *  @returns {array|node} If iRow is undefined, returns an array of all TR elements
		 *    in the table's body, or iRow is defined, just the TR element requested.
		 *  @dtopt API
		 *
		 *  @example
		 *    $(document).ready(function() {
		 *      var oTable = $('#example').dataTable();
		 *      
		 *      // Get the nodes from the table
		 *      var nNodes = oTable.fnGetNodes( );
		 *    } );
		 */
		this.fnGetNodes = function( iRow )
		{
			var oSettings = _fnSettingsFromNode( this[DataTable.ext.iApiIndex] );
			
			if ( iRow !== undefined ) {
				return (oSettings.aoData[iRow]!==undefined) ?
					oSettings.aoData[iRow].nTr : null;
			}
			return _fnGetTrNodes( oSettings );
		};
		
		
		/**
		 * Get the array indexes of a particular cell from it's DOM element
		 * and column index including hidden columns
		 *  @param {node} nNode this can either be a TR, TD or TH in the table's body
		 *  @returns {int} If nNode is given as a TR, then a single index is returned, or
		 *    if given as a cell, an array of [row index, column index (visible), 
		 *    column index (all)] is given.
		 *  @dtopt API
		 *
		 *  @example
		 *    $(document).ready(function() {
		 *      $('#example tbody td').click( function () {
		 *        // Get the position of the current data from the node
		 *        var aPos = oTable.fnGetPosition( this );
		 *        
		 *        // Get the data array for this row
		 *        var aData = oTable.fnGetData( aPos[0] );
		 *        
		 *        // Update the data array and return the value
		 *        aData[ aPos[1] ] = 'clicked';
		 *        this.innerHTML = 'clicked';
		 *      } );
		 *      
		 *      // Init DataTables
		 *      oTable = $('#example').dataTable();
		 *    } );
		 */
		this.fnGetPosition = function( nNode )
		{
			var oSettings = _fnSettingsFromNode( this[DataTable.ext.iApiIndex] );
			var sNodeName = nNode.nodeName.toUpperCase();
			
			if ( sNodeName == "TR" )
			{
				return _fnNodeToDataIndex(oSettings, nNode);
			}
			else if ( sNodeName == "TD" || sNodeName == "TH" )
			{
				var iDataIndex = _fnNodeToDataIndex( oSettings, nNode.parentNode );
				var iColumnIndex = _fnNodeToColumnIndex( oSettings, iDataIndex, nNode );
				return [ iDataIndex, _fnColumnIndexToVisible(oSettings, iColumnIndex ), iColumnIndex ];
			}
			return null;
		};
		
		
		/**
		 * Check to see if a row is 'open' or not.
		 *  @param {node} nTr the table row to check
		 *  @returns {boolean} true if the row is currently open, false otherwise
		 *  @dtopt API
		 *
		 *  @example
		 *    $(document).ready(function() {
		 *      var oTable;
		 *      
		 *      // 'open' an information row when a row is clicked on
		 *      $('#example tbody tr').click( function () {
		 *        if ( oTable.fnIsOpen(this) ) {
		 *          oTable.fnClose( this );
		 *        } else {
		 *          oTable.fnOpen( this, "Temporary row opened", "info_row" );
		 *        }
		 *      } );
		 *      
		 *      oTable = $('#example').dataTable();
		 *    } );
		 */
		this.fnIsOpen = function( nTr )
		{
			var oSettings = _fnSettingsFromNode( this[DataTable.ext.iApiIndex] );
			var aoOpenRows = oSettings.aoOpenRows;
			
			for ( var i=0 ; i<oSettings.aoOpenRows.length ; i++ )
			{
				if ( oSettings.aoOpenRows[i].nParent == nTr )
				{
					return true;
				}
			}
			return false;
		};
		
		
		/**
		 * This function will place a new row directly after a row which is currently 
		 * on display on the page, with the HTML contents that is passed into the 
		 * function. This can be used, for example, to ask for confirmation that a 
		 * particular record should be deleted.
		 *  @param {node} nTr The table row to 'open'
		 *  @param {string|node|jQuery} mHtml The HTML to put into the row
		 *  @param {string} sClass Class to give the new TD cell
		 *  @returns {node} The row opened. Note that if the table row passed in as the
		 *    first parameter, is not found in the table, this method will silently
		 *    return.
		 *  @dtopt API
		 *
		 *  @example
		 *    $(document).ready(function() {
		 *      var oTable;
		 *      
		 *      // 'open' an information row when a row is clicked on
		 *      $('#example tbody tr').click( function () {
		 *        if ( oTable.fnIsOpen(this) ) {
		 *          oTable.fnClose( this );
		 *        } else {
		 *          oTable.fnOpen( this, "Temporary row opened", "info_row" );
		 *        }
		 *      } );
		 *      
		 *      oTable = $('#example').dataTable();
		 *    } );
		 */
		this.fnOpen = function( nTr, mHtml, sClass )
		{
			/* Find settings from table node */
			var oSettings = _fnSettingsFromNode( this[DataTable.ext.iApiIndex] );
		
			/* Check that the row given is in the table */
			var nTableRows = _fnGetTrNodes( oSettings );
			if ( $.inArray(nTr, nTableRows) === -1 )
			{
				return;
			}
			
			/* the old open one if there is one */
			this.fnClose( nTr );
			
			var nNewRow = document.createElement("tr");
			var nNewCell = document.createElement("td");
			nNewRow.appendChild( nNewCell );
			nNewCell.className = sClass;
			nNewCell.colSpan = _fnVisbleColumns( oSettings );
		
			if (typeof mHtml === "string")
			{
				nNewCell.innerHTML = mHtml;
			}
			else
			{
				$(nNewCell).html( mHtml );
			}
		
			/* If the nTr isn't on the page at the moment - then we don't insert at the moment */
			var nTrs = $('tr', oSettings.nTBody);
			if ( $.inArray(nTr, nTrs) != -1  )
			{
				$(nNewRow).insertAfter(nTr);
			}
			
			oSettings.aoOpenRows.push( {
				"nTr": nNewRow,
				"nParent": nTr
			} );
			
			return nNewRow;
		};
		
		
		/**
		 * Change the pagination - provides the internal logic for pagination in a simple API 
		 * function. With this function you can have a DataTables table go to the next, 
		 * previous, first or last pages.
		 *  @param {string|int} mAction Paging action to take: "first", "previous", "next" or "last"
		 *    or page number to jump to (integer), note that page 0 is the first page.
		 *  @param {bool} [bRedraw=true] Redraw the table or not
		 *  @dtopt API
		 *
		 *  @example
		 *    $(document).ready(function() {
		 *      var oTable = $('#example').dataTable();
		 *      oTable.fnPageChange( 'next' );
		 *    } );
		 */
		this.fnPageChange = function ( mAction, bRedraw )
		{
			var oSettings = _fnSettingsFromNode( this[DataTable.ext.iApiIndex] );
			_fnPageChange( oSettings, mAction );
			_fnCalculateEnd( oSettings );
			
			if ( bRedraw === undefined || bRedraw )
			{
				_fnDraw( oSettings );
			}
		};
		
		
		/**
		 * Show a particular column
		 *  @param {int} iCol The column whose display should be changed
		 *  @param {bool} bShow Show (true) or hide (false) the column
		 *  @param {bool} [bRedraw=true] Redraw the table or not
		 *  @dtopt API
		 *
		 *  @example
		 *    $(document).ready(function() {
		 *      var oTable = $('#example').dataTable();
		 *      
		 *      // Hide the second column after initialisation
		 *      oTable.fnSetColumnVis( 1, false );
		 *    } );
		 */
		this.fnSetColumnVis = function ( iCol, bShow, bRedraw )
		{
			var oSettings = _fnSettingsFromNode( this[DataTable.ext.iApiIndex] );
			var i, iLen;
			var aoColumns = oSettings.aoColumns;
			var aoData = oSettings.aoData;
			var nTd, bAppend, iBefore;
			
			/* No point in doing anything if we are requesting what is already true */
			if ( aoColumns[iCol].bVisible == bShow )
			{
				return;
			}
			
			/* Show the column */
			if ( bShow )
			{
				var iInsert = 0;
				for ( i=0 ; i<iCol ; i++ )
				{
					if ( aoColumns[i].bVisible )
					{
						iInsert++;
					}
				}
				
				/* Need to decide if we should use appendChild or insertBefore */
				bAppend = (iInsert >= _fnVisbleColumns( oSettings ));
		
				/* Which coloumn should we be inserting before? */
				if ( !bAppend )
				{
					for ( i=iCol ; i<aoColumns.length ; i++ )
					{
						if ( aoColumns[i].bVisible )
						{
							iBefore = i;
							break;
						}
					}
				}
		
				for ( i=0, iLen=aoData.length ; i<iLen ; i++ )
				{
					if ( aoData[i].nTr !== null )
					{
						if ( bAppend )
						{
							aoData[i].nTr.appendChild( 
								aoData[i]._anHidden[iCol]
							);
						}
						else
						{
							aoData[i].nTr.insertBefore(
								aoData[i]._anHidden[iCol], 
								_fnGetTdNodes( oSettings, i )[iBefore] );
						}
					}
				}
			}
			else
			{
				/* Remove a column from display */
				for ( i=0, iLen=aoData.length ; i<iLen ; i++ )
				{
					if ( aoData[i].nTr !== null )
					{
						nTd = _fnGetTdNodes( oSettings, i )[iCol];
						aoData[i]._anHidden[iCol] = nTd;
						nTd.parentNode.removeChild( nTd );
					}
				}
			}
		
			/* Clear to set the visible flag */
			aoColumns[iCol].bVisible = bShow;
		
			/* Redraw the header and footer based on the new column visibility */
			_fnDrawHead( oSettings, oSettings.aoHeader );
			if ( oSettings.nTFoot )
			{
				_fnDrawHead( oSettings, oSettings.aoFooter );
			}
			
			/* If there are any 'open' rows, then we need to alter the colspan for this col change */
			for ( i=0, iLen=oSettings.aoOpenRows.length ; i<iLen ; i++ )
			{
				oSettings.aoOpenRows[i].nTr.colSpan = _fnVisbleColumns( oSettings );
			}
			
			/* Do a redraw incase anything depending on the table columns needs it 
			 * (built-in: scrolling) 
			 */
			if ( bRedraw === undefined || bRedraw )
			{
				_fnAdjustColumnSizing( oSettings );
				_fnDraw( oSettings );
			}
			
			_fnSaveState( oSettings );
		};
		
		
		/**
		 * Get the settings for a particular table for external manipulation
		 *  @returns {object} DataTables settings object. See 
		 *    {@link DataTable.models.oSettings}
		 *  @dtopt API
		 *
		 *  @example
		 *    $(document).ready(function() {
		 *      var oTable = $('#example').dataTable();
		 *      var oSettings = oTable.fnSettings();
		 *      
		 *      // Show an example parameter from the settings
		 *      alert( oSettings._iDisplayStart );
		 *    } );
		 */
		this.fnSettings = function()
		{
			return _fnSettingsFromNode( this[DataTable.ext.iApiIndex] );
		};
		
		
		/**
		 * Sort the table by a particular column
		 *  @param {int} iCol the data index to sort on. Note that this will not match the 
		 *    'display index' if you have hidden data entries
		 *  @dtopt API
		 *
		 *  @example
		 *    $(document).ready(function() {
		 *      var oTable = $('#example').dataTable();
		 *      
		 *      // Sort immediately with columns 0 and 1
		 *      oTable.fnSort( [ [0,'asc'], [1,'asc'] ] );
		 *    } );
		 */
		this.fnSort = function( aaSort )
		{
			var oSettings = _fnSettingsFromNode( this[DataTable.ext.iApiIndex] );
			oSettings.aaSorting = aaSort;
			_fnSort( oSettings );
		};
		
		
		/**
		 * Attach a sort listener to an element for a given column
		 *  @param {node} nNode the element to attach the sort listener to
		 *  @param {int} iColumn the column that a click on this node will sort on
		 *  @param {function} [fnCallback] callback function when sort is run
		 *  @dtopt API
		 *
		 *  @example
		 *    $(document).ready(function() {
		 *      var oTable = $('#example').dataTable();
		 *      
		 *      // Sort on column 1, when 'sorter' is clicked on
		 *      oTable.fnSortListener( document.getElementById('sorter'), 1 );
		 *    } );
		 */
		this.fnSortListener = function( nNode, iColumn, fnCallback )
		{
			_fnSortAttachListener( _fnSettingsFromNode( this[DataTable.ext.iApiIndex] ), nNode, iColumn,
			 	fnCallback );
		};
		
		
		/**
		 * Update a table cell or row - this method will accept either a single value to
		 * update the cell with, an array of values with one element for each column or
		 * an object in the same format as the original data source. The function is
		 * self-referencing in order to make the multi column updates easier.
		 *  @param {object|array|string} mData Data to update the cell/row with
		 *  @param {node|int} mRow TR element you want to update or the aoData index
		 *  @param {int} [iColumn] The column to update (not used of mData is an array or object)
		 *  @param {bool} [bRedraw=true] Redraw the table or not
		 *  @param {bool} [bAction=true] Perform pre-draw actions or not
		 *  @returns {int} 0 on success, 1 on error
		 *  @dtopt API
		 *
		 *  @example
		 *    $(document).ready(function() {
		 *      var oTable = $('#example').dataTable();
		 *      oTable.fnUpdate( 'Example update', 0, 0 ); // Single cell
		 *      oTable.fnUpdate( ['a', 'b', 'c', 'd', 'e'], 1, 0 ); // Row
		 *    } );
		 */
		this.fnUpdate = function( mData, mRow, iColumn, bRedraw, bAction )
		{
			var oSettings = _fnSettingsFromNode( this[DataTable.ext.iApiIndex] );
			var i, iLen, sDisplay;
			var iRow = (typeof mRow === 'object') ? 
				_fnNodeToDataIndex(oSettings, mRow) : mRow;
			
			if ( $.isArray(mData) && iColumn === undefined )
			{
				/* Array update - update the whole row */
				oSettings.aoData[iRow]._aData = mData.slice();
				
				/* Flag to the function that we are recursing */
				for ( i=0 ; i<oSettings.aoColumns.length ; i++ )
				{
					this.fnUpdate( _fnGetCellData( oSettings, iRow, i ), iRow, i, false, false );
				}
			}
			else if ( $.isPlainObject(mData) && iColumn === undefined )
			{
				/* Object update - update the whole row - assume the developer gets the object right */
				oSettings.aoData[iRow]._aData = $.extend( true, {}, mData );
		
				for ( i=0 ; i<oSettings.aoColumns.length ; i++ )
				{
					this.fnUpdate( _fnGetCellData( oSettings, iRow, i ), iRow, i, false, false );
				}
			}
			else
			{
				/* Individual cell update */
				_fnSetCellData( oSettings, iRow, iColumn, mData );
				sDisplay = _fnGetCellData( oSettings, iRow, iColumn, 'display' );
				
				var oCol = oSettings.aoColumns[iColumn];
				if ( oCol.fnRender !== null )
				{
					sDisplay = _fnRender( oSettings, iRow, iColumn );
					if ( oCol.bUseRendered )
					{
						_fnSetCellData( oSettings, iRow, iColumn, sDisplay );
					}
				}
				
				if ( oSettings.aoData[iRow].nTr !== null )
				{
					/* Do the actual HTML update */
					_fnGetTdNodes( oSettings, iRow )[iColumn].innerHTML = sDisplay;
				}
			}
			
			/* Modify the search index for this row (strictly this is likely not needed, since fnReDraw
			 * will rebuild the search array - however, the redraw might be disabled by the user)
			 */
			var iDisplayIndex = $.inArray( iRow, oSettings.aiDisplay );
			oSettings.asDataSearch[iDisplayIndex] = _fnBuildSearchRow(
				oSettings, 
				_fnGetRowData( oSettings, iRow, 'filter', _fnGetColumns( oSettings, 'bSearchable' ) )
			);
			
			/* Perform pre-draw actions */
			if ( bAction === undefined || bAction )
			{
				_fnAdjustColumnSizing( oSettings );
			}
			
			/* Redraw the table */
			if ( bRedraw === undefined || bRedraw )
			{
				_fnReDraw( oSettings );
			}
			return 0;
		};
		
		
		/**
		 * Provide a common method for plug-ins to check the version of DataTables being used, in order
		 * to ensure compatibility.
		 *  @param {string} sVersion Version string to check for, in the format "X.Y.Z". Note that the
		 *    formats "X" and "X.Y" are also acceptable.
		 *  @returns {boolean} true if this version of DataTables is greater or equal to the required
		 *    version, or false if this version of DataTales is not suitable
		 *  @method
		 *  @dtopt API
		 *
		 *  @example
		 *    $(document).ready(function() {
		 *      var oTable = $('#example').dataTable();
		 *      alert( oTable.fnVersionCheck( '1.9.0' ) );
		 *    } );
		 */
		this.fnVersionCheck = DataTable.ext.fnVersionCheck;
		
		
		/*
		 * This is really a good bit rubbish this method of exposing the internal methods
		 * publicly... - To be fixed in 2.0 using methods on the prototype
		 */
		
		
		/**
		 * Create a wrapper function for exporting an internal functions to an external API.
		 *  @param {string} sFunc API function name
		 *  @returns {function} wrapped function
		 *  @memberof DataTable#oApi
		 */
		function _fnExternApiFunc (sFunc)
		{
			return function() {
				var aArgs = [_fnSettingsFromNode(this[DataTable.ext.iApiIndex])].concat( 
					Array.prototype.slice.call(arguments) );
				return DataTable.ext.oApi[sFunc].apply( this, aArgs );
			};
		}
		
		
		/**
		 * Reference to internal functions for use by plug-in developers. Note that these
		 * methods are references to internal functions and are considered to be private.
		 * If you use these methods, be aware that they are liable to change between versions
		 * (check the upgrade notes).
		 *  @namespace
		 */
		this.oApi = {
			"_fnExternApiFunc": _fnExternApiFunc,
			"_fnInitialise": _fnInitialise,
			"_fnInitComplete": _fnInitComplete,
			"_fnLanguageCompat": _fnLanguageCompat,
			"_fnAddColumn": _fnAddColumn,
			"_fnColumnOptions": _fnColumnOptions,
			"_fnAddData": _fnAddData,
			"_fnCreateTr": _fnCreateTr,
			"_fnGatherData": _fnGatherData,
			"_fnBuildHead": _fnBuildHead,
			"_fnDrawHead": _fnDrawHead,
			"_fnDraw": _fnDraw,
			"_fnReDraw": _fnReDraw,
			"_fnAjaxUpdate": _fnAjaxUpdate,
			"_fnAjaxParameters": _fnAjaxParameters,
			"_fnAjaxUpdateDraw": _fnAjaxUpdateDraw,
			"_fnServerParams": _fnServerParams,
			"_fnAddOptionsHtml": _fnAddOptionsHtml,
			"_fnFeatureHtmlTable": _fnFeatureHtmlTable,
			"_fnScrollDraw": _fnScrollDraw,
			"_fnAdjustColumnSizing": _fnAdjustColumnSizing,
			"_fnFeatureHtmlFilter": _fnFeatureHtmlFilter,
			"_fnFilterComplete": _fnFilterComplete,
			"_fnFilterCustom": _fnFilterCustom,
			"_fnFilterColumn": _fnFilterColumn,
			"_fnFilter": _fnFilter,
			"_fnBuildSearchArray": _fnBuildSearchArray,
			"_fnBuildSearchRow": _fnBuildSearchRow,
			"_fnFilterCreateSearch": _fnFilterCreateSearch,
			"_fnDataToSearch": _fnDataToSearch,
			"_fnSort": _fnSort,
			"_fnSortAttachListener": _fnSortAttachListener,
			"_fnSortingClasses": _fnSortingClasses,
			"_fnFeatureHtmlPaginate": _fnFeatureHtmlPaginate,
			"_fnPageChange": _fnPageChange,
			"_fnFeatureHtmlInfo": _fnFeatureHtmlInfo,
			"_fnUpdateInfo": _fnUpdateInfo,
			"_fnFeatureHtmlLength": _fnFeatureHtmlLength,
			"_fnFeatureHtmlProcessing": _fnFeatureHtmlProcessing,
			"_fnProcessingDisplay": _fnProcessingDisplay,
			"_fnVisibleToColumnIndex": _fnVisibleToColumnIndex,
			"_fnColumnIndexToVisible": _fnColumnIndexToVisible,
			"_fnNodeToDataIndex": _fnNodeToDataIndex,
			"_fnVisbleColumns": _fnVisbleColumns,
			"_fnCalculateEnd": _fnCalculateEnd,
			"_fnConvertToWidth": _fnConvertToWidth,
			"_fnCalculateColumnWidths": _fnCalculateColumnWidths,
			"_fnScrollingWidthAdjust": _fnScrollingWidthAdjust,
			"_fnGetWidestNode": _fnGetWidestNode,
			"_fnGetMaxLenString": _fnGetMaxLenString,
			"_fnStringToCss": _fnStringToCss,
			"_fnDetectType": _fnDetectType,
			"_fnSettingsFromNode": _fnSettingsFromNode,
			"_fnGetDataMaster": _fnGetDataMaster,
			"_fnGetTrNodes": _fnGetTrNodes,
			"_fnGetTdNodes": _fnGetTdNodes,
			"_fnEscapeRegex": _fnEscapeRegex,
			"_fnDeleteIndex": _fnDeleteIndex,
			"_fnReOrderIndex": _fnReOrderIndex,
			"_fnColumnOrdering": _fnColumnOrdering,
			"_fnLog": _fnLog,
			"_fnClearTable": _fnClearTable,
			"_fnSaveState": _fnSaveState,
			"_fnLoadState": _fnLoadState,
			"_fnCreateCookie": _fnCreateCookie,
			"_fnReadCookie": _fnReadCookie,
			"_fnDetectHeader": _fnDetectHeader,
			"_fnGetUniqueThs": _fnGetUniqueThs,
			"_fnScrollBarWidth": _fnScrollBarWidth,
			"_fnApplyToChildren": _fnApplyToChildren,
			"_fnMap": _fnMap,
			"_fnGetRowData": _fnGetRowData,
			"_fnGetCellData": _fnGetCellData,
			"_fnSetCellData": _fnSetCellData,
			"_fnGetObjectDataFn": _fnGetObjectDataFn,
			"_fnSetObjectDataFn": _fnSetObjectDataFn,
			"_fnApplyColumnDefs": _fnApplyColumnDefs,
			"_fnBindAction": _fnBindAction,
			"_fnExtend": _fnExtend,
			"_fnCallbackReg": _fnCallbackReg,
			"_fnCallbackFire": _fnCallbackFire,
			"_fnJsonString": _fnJsonString,
			"_fnRender": _fnRender,
			"_fnNodeToColumnIndex": _fnNodeToColumnIndex,
			"_fnInfoMacros": _fnInfoMacros,
			"_fnBrowserDetect": _fnBrowserDetect,
			"_fnGetColumns": _fnGetColumns
		};
		
		$.extend( DataTable.ext.oApi, this.oApi );
		
		for ( var sFunc in DataTable.ext.oApi )
		{
			if ( sFunc )
			{
				this[sFunc] = _fnExternApiFunc(sFunc);
			}
		}
		
		
		var _that = this;
		this.each(function() {
			var i=0, iLen, j, jLen, k, kLen;
			var sId = this.getAttribute( 'id' );
			var bInitHandedOff = false;
			var bUsePassedData = false;
			
			
			/* Sanity check */
			if ( this.nodeName.toLowerCase() != 'table' )
			{
				_fnLog( null, 0, "Attempted to initialise DataTables on a node which is not a "+
					"table: "+this.nodeName );
				return;
			}
			
			/* Check to see if we are re-initialising a table */
			for ( i=0, iLen=DataTable.settings.length ; i<iLen ; i++ )
			{
				/* Base check on table node */
				if ( DataTable.settings[i].nTable == this )
				{
					if ( oInit === undefined || oInit.bRetrieve )
					{
						return DataTable.settings[i].oInstance;
					}
					else if ( oInit.bDestroy )
					{
						DataTable.settings[i].oInstance.fnDestroy();
						break;
					}
					else
					{
						_fnLog( DataTable.settings[i], 0, "Cannot reinitialise DataTable.\n\n"+
							"To retrieve the DataTables object for this table, pass no arguments or see "+
							"the docs for bRetrieve and bDestroy" );
						return;
					}
				}
				
				/* If the element we are initialising has the same ID as a table which was previously
				 * initialised, but the table nodes don't match (from before) then we destroy the old
				 * instance by simply deleting it. This is under the assumption that the table has been
				 * destroyed by other methods. Anyone using non-id selectors will need to do this manually
				 */
				if ( DataTable.settings[i].sTableId == this.id )
				{
					DataTable.settings.splice( i, 1 );
					break;
				}
			}
			
			/* Ensure the table has an ID - required for accessibility */
			if ( sId === null || sId === "" )
			{
				sId = "DataTables_Table_"+(DataTable.ext._oExternConfig.iNextUnique++);
				this.id = sId;
			}
			
			/* Create the settings object for this table and set some of the default parameters */
			var oSettings = $.extend( true, {}, DataTable.models.oSettings, {
				"nTable":        this,
				"oApi":          _that.oApi,
				"oInit":         oInit,
				"sDestroyWidth": $(this).width(),
				"sInstance":     sId,
				"sTableId":      sId
			} );
			DataTable.settings.push( oSettings );
			
			// Need to add the instance after the instance after the settings object has been added
			// to the settings array, so we can self reference the table instance if more than one
			oSettings.oInstance = (_that.length===1) ? _that : $(this).dataTable();
			
			/* Setting up the initialisation object */
			if ( !oInit )
			{
				oInit = {};
			}
			
			// Backwards compatibility, before we apply all the defaults
			if ( oInit.oLanguage )
			{
				_fnLanguageCompat( oInit.oLanguage );
			}
			
			oInit = _fnExtend( $.extend(true, {}, DataTable.defaults), oInit );
			
			// Map the initialisation options onto the settings object
			_fnMap( oSettings.oFeatures, oInit, "bPaginate" );
			_fnMap( oSettings.oFeatures, oInit, "bLengthChange" );
			_fnMap( oSettings.oFeatures, oInit, "bFilter" );
			_fnMap( oSettings.oFeatures, oInit, "bSort" );
			_fnMap( oSettings.oFeatures, oInit, "bInfo" );
			_fnMap( oSettings.oFeatures, oInit, "bProcessing" );
			_fnMap( oSettings.oFeatures, oInit, "bAutoWidth" );
			_fnMap( oSettings.oFeatures, oInit, "bSortClasses" );
			_fnMap( oSettings.oFeatures, oInit, "bServerSide" );
			_fnMap( oSettings.oFeatures, oInit, "bDeferRender" );
			_fnMap( oSettings.oScroll, oInit, "sScrollX", "sX" );
			_fnMap( oSettings.oScroll, oInit, "sScrollXInner", "sXInner" );
			_fnMap( oSettings.oScroll, oInit, "sScrollY", "sY" );
			_fnMap( oSettings.oScroll, oInit, "bScrollCollapse", "bCollapse" );
			_fnMap( oSettings.oScroll, oInit, "bScrollInfinite", "bInfinite" );
			_fnMap( oSettings.oScroll, oInit, "iScrollLoadGap", "iLoadGap" );
			_fnMap( oSettings.oScroll, oInit, "bScrollAutoCss", "bAutoCss" );
			_fnMap( oSettings, oInit, "asStripeClasses" );
			_fnMap( oSettings, oInit, "asStripClasses", "asStripeClasses" ); // legacy
			_fnMap( oSettings, oInit, "fnServerData" );
			_fnMap( oSettings, oInit, "fnFormatNumber" );
			_fnMap( oSettings, oInit, "sServerMethod" );
			_fnMap( oSettings, oInit, "aaSorting" );
			_fnMap( oSettings, oInit, "aaSortingFixed" );
			_fnMap( oSettings, oInit, "aLengthMenu" );
			_fnMap( oSettings, oInit, "sPaginationType" );
			_fnMap( oSettings, oInit, "sAjaxSource" );
			_fnMap( oSettings, oInit, "sAjaxDataProp" );
			_fnMap( oSettings, oInit, "iCookieDuration" );
			_fnMap( oSettings, oInit, "sCookiePrefix" );
			_fnMap( oSettings, oInit, "sDom" );
			_fnMap( oSettings, oInit, "bSortCellsTop" );
			_fnMap( oSettings, oInit, "iTabIndex" );
			_fnMap( oSettings, oInit, "oSearch", "oPreviousSearch" );
			_fnMap( oSettings, oInit, "aoSearchCols", "aoPreSearchCols" );
			_fnMap( oSettings, oInit, "iDisplayLength", "_iDisplayLength" );
			_fnMap( oSettings, oInit, "bJQueryUI", "bJUI" );
			_fnMap( oSettings, oInit, "fnCookieCallback" );
			_fnMap( oSettings, oInit, "fnStateLoad" );
			_fnMap( oSettings, oInit, "fnStateSave" );
			_fnMap( oSettings.oLanguage, oInit, "fnInfoCallback" );
			
			/* Callback functions which are array driven */
			_fnCallbackReg( oSettings, 'aoDrawCallback',       oInit.fnDrawCallback,      'user' );
			_fnCallbackReg( oSettings, 'aoServerParams',       oInit.fnServerParams,      'user' );
			_fnCallbackReg( oSettings, 'aoStateSaveParams',    oInit.fnStateSaveParams,   'user' );
			_fnCallbackReg( oSettings, 'aoStateLoadParams',    oInit.fnStateLoadParams,   'user' );
			_fnCallbackReg( oSettings, 'aoStateLoaded',        oInit.fnStateLoaded,       'user' );
			_fnCallbackReg( oSettings, 'aoRowCallback',        oInit.fnRowCallback,       'user' );
			_fnCallbackReg( oSettings, 'aoRowCreatedCallback', oInit.fnCreatedRow,        'user' );
			_fnCallbackReg( oSettings, 'aoHeaderCallback',     oInit.fnHeaderCallback,    'user' );
			_fnCallbackReg( oSettings, 'aoFooterCallback',     oInit.fnFooterCallback,    'user' );
			_fnCallbackReg( oSettings, 'aoInitComplete',       oInit.fnInitComplete,      'user' );
			_fnCallbackReg( oSettings, 'aoPreDrawCallback',    oInit.fnPreDrawCallback,   'user' );
			
			if ( oSettings.oFeatures.bServerSide && oSettings.oFeatures.bSort &&
				   oSettings.oFeatures.bSortClasses )
			{
				/* Enable sort classes for server-side processing. Safe to do it here, since server-side
				 * processing must be enabled by the developer
				 */
				_fnCallbackReg( oSettings, 'aoDrawCallback', _fnSortingClasses, 'server_side_sort_classes' );
			}
			else if ( oSettings.oFeatures.bDeferRender )
			{
				_fnCallbackReg( oSettings, 'aoDrawCallback', _fnSortingClasses, 'defer_sort_classes' );
			}
			
			if ( oInit.bJQueryUI )
			{
				/* Use the JUI classes object for display. You could clone the oStdClasses object if 
				 * you want to have multiple tables with multiple independent classes 
				 */
				$.extend( oSettings.oClasses, DataTable.ext.oJUIClasses );
				
				if ( oInit.sDom === DataTable.defaults.sDom && DataTable.defaults.sDom === "lfrtip" )
				{
					/* Set the DOM to use a layout suitable for jQuery UI's theming */
					oSettings.sDom = '<"H"lfr>t<"F"ip>';
				}
			}
			else
			{
				$.extend( oSettings.oClasses, DataTable.ext.oStdClasses );
			}
			$(this).addClass( oSettings.oClasses.sTable );
			
			/* Calculate the scroll bar width and cache it for use later on */
			if ( oSettings.oScroll.sX !== "" || oSettings.oScroll.sY !== "" )
			{
				oSettings.oScroll.iBarWidth = _fnScrollBarWidth();
			}
			
			if ( oSettings.iInitDisplayStart === undefined )
			{
				/* Display start point, taking into account the save saving */
				oSettings.iInitDisplayStart = oInit.iDisplayStart;
				oSettings._iDisplayStart = oInit.iDisplayStart;
			}
			
			/* Must be done after everything which can be overridden by a cookie! */
			if ( oInit.bStateSave )
			{
				oSettings.oFeatures.bStateSave = true;
				_fnLoadState( oSettings, oInit );
				_fnCallbackReg( oSettings, 'aoDrawCallback', _fnSaveState, 'state_save' );
			}
			
			if ( oInit.iDeferLoading !== null )
			{
				oSettings.bDeferLoading = true;
				var tmp = $.isArray( oInit.iDeferLoading );
				oSettings._iRecordsDisplay = tmp ? oInit.iDeferLoading[0] : oInit.iDeferLoading;
				oSettings._iRecordsTotal = tmp ? oInit.iDeferLoading[1] : oInit.iDeferLoading;
			}
			
			if ( oInit.aaData !== null )
			{
				bUsePassedData = true;
			}
			
			/* Language definitions */
			if ( oInit.oLanguage.sUrl !== "" )
			{
				/* Get the language definitions from a file - because this Ajax call makes the language
				 * get async to the remainder of this function we use bInitHandedOff to indicate that 
				 * _fnInitialise will be fired by the returned Ajax handler, rather than the constructor
				 */
				oSettings.oLanguage.sUrl = oInit.oLanguage.sUrl;
				$.getJSON( oSettings.oLanguage.sUrl, null, function( json ) {
					_fnLanguageCompat( json );
					$.extend( true, oSettings.oLanguage, oInit.oLanguage, json );
					_fnInitialise( oSettings );
				} );
				bInitHandedOff = true;
			}
			else
			{
				$.extend( true, oSettings.oLanguage, oInit.oLanguage );
			}
			
			
			/*
			 * Stripes
			 */
			if ( oInit.asStripeClasses === null )
			{
				oSettings.asStripeClasses =[
					oSettings.oClasses.sStripeOdd,
					oSettings.oClasses.sStripeEven
				];
			}
			
			/* Remove row stripe classes if they are already on the table row */
			iLen=oSettings.asStripeClasses.length;
			oSettings.asDestroyStripes = [];
			if (iLen)
			{
				var bStripeRemove = false;
				var anRows = $(this).children('tbody').children('tr:lt(' + iLen + ')');
				for ( i=0 ; i<iLen ; i++ )
				{
					if ( anRows.hasClass( oSettings.asStripeClasses[i] ) )
					{
						bStripeRemove = true;
						
						/* Store the classes which we are about to remove so they can be re-added on destroy */
						oSettings.asDestroyStripes.push( oSettings.asStripeClasses[i] );
					}
				}
				
				if ( bStripeRemove )
				{
					anRows.removeClass( oSettings.asStripeClasses.join(' ') );
				}
			}
			
			/*
			 * Columns
			 * See if we should load columns automatically or use defined ones
			 */
			var anThs = [];
			var aoColumnsInit;
			var nThead = this.getElementsByTagName('thead');
			if ( nThead.length !== 0 )
			{
				_fnDetectHeader( oSettings.aoHeader, nThead[0] );
				anThs = _fnGetUniqueThs( oSettings );
			}
			
			/* If not given a column array, generate one with nulls */
			if ( oInit.aoColumns === null )
			{
				aoColumnsInit = [];
				for ( i=0, iLen=anThs.length ; i<iLen ; i++ )
				{
					aoColumnsInit.push( null );
				}
			}
			else
			{
				aoColumnsInit = oInit.aoColumns;
			}
			
			/* Add the columns */
			for ( i=0, iLen=aoColumnsInit.length ; i<iLen ; i++ )
			{
				/* Short cut - use the loop to check if we have column visibility state to restore */
				if ( oInit.saved_aoColumns !== undefined && oInit.saved_aoColumns.length == iLen )
				{
					if ( aoColumnsInit[i] === null )
					{
						aoColumnsInit[i] = {};
					}
					aoColumnsInit[i].bVisible = oInit.saved_aoColumns[i].bVisible;
				}
				
				_fnAddColumn( oSettings, anThs ? anThs[i] : null );
			}
			
			/* Apply the column definitions */
			_fnApplyColumnDefs( oSettings, oInit.aoColumnDefs, aoColumnsInit, function (iCol, oDef) {
				_fnColumnOptions( oSettings, iCol, oDef );
			} );
			
			
			/*
			 * Sorting
			 * Check the aaSorting array
			 */
			for ( i=0, iLen=oSettings.aaSorting.length ; i<iLen ; i++ )
			{
				if ( oSettings.aaSorting[i][0] >= oSettings.aoColumns.length )
				{
					oSettings.aaSorting[i][0] = 0;
				}
				var oColumn = oSettings.aoColumns[ oSettings.aaSorting[i][0] ];
				
				/* Add a default sorting index */
				if ( oSettings.aaSorting[i][2] === undefined )
				{
					oSettings.aaSorting[i][2] = 0;
				}
				
				/* If aaSorting is not defined, then we use the first indicator in asSorting */
				if ( oInit.aaSorting === undefined && oSettings.saved_aaSorting === undefined )
				{
					oSettings.aaSorting[i][1] = oColumn.asSorting[0];
				}
				
				/* Set the current sorting index based on aoColumns.asSorting */
				for ( j=0, jLen=oColumn.asSorting.length ; j<jLen ; j++ )
				{
					if ( oSettings.aaSorting[i][1] == oColumn.asSorting[j] )
					{
						oSettings.aaSorting[i][2] = j;
						break;
					}
				}
			}
				
			/* Do a first pass on the sorting classes (allows any size changes to be taken into
			 * account, and also will apply sorting disabled classes if disabled
			 */
			_fnSortingClasses( oSettings );
			
			
			/*
			 * Final init
			 * Cache the header, body and footer as required, creating them if needed
			 */
			
			/* Browser support detection */
			_fnBrowserDetect( oSettings );
			
			// Work around for Webkit bug 83867 - store the caption-side before removing from doc
			var captions = $(this).children('caption').each( function () {
				this._captionSide = $(this).css('caption-side');
			} );
			
			var thead = $(this).children('thead');
			if ( thead.length === 0 )
			{
				thead = [ document.createElement( 'thead' ) ];
				this.appendChild( thead[0] );
			}
			oSettings.nTHead = thead[0];
			
			var tbody = $(this).children('tbody');
			if ( tbody.length === 0 )
			{
				tbody = [ document.createElement( 'tbody' ) ];
				this.appendChild( tbody[0] );
			}
			oSettings.nTBody = tbody[0];
			oSettings.nTBody.setAttribute( "role", "alert" );
			oSettings.nTBody.setAttribute( "aria-live", "polite" );
			oSettings.nTBody.setAttribute( "aria-relevant", "all" );
			
			var tfoot = $(this).children('tfoot');
			if ( tfoot.length === 0 && captions.length > 0 && (oSettings.oScroll.sX !== "" || oSettings.oScroll.sY !== "") )
			{
				// If we are a scrolling table, and no footer has been given, then we need to create
				// a tfoot element for the caption element to be appended to
				tfoot = [ document.createElement( 'tfoot' ) ];
				this.appendChild( tfoot[0] );
			}
			
			if ( tfoot.length > 0 )
			{
				oSettings.nTFoot = tfoot[0];
				_fnDetectHeader( oSettings.aoFooter, oSettings.nTFoot );
			}
			
			/* Check if there is data passing into the constructor */
			if ( bUsePassedData )
			{
				for ( i=0 ; i<oInit.aaData.length ; i++ )
				{
					_fnAddData( oSettings, oInit.aaData[ i ] );
				}
			}
			else
			{
				/* Grab the data from the page */
				_fnGatherData( oSettings );
			}
			
			/* Copy the data index array */
			oSettings.aiDisplay = oSettings.aiDisplayMaster.slice();
			
			/* Initialisation complete - table can be drawn */
			oSettings.bInitialised = true;
			
			/* Check if we need to initialise the table (it might not have been handed off to the
			 * language processor)
			 */
			if ( bInitHandedOff === false )
			{
				_fnInitialise( oSettings );
			}
		} );
		_that = null;
		return this;
	};

	
	
	/**
	 * Provide a common method for plug-ins to check the version of DataTables being used, in order
	 * to ensure compatibility.
	 *  @param {string} sVersion Version string to check for, in the format "X.Y.Z". Note that the
	 *    formats "X" and "X.Y" are also acceptable.
	 *  @returns {boolean} true if this version of DataTables is greater or equal to the required
	 *    version, or false if this version of DataTales is not suitable
	 *  @static
	 *  @dtopt API-Static
	 *
	 *  @example
	 *    alert( $.fn.dataTable.fnVersionCheck( '1.9.0' ) );
	 */
	DataTable.fnVersionCheck = function( sVersion )
	{
		/* This is cheap, but effective */
		var fnZPad = function (Zpad, count)
		{
			while(Zpad.length < count) {
				Zpad += '0';
			}
			return Zpad;
		};
		var aThis = DataTable.ext.sVersion.split('.');
		var aThat = sVersion.split('.');
		var sThis = '', sThat = '';
		
		for ( var i=0, iLen=aThat.length ; i<iLen ; i++ )
		{
			sThis += fnZPad( aThis[i], 3 );
			sThat += fnZPad( aThat[i], 3 );
		}
		
		return parseInt(sThis, 10) >= parseInt(sThat, 10);
	};
	
	
	/**
	 * Check if a TABLE node is a DataTable table already or not.
	 *  @param {node} nTable The TABLE node to check if it is a DataTable or not (note that other
	 *    node types can be passed in, but will always return false).
	 *  @returns {boolean} true the table given is a DataTable, or false otherwise
	 *  @static
	 *  @dtopt API-Static
	 *
	 *  @example
	 *    var ex = document.getElementById('example');
	 *    if ( ! $.fn.DataTable.fnIsDataTable( ex ) ) {
	 *      $(ex).dataTable();
	 *    }
	 */
	DataTable.fnIsDataTable = function ( nTable )
	{
		var o = DataTable.settings;
	
		for ( var i=0 ; i<o.length ; i++ )
		{
			if ( o[i].nTable === nTable || o[i].nScrollHead === nTable || o[i].nScrollFoot === nTable )
			{
				return true;
			}
		}
	
		return false;
	};
	
	
	/**
	 * Get all DataTable tables that have been initialised - optionally you can select to
	 * get only currently visible tables.
	 *  @param {boolean} [bVisible=false] Flag to indicate if you want all (default) or 
	 *    visible tables only.
	 *  @returns {array} Array of TABLE nodes (not DataTable instances) which are DataTables
	 *  @static
	 *  @dtopt API-Static
	 *
	 *  @example
	 *    var table = $.fn.dataTable.fnTables(true);
	 *    if ( table.length > 0 ) {
	 *      $(table).dataTable().fnAdjustColumnSizing();
	 *    }
	 */
	DataTable.fnTables = function ( bVisible )
	{
		var out = [];
	
		jQuery.each( DataTable.settings, function (i, o) {
			if ( !bVisible || (bVisible === true && $(o.nTable).is(':visible')) )
			{
				out.push( o.nTable );
			}
		} );
	
		return out;
	};
	

	/**
	 * Version string for plug-ins to check compatibility. Allowed format is
	 * a.b.c.d.e where: a:int, b:int, c:int, d:string(dev|beta), e:int. d and
	 * e are optional
	 *  @member
	 *  @type string
	 *  @default Version number
	 */
	DataTable.version = "1.9.4";

	/**
	 * Private data store, containing all of the settings objects that are created for the
	 * tables on a given page.
	 * 
	 * Note that the <i>DataTable.settings</i> object is aliased to <i>jQuery.fn.dataTableExt</i> 
	 * through which it may be accessed and manipulated, or <i>jQuery.fn.dataTable.settings</i>.
	 *  @member
	 *  @type array
	 *  @default []
	 *  @private
	 */
	DataTable.settings = [];

	/**
	 * Object models container, for the various models that DataTables has available
	 * to it. These models define the objects that are used to hold the active state 
	 * and configuration of the table.
	 *  @namespace
	 */
	DataTable.models = {};
	
	
	/**
	 * DataTables extension options and plug-ins. This namespace acts as a collection "area"
	 * for plug-ins that can be used to extend the default DataTables behaviour - indeed many
	 * of the build in methods use this method to provide their own capabilities (sorting methods
	 * for example).
	 * 
	 * Note that this namespace is aliased to jQuery.fn.dataTableExt so it can be readily accessed
	 * and modified by plug-ins.
	 *  @namespace
	 */
	DataTable.models.ext = {
		/**
		 * Plug-in filtering functions - this method of filtering is complimentary to the default
		 * type based filtering, and a lot more comprehensive as it allows you complete control
		 * over the filtering logic. Each element in this array is a function (parameters
		 * described below) that is called for every row in the table, and your logic decides if
		 * it should be included in the filtered data set or not.
		 *   <ul>
		 *     <li>
		 *       Function input parameters:
		 *       <ul>
		 *         <li>{object} DataTables settings object: see {@link DataTable.models.oSettings}.</li>
		 *         <li>{array|object} Data for the row to be processed (same as the original format
		 *           that was passed in as the data source, or an array from a DOM data source</li>
		 *         <li>{int} Row index in aoData ({@link DataTable.models.oSettings.aoData}), which can
		 *           be useful to retrieve the TR element if you need DOM interaction.</li>
		 *       </ul>
		 *     </li>
		 *     <li>
		 *       Function return:
		 *       <ul>
		 *         <li>{boolean} Include the row in the filtered result set (true) or not (false)</li>
		 *       </ul>
		 *     </il>
		 *   </ul>
		 *  @type array
		 *  @default []
		 *
		 *  @example
		 *    // The following example shows custom filtering being applied to the fourth column (i.e.
		 *    // the aData[3] index) based on two input values from the end-user, matching the data in 
		 *    // a certain range.
		 *    $.fn.dataTableExt.afnFiltering.push(
		 *      function( oSettings, aData, iDataIndex ) {
		 *        var iMin = document.getElementById('min').value * 1;
		 *        var iMax = document.getElementById('max').value * 1;
		 *        var iVersion = aData[3] == "-" ? 0 : aData[3]*1;
		 *        if ( iMin == "" && iMax == "" ) {
		 *          return true;
		 *        }
		 *        else if ( iMin == "" && iVersion < iMax ) {
		 *          return true;
		 *        }
		 *        else if ( iMin < iVersion && "" == iMax ) {
		 *          return true;
		 *        }
		 *        else if ( iMin < iVersion && iVersion < iMax ) {
		 *          return true;
		 *        }
		 *        return false;
		 *      }
		 *    );
		 */
		"afnFiltering": [],
	
	
		/**
		 * Plug-in sorting functions - this method of sorting is complimentary to the default type
		 * based sorting that DataTables does automatically, allowing much greater control over the
		 * the data that is being used to sort a column. This is useful if you want to do sorting
		 * based on live data (for example the contents of an 'input' element) rather than just the
		 * static string that DataTables knows of. The way these plug-ins work is that you create
		 * an array of the values you wish to be sorted for the column in question and then return
		 * that array. Which pre-sorting function is run here depends on the sSortDataType parameter
		 * that is used for the column (if any). This is the corollary of <i>ofnSearch</i> for sort 
		 * data.
		 *   <ul>
	     *     <li>
	     *       Function input parameters:
	     *       <ul>
		 *         <li>{object} DataTables settings object: see {@link DataTable.models.oSettings}.</li>
	     *         <li>{int} Target column index</li>
	     *       </ul>
	     *     </li>
		 *     <li>
		 *       Function return:
		 *       <ul>
		 *         <li>{array} Data for the column to be sorted upon</li>
		 *       </ul>
		 *     </il>
		 *   </ul>
		 *  
		 * Note that as of v1.9, it is typically preferable to use <i>mData</i> to prepare data for
		 * the different uses that DataTables can put the data to. Specifically <i>mData</i> when
		 * used as a function will give you a 'type' (sorting, filtering etc) that you can use to 
		 * prepare the data as required for the different types. As such, this method is deprecated.
		 *  @type array
		 *  @default []
		 *  @deprecated
		 *
		 *  @example
		 *    // Updating the cached sorting information with user entered values in HTML input elements
		 *    jQuery.fn.dataTableExt.afnSortData['dom-text'] = function ( oSettings, iColumn )
		 *    {
		 *      var aData = [];
		 *      $( 'td:eq('+iColumn+') input', oSettings.oApi._fnGetTrNodes(oSettings) ).each( function () {
		 *        aData.push( this.value );
		 *      } );
		 *      return aData;
		 *    }
		 */
		"afnSortData": [],
	
	
		/**
		 * Feature plug-ins - This is an array of objects which describe the feature plug-ins that are
		 * available to DataTables. These feature plug-ins are accessible through the sDom initialisation
		 * option. As such, each feature plug-in must describe a function that is used to initialise
		 * itself (fnInit), a character so the feature can be enabled by sDom (cFeature) and the name
		 * of the feature (sFeature). Thus the objects attached to this method must provide:
		 *   <ul>
		 *     <li>{function} fnInit Initialisation of the plug-in
		 *       <ul>
	     *         <li>
	     *           Function input parameters:
	     *           <ul>
		 *             <li>{object} DataTables settings object: see {@link DataTable.models.oSettings}.</li>
	     *           </ul>
	     *         </li>
		 *         <li>
		 *           Function return:
		 *           <ul>
		 *             <li>{node|null} The element which contains your feature. Note that the return
		 *                may also be void if your plug-in does not require to inject any DOM elements 
		 *                into DataTables control (sDom) - for example this might be useful when 
		 *                developing a plug-in which allows table control via keyboard entry.</li>
		 *           </ul>
		 *         </il>
		 *       </ul>
		 *     </li>
		 *     <li>{character} cFeature Character that will be matched in sDom - case sensitive</li>
		 *     <li>{string} sFeature Feature name</li>
		 *   </ul>
		 *  @type array
		 *  @default []
		 * 
		 *  @example
		 *    // How TableTools initialises itself.
		 *    $.fn.dataTableExt.aoFeatures.push( {
		 *      "fnInit": function( oSettings ) {
		 *        return new TableTools( { "oDTSettings": oSettings } );
		 *      },
		 *      "cFeature": "T",
		 *      "sFeature": "TableTools"
		 *    } );
		 */
		"aoFeatures": [],
	
	
		/**
		 * Type detection plug-in functions - DataTables utilises types to define how sorting and
		 * filtering behave, and types can be either  be defined by the developer (sType for the
		 * column) or they can be automatically detected by the methods in this array. The functions
		 * defined in the array are quite simple, taking a single parameter (the data to analyse) 
		 * and returning the type if it is a known type, or null otherwise.
		 *   <ul>
	     *     <li>
	     *       Function input parameters:
	     *       <ul>
		 *         <li>{*} Data from the column cell to be analysed</li>
	     *       </ul>
	     *     </li>
		 *     <li>
		 *       Function return:
		 *       <ul>
		 *         <li>{string|null} Data type detected, or null if unknown (and thus pass it
		 *           on to the other type detection functions.</li>
		 *       </ul>
		 *     </il>
		 *   </ul>
		 *  @type array
		 *  @default []
		 *  
		 *  @example
		 *    // Currency type detection plug-in:
		 *    jQuery.fn.dataTableExt.aTypes.push(
		 *      function ( sData ) {
		 *        var sValidChars = "0123456789.-";
		 *        var Char;
		 *        
		 *        // Check the numeric part
		 *        for ( i=1 ; i<sData.length ; i++ ) {
		 *          Char = sData.charAt(i); 
		 *          if (sValidChars.indexOf(Char) == -1) {
		 *            return null;
		 *          }
		 *        }
		 *        
		 *        // Check prefixed by currency
		 *        if ( sData.charAt(0) == '$' || sData.charAt(0) == '&pound;' ) {
		 *          return 'currency';
		 *        }
		 *        return null;
		 *      }
		 *    );
		 */
		"aTypes": [],
	
	
		/**
		 * Provide a common method for plug-ins to check the version of DataTables being used, 
		 * in order to ensure compatibility.
		 *  @type function
		 *  @param {string} sVersion Version string to check for, in the format "X.Y.Z". Note 
		 *    that the formats "X" and "X.Y" are also acceptable.
		 *  @returns {boolean} true if this version of DataTables is greater or equal to the 
		 *    required version, or false if this version of DataTales is not suitable
		 *
		 *  @example
		 *    $(document).ready(function() {
		 *      var oTable = $('#example').dataTable();
		 *      alert( oTable.fnVersionCheck( '1.9.0' ) );
		 *    } );
		 */
		"fnVersionCheck": DataTable.fnVersionCheck,
	
	
		/**
		 * Index for what 'this' index API functions should use
		 *  @type int
		 *  @default 0
		 */
		"iApiIndex": 0,
	
	
		/**
		 * Pre-processing of filtering data plug-ins - When you assign the sType for a column
		 * (or have it automatically detected for you by DataTables or a type detection plug-in), 
		 * you will typically be using this for custom sorting, but it can also be used to provide 
		 * custom filtering by allowing you to pre-processing the data and returning the data in
		 * the format that should be filtered upon. This is done by adding functions this object 
		 * with a parameter name which matches the sType for that target column. This is the
		 * corollary of <i>afnSortData</i> for filtering data.
		 *   <ul>
	     *     <li>
	     *       Function input parameters:
	     *       <ul>
		 *         <li>{*} Data from the column cell to be prepared for filtering</li>
	     *       </ul>
	     *     </li>
		 *     <li>
		 *       Function return:
		 *       <ul>
		 *         <li>{string|null} Formatted string that will be used for the filtering.</li>
		 *       </ul>
		 *     </il>
		 *   </ul>
		 * 
		 * Note that as of v1.9, it is typically preferable to use <i>mData</i> to prepare data for
		 * the different uses that DataTables can put the data to. Specifically <i>mData</i> when
		 * used as a function will give you a 'type' (sorting, filtering etc) that you can use to 
		 * prepare the data as required for the different types. As such, this method is deprecated.
		 *  @type object
		 *  @default {}
		 *  @deprecated
		 *
		 *  @example
		 *    $.fn.dataTableExt.ofnSearch['title-numeric'] = function ( sData ) {
		 *      return sData.replace(/\n/g," ").replace( /<.*?>/g, "" );
		 *    }
		 */
		"ofnSearch": {},
	
	
		/**
		 * Container for all private functions in DataTables so they can be exposed externally
		 *  @type object
		 *  @default {}
		 */
		"oApi": {},
	
	
		/**
		 * Storage for the various classes that DataTables uses
		 *  @type object
		 *  @default {}
		 */
		"oStdClasses": {},
		
	
		/**
		 * Storage for the various classes that DataTables uses - jQuery UI suitable
		 *  @type object
		 *  @default {}
		 */
		"oJUIClasses": {},
	
	
		/**
		 * Pagination plug-in methods - The style and controls of the pagination can significantly 
		 * impact on how the end user interacts with the data in your table, and DataTables allows 
		 * the addition of pagination controls by extending this object, which can then be enabled
		 * through the <i>sPaginationType</i> initialisation parameter. Each pagination type that
		 * is added is an object (the property name of which is what <i>sPaginationType</i> refers
		 * to) that has two properties, both methods that are used by DataTables to update the
		 * control's state.
		 *   <ul>
		 *     <li>
		 *       fnInit -  Initialisation of the paging controls. Called only during initialisation 
		 *         of the table. It is expected that this function will add the required DOM elements 
		 *         to the page for the paging controls to work. The element pointer 
		 *         'oSettings.aanFeatures.p' array is provided by DataTables to contain the paging 
		 *         controls (note that this is a 2D array to allow for multiple instances of each 
		 *         DataTables DOM element). It is suggested that you add the controls to this element 
		 *         as children
		 *       <ul>
	     *         <li>
	     *           Function input parameters:
	     *           <ul>
		 *             <li>{object} DataTables settings object: see {@link DataTable.models.oSettings}.</li>
		 *             <li>{node} Container into which the pagination controls must be inserted</li>
		 *             <li>{function} Draw callback function - whenever the controls cause a page
		 *               change, this method must be called to redraw the table.</li>
	     *           </ul>
	     *         </li>
		 *         <li>
		 *           Function return:
		 *           <ul>
		 *             <li>No return required</li>
		 *           </ul>
		 *         </il>
		 *       </ul>
		 *     </il>
		 *     <li>
		 *       fnInit -  This function is called whenever the paging status of the table changes and is
		 *         typically used to update classes and/or text of the paging controls to reflex the new 
		 *         status.
		 *       <ul>
	     *         <li>
	     *           Function input parameters:
	     *           <ul>
		 *             <li>{object} DataTables settings object: see {@link DataTable.models.oSettings}.</li>
		 *             <li>{function} Draw callback function - in case you need to redraw the table again
		 *               or attach new event listeners</li>
	     *           </ul>
	     *         </li>
		 *         <li>
		 *           Function return:
		 *           <ul>
		 *             <li>No return required</li>
		 *           </ul>
		 *         </il>
		 *       </ul>
		 *     </il>
		 *   </ul>
		 *  @type object
		 *  @default {}
		 *
		 *  @example
		 *    $.fn.dataTableExt.oPagination.four_button = {
		 *      "fnInit": function ( oSettings, nPaging, fnCallbackDraw ) {
		 *        nFirst = document.createElement( 'span' );
		 *        nPrevious = document.createElement( 'span' );
		 *        nNext = document.createElement( 'span' );
		 *        nLast = document.createElement( 'span' );
		 *        
		 *        nFirst.appendChild( document.createTextNode( oSettings.oLanguage.oPaginate.sFirst ) );
		 *        nPrevious.appendChild( document.createTextNode( oSettings.oLanguage.oPaginate.sPrevious ) );
		 *        nNext.appendChild( document.createTextNode( oSettings.oLanguage.oPaginate.sNext ) );
		 *        nLast.appendChild( document.createTextNode( oSettings.oLanguage.oPaginate.sLast ) );
		 *        
		 *        nFirst.className = "paginate_button first";
		 *        nPrevious.className = "paginate_button previous";
		 *        nNext.className="paginate_button next";
		 *        nLast.className = "paginate_button last";
		 *        
		 *        nPaging.appendChild( nFirst );
		 *        nPaging.appendChild( nPrevious );
		 *        nPaging.appendChild( nNext );
		 *        nPaging.appendChild( nLast );
		 *        
		 *        $(nFirst).click( function () {
		 *          oSettings.oApi._fnPageChange( oSettings, "first" );
		 *          fnCallbackDraw( oSettings );
		 *        } );
		 *        
		 *        $(nPrevious).click( function() {
		 *          oSettings.oApi._fnPageChange( oSettings, "previous" );
		 *          fnCallbackDraw( oSettings );
		 *        } );
		 *        
		 *        $(nNext).click( function() {
		 *          oSettings.oApi._fnPageChange( oSettings, "next" );
		 *          fnCallbackDraw( oSettings );
		 *        } );
		 *        
		 *        $(nLast).click( function() {
		 *          oSettings.oApi._fnPageChange( oSettings, "last" );
		 *          fnCallbackDraw( oSettings );
		 *        } );
		 *        
		 *        $(nFirst).bind( 'selectstart', function () { return false; } );
		 *        $(nPrevious).bind( 'selectstart', function () { return false; } );
		 *        $(nNext).bind( 'selectstart', function () { return false; } );
		 *        $(nLast).bind( 'selectstart', function () { return false; } );
		 *      },
		 *      
		 *      "fnUpdate": function ( oSettings, fnCallbackDraw ) {
		 *        if ( !oSettings.aanFeatures.p ) {
		 *          return;
		 *        }
		 *        
		 *        // Loop over each instance of the pager
		 *        var an = oSettings.aanFeatures.p;
		 *        for ( var i=0, iLen=an.length ; i<iLen ; i++ ) {
		 *          var buttons = an[i].getElementsByTagName('span');
		 *          if ( oSettings._iDisplayStart === 0 ) {
		 *            buttons[0].className = "paginate_disabled_previous";
		 *            buttons[1].className = "paginate_disabled_previous";
		 *          }
		 *          else {
		 *            buttons[0].className = "paginate_enabled_previous";
		 *            buttons[1].className = "paginate_enabled_previous";
		 *          }
		 *          
		 *          if ( oSettings.fnDisplayEnd() == oSettings.fnRecordsDisplay() ) {
		 *            buttons[2].className = "paginate_disabled_next";
		 *            buttons[3].className = "paginate_disabled_next";
		 *          }
		 *          else {
		 *            buttons[2].className = "paginate_enabled_next";
		 *            buttons[3].className = "paginate_enabled_next";
		 *          }
		 *        }
		 *      }
		 *    };
		 */
		"oPagination": {},
	
	
		/**
		 * Sorting plug-in methods - Sorting in DataTables is based on the detected type of the
		 * data column (you can add your own type detection functions, or override automatic 
		 * detection using sType). With this specific type given to the column, DataTables will 
		 * apply the required sort from the functions in the object. Each sort type must provide
		 * two mandatory methods, one each for ascending and descending sorting, and can optionally
		 * provide a pre-formatting method that will help speed up sorting by allowing DataTables
		 * to pre-format the sort data only once (rather than every time the actual sort functions
		 * are run). The two sorting functions are typical Javascript sort methods:
		 *   <ul>
	     *     <li>
	     *       Function input parameters:
	     *       <ul>
		 *         <li>{*} Data to compare to the second parameter</li>
		 *         <li>{*} Data to compare to the first parameter</li>
	     *       </ul>
	     *     </li>
		 *     <li>
		 *       Function return:
		 *       <ul>
		 *         <li>{int} Sorting match: <0 if first parameter should be sorted lower than
		 *           the second parameter, ===0 if the two parameters are equal and >0 if
		 *           the first parameter should be sorted height than the second parameter.</li>
		 *       </ul>
		 *     </il>
		 *   </ul>
		 *  @type object
		 *  @default {}
		 *
		 *  @example
		 *    // Case-sensitive string sorting, with no pre-formatting method
		 *    $.extend( $.fn.dataTableExt.oSort, {
		 *      "string-case-asc": function(x,y) {
		 *        return ((x < y) ? -1 : ((x > y) ? 1 : 0));
		 *      },
		 *      "string-case-desc": function(x,y) {
		 *        return ((x < y) ? 1 : ((x > y) ? -1 : 0));
		 *      }
		 *    } );
		 *
		 *  @example
		 *    // Case-insensitive string sorting, with pre-formatting
		 *    $.extend( $.fn.dataTableExt.oSort, {
		 *      "string-pre": function(x) {
		 *        return x.toLowerCase();
		 *      },
		 *      "string-asc": function(x,y) {
		 *        return ((x < y) ? -1 : ((x > y) ? 1 : 0));
		 *      },
		 *      "string-desc": function(x,y) {
		 *        return ((x < y) ? 1 : ((x > y) ? -1 : 0));
		 *      }
		 *    } );
		 */
		"oSort": {},
	
	
		/**
		 * Version string for plug-ins to check compatibility. Allowed format is
		 * a.b.c.d.e where: a:int, b:int, c:int, d:string(dev|beta), e:int. d and
		 * e are optional
		 *  @type string
		 *  @default Version number
		 */
		"sVersion": DataTable.version,
	
	
		/**
		 * How should DataTables report an error. Can take the value 'alert' or 'throw'
		 *  @type string
		 *  @default alert
		 */
		"sErrMode": "alert",
	
	
		/**
		 * Store information for DataTables to access globally about other instances
		 *  @namespace
		 *  @private
		 */
		"_oExternConfig": {
			/* int:iNextUnique - next unique number for an instance */
			"iNextUnique": 0
		}
	};
	
	
	
	
	/**
	 * Template object for the way in which DataTables holds information about
	 * search information for the global filter and individual column filters.
	 *  @namespace
	 */
	DataTable.models.oSearch = {
		/**
		 * Flag to indicate if the filtering should be case insensitive or not
		 *  @type boolean
		 *  @default true
		 */
		"bCaseInsensitive": true,
	
		/**
		 * Applied search term
		 *  @type string
		 *  @default <i>Empty string</i>
		 */
		"sSearch": "",
	
		/**
		 * Flag to indicate if the search term should be interpreted as a
		 * regular expression (true) or not (false) and therefore and special
		 * regex characters escaped.
		 *  @type boolean
		 *  @default false
		 */
		"bRegex": false,
	
		/**
		 * Flag to indicate if DataTables is to use its smart filtering or not.
		 *  @type boolean
		 *  @default true
		 */
		"bSmart": true
	};
	
	
	
	
	/**
	 * Template object for the way in which DataTables holds information about
	 * each individual row. This is the object format used for the settings 
	 * aoData array.
	 *  @namespace
	 */
	DataTable.models.oRow = {
		/**
		 * TR element for the row
		 *  @type node
		 *  @default null
		 */
		"nTr": null,
	
		/**
		 * Data object from the original data source for the row. This is either
		 * an array if using the traditional form of DataTables, or an object if
		 * using mData options. The exact type will depend on the passed in
		 * data from the data source, or will be an array if using DOM a data 
		 * source.
		 *  @type array|object
		 *  @default []
		 */
		"_aData": [],
	
		/**
		 * Sorting data cache - this array is ostensibly the same length as the
		 * number of columns (although each index is generated only as it is 
		 * needed), and holds the data that is used for sorting each column in the
		 * row. We do this cache generation at the start of the sort in order that
		 * the formatting of the sort data need be done only once for each cell
		 * per sort. This array should not be read from or written to by anything
		 * other than the master sorting methods.
		 *  @type array
		 *  @default []
		 *  @private
		 */
		"_aSortData": [],
	
		/**
		 * Array of TD elements that are cached for hidden rows, so they can be
		 * reinserted into the table if a column is made visible again (or to act
		 * as a store if a column is made hidden). Only hidden columns have a 
		 * reference in the array. For non-hidden columns the value is either
		 * undefined or null.
		 *  @type array nodes
		 *  @default []
		 *  @private
		 */
		"_anHidden": [],
	
		/**
		 * Cache of the class name that DataTables has applied to the row, so we
		 * can quickly look at this variable rather than needing to do a DOM check
		 * on className for the nTr property.
		 *  @type string
		 *  @default <i>Empty string</i>
		 *  @private
		 */
		"_sRowStripe": ""
	};
	
	
	
	/**
	 * Template object for the column information object in DataTables. This object
	 * is held in the settings aoColumns array and contains all the information that
	 * DataTables needs about each individual column.
	 * 
	 * Note that this object is related to {@link DataTable.defaults.columns} 
	 * but this one is the internal data store for DataTables's cache of columns.
	 * It should NOT be manipulated outside of DataTables. Any configuration should
	 * be done through the initialisation options.
	 *  @namespace
	 */
	DataTable.models.oColumn = {
		/**
		 * A list of the columns that sorting should occur on when this column
		 * is sorted. That this property is an array allows multi-column sorting
		 * to be defined for a column (for example first name / last name columns
		 * would benefit from this). The values are integers pointing to the
		 * columns to be sorted on (typically it will be a single integer pointing
		 * at itself, but that doesn't need to be the case).
		 *  @type array
		 */
		"aDataSort": null,
	
		/**
		 * Define the sorting directions that are applied to the column, in sequence
		 * as the column is repeatedly sorted upon - i.e. the first value is used
		 * as the sorting direction when the column if first sorted (clicked on).
		 * Sort it again (click again) and it will move on to the next index.
		 * Repeat until loop.
		 *  @type array
		 */
		"asSorting": null,
		
		/**
		 * Flag to indicate if the column is searchable, and thus should be included
		 * in the filtering or not.
		 *  @type boolean
		 */
		"bSearchable": null,
		
		/**
		 * Flag to indicate if the column is sortable or not.
		 *  @type boolean
		 */
		"bSortable": null,
		
		/**
		 * <code>Deprecated</code> When using fnRender, you have two options for what 
		 * to do with the data, and this property serves as the switch. Firstly, you 
		 * can have the sorting and filtering use the rendered value (true - default), 
		 * or you can have the sorting and filtering us the original value (false).
		 *
		 * Please note that this option has now been deprecated and will be removed
		 * in the next version of DataTables. Please use mRender / mData rather than
		 * fnRender.
		 *  @type boolean
		 *  @deprecated
		 */
		"bUseRendered": null,
		
		/**
		 * Flag to indicate if the column is currently visible in the table or not
		 *  @type boolean
		 */
		"bVisible": null,
		
		/**
		 * Flag to indicate to the type detection method if the automatic type
		 * detection should be used, or if a column type (sType) has been specified
		 *  @type boolean
		 *  @default true
		 *  @private
		 */
		"_bAutoType": true,
		
		/**
		 * Developer definable function that is called whenever a cell is created (Ajax source,
		 * etc) or processed for input (DOM source). This can be used as a compliment to mRender
		 * allowing you to modify the DOM element (add background colour for example) when the
		 * element is available.
		 *  @type function
		 *  @param {element} nTd The TD node that has been created
		 *  @param {*} sData The Data for the cell
		 *  @param {array|object} oData The data for the whole row
		 *  @param {int} iRow The row index for the aoData data store
		 *  @default null
		 */
		"fnCreatedCell": null,
		
		/**
		 * Function to get data from a cell in a column. You should <b>never</b>
		 * access data directly through _aData internally in DataTables - always use
		 * the method attached to this property. It allows mData to function as
		 * required. This function is automatically assigned by the column 
		 * initialisation method
		 *  @type function
		 *  @param {array|object} oData The data array/object for the array 
		 *    (i.e. aoData[]._aData)
		 *  @param {string} sSpecific The specific data type you want to get - 
		 *    'display', 'type' 'filter' 'sort'
		 *  @returns {*} The data for the cell from the given row's data
		 *  @default null
		 */
		"fnGetData": null,
		
		/**
		 * <code>Deprecated</code> Custom display function that will be called for the 
		 * display of each cell in this column.
		 *
		 * Please note that this option has now been deprecated and will be removed
		 * in the next version of DataTables. Please use mRender / mData rather than
		 * fnRender.
		 *  @type function
		 *  @param {object} o Object with the following parameters:
		 *  @param {int}    o.iDataRow The row in aoData
		 *  @param {int}    o.iDataColumn The column in question
		 *  @param {array}  o.aData The data for the row in question
		 *  @param {object} o.oSettings The settings object for this DataTables instance
		 *  @returns {string} The string you which to use in the display
		 *  @default null
		 *  @deprecated
		 */
		"fnRender": null,
		
		/**
		 * Function to set data for a cell in the column. You should <b>never</b> 
		 * set the data directly to _aData internally in DataTables - always use
		 * this method. It allows mData to function as required. This function
		 * is automatically assigned by the column initialisation method
		 *  @type function
		 *  @param {array|object} oData The data array/object for the array 
		 *    (i.e. aoData[]._aData)
		 *  @param {*} sValue Value to set
		 *  @default null
		 */
		"fnSetData": null,
		
		/**
		 * Property to read the value for the cells in the column from the data 
		 * source array / object. If null, then the default content is used, if a
		 * function is given then the return from the function is used.
		 *  @type function|int|string|null
		 *  @default null
		 */
		"mData": null,
		
		/**
		 * Partner property to mData which is used (only when defined) to get
		 * the data - i.e. it is basically the same as mData, but without the
		 * 'set' option, and also the data fed to it is the result from mData.
		 * This is the rendering method to match the data method of mData.
		 *  @type function|int|string|null
		 *  @default null
		 */
		"mRender": null,
		
		/**
		 * Unique header TH/TD element for this column - this is what the sorting
		 * listener is attached to (if sorting is enabled.)
		 *  @type node
		 *  @default null
		 */
		"nTh": null,
		
		/**
		 * Unique footer TH/TD element for this column (if there is one). Not used 
		 * in DataTables as such, but can be used for plug-ins to reference the 
		 * footer for each column.
		 *  @type node
		 *  @default null
		 */
		"nTf": null,
		
		/**
		 * The class to apply to all TD elements in the table's TBODY for the column
		 *  @type string
		 *  @default null
		 */
		"sClass": null,
		
		/**
		 * When DataTables calculates the column widths to assign to each column,
		 * it finds the longest string in each column and then constructs a
		 * temporary table and reads the widths from that. The problem with this
		 * is that "mmm" is much wider then "iiii", but the latter is a longer 
		 * string - thus the calculation can go wrong (doing it properly and putting
		 * it into an DOM object and measuring that is horribly(!) slow). Thus as
		 * a "work around" we provide this option. It will append its value to the
		 * text that is found to be the longest string for the column - i.e. padding.
		 *  @type string
		 */
		"sContentPadding": null,
		
		/**
		 * Allows a default value to be given for a column's data, and will be used
		 * whenever a null data source is encountered (this can be because mData
		 * is set to null, or because the data source itself is null).
		 *  @type string
		 *  @default null
		 */
		"sDefaultContent": null,
		
		/**
		 * Name for the column, allowing reference to the column by name as well as
		 * by index (needs a lookup to work by name).
		 *  @type string
		 */
		"sName": null,
		
		/**
		 * Custom sorting data type - defines which of the available plug-ins in
		 * afnSortData the custom sorting will use - if any is defined.
		 *  @type string
		 *  @default std
		 */
		"sSortDataType": 'std',
		
		/**
		 * Class to be applied to the header element when sorting on this column
		 *  @type string
		 *  @default null
		 */
		"sSortingClass": null,
		
		/**
		 * Class to be applied to the header element when sorting on this column -
		 * when jQuery UI theming is used.
		 *  @type string
		 *  @default null
		 */
		"sSortingClassJUI": null,
		
		/**
		 * Title of the column - what is seen in the TH element (nTh).
		 *  @type string
		 */
		"sTitle": null,
		
		/**
		 * Column sorting and filtering type
		 *  @type string
		 *  @default null
		 */
		"sType": null,
		
		/**
		 * Width of the column
		 *  @type string
		 *  @default null
		 */
		"sWidth": null,
		
		/**
		 * Width of the column when it was first "encountered"
		 *  @type string
		 *  @default null
		 */
		"sWidthOrig": null
	};
	
	
	
	/**
	 * Initialisation options that can be given to DataTables at initialisation 
	 * time.
	 *  @namespace
	 */
	DataTable.defaults = {
		/**
		 * An array of data to use for the table, passed in at initialisation which 
		 * will be used in preference to any data which is already in the DOM. This is
		 * particularly useful for constructing tables purely in Javascript, for
		 * example with a custom Ajax call.
		 *  @type array
		 *  @default null
		 *  @dtopt Option
		 * 
		 *  @example
		 *    // Using a 2D array data source
		 *    $(document).ready( function () {
		 *      $('#example').dataTable( {
		 *        "aaData": [
		 *          ['Trident', 'Internet Explorer 4.0', 'Win 95+', 4, 'X'],
		 *          ['Trident', 'Internet Explorer 5.0', 'Win 95+', 5, 'C'],
		 *        ],
		 *        "aoColumns": [
		 *          { "sTitle": "Engine" },
		 *          { "sTitle": "Browser" },
		 *          { "sTitle": "Platform" },
		 *          { "sTitle": "Version" },
		 *          { "sTitle": "Grade" }
		 *        ]
		 *      } );
		 *    } );
		 *    
		 *  @example
		 *    // Using an array of objects as a data source (mData)
		 *    $(document).ready( function () {
		 *      $('#example').dataTable( {
		 *        "aaData": [
		 *          {
		 *            "engine":   "Trident",
		 *            "browser":  "Internet Explorer 4.0",
		 *            "platform": "Win 95+",
		 *            "version":  4,
		 *            "grade":    "X"
		 *          },
		 *          {
		 *            "engine":   "Trident",
		 *            "browser":  "Internet Explorer 5.0",
		 *            "platform": "Win 95+",
		 *            "version":  5,
		 *            "grade":    "C"
		 *          }
		 *        ],
		 *        "aoColumns": [
		 *          { "sTitle": "Engine",   "mData": "engine" },
		 *          { "sTitle": "Browser",  "mData": "browser" },
		 *          { "sTitle": "Platform", "mData": "platform" },
		 *          { "sTitle": "Version",  "mData": "version" },
		 *          { "sTitle": "Grade",    "mData": "grade" }
		 *        ]
		 *      } );
		 *    } );
		 */
		"aaData": null,
	
	
		/**
		 * If sorting is enabled, then DataTables will perform a first pass sort on 
		 * initialisation. You can define which column(s) the sort is performed upon, 
		 * and the sorting direction, with this variable. The aaSorting array should 
		 * contain an array for each column to be sorted initially containing the 
		 * column's index and a direction string ('asc' or 'desc').
		 *  @type array
		 *  @default [[0,'asc']]
		 *  @dtopt Option
		 * 
		 *  @example
		 *    // Sort by 3rd column first, and then 4th column
		 *    $(document).ready( function() {
		 *      $('#example').dataTable( {
		 *        "aaSorting": [[2,'asc'], [3,'desc']]
		 *      } );
		 *    } );
		 *    
		 *    // No initial sorting
		 *    $(document).ready( function() {
		 *      $('#example').dataTable( {
		 *        "aaSorting": []
		 *      } );
		 *    } );
		 */
		"aaSorting": [[0,'asc']],
	
	
		/**
		 * This parameter is basically identical to the aaSorting parameter, but 
		 * cannot be overridden by user interaction with the table. What this means 
		 * is that you could have a column (visible or hidden) which the sorting will 
		 * always be forced on first - any sorting after that (from the user) will 
		 * then be performed as required. This can be useful for grouping rows 
		 * together.
		 *  @type array
		 *  @default null
		 *  @dtopt Option
		 * 
		 *  @example
		 *    $(document).ready( function() {
		 *      $('#example').dataTable( {
		 *        "aaSortingFixed": [[0,'asc']]
		 *      } );
		 *    } )
		 */
		"aaSortingFixed": null,
	
	
		/**
		 * This parameter allows you to readily specify the entries in the length drop
		 * down menu that DataTables shows when pagination is enabled. It can be 
		 * either a 1D array of options which will be used for both the displayed 
		 * option and the value, or a 2D array which will use the array in the first 
		 * position as the value, and the array in the second position as the 
		 * displayed options (useful for language strings such as 'All').
		 *  @type array
		 *  @default [ 10, 25, 50, 100 ]
		 *  @dtopt Option
		 * 
		 *  @example
		 *    $(document).ready( function() {
		 *      $('#example').dataTable( {
		 *        "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
		 *      } );
		 *    } );
		 *  
		 *  @example
		 *    // Setting the default display length as well as length menu
		 *    // This is likely to be wanted if you remove the '10' option which
		 *    // is the iDisplayLength default.
		 *    $(document).ready( function() {
		 *      $('#example').dataTable( {
		 *        "iDisplayLength": 25,
		 *        "aLengthMenu": [[25, 50, 100, -1], [25, 50, 100, "All"]]
		 *      } );
		 *    } );
		 */
		"aLengthMenu": [ 10, 25, 50, 100 ],
	
	
		/**
		 * The aoColumns option in the initialisation parameter allows you to define
		 * details about the way individual columns behave. For a full list of
		 * column options that can be set, please see 
		 * {@link DataTable.defaults.columns}. Note that if you use aoColumns to
		 * define your columns, you must have an entry in the array for every single
		 * column that you have in your table (these can be null if you don't which
		 * to specify any options).
		 *  @member
		 */
		"aoColumns": null,
	
		/**
		 * Very similar to aoColumns, aoColumnDefs allows you to target a specific 
		 * column, multiple columns, or all columns, using the aTargets property of 
		 * each object in the array. This allows great flexibility when creating 
		 * tables, as the aoColumnDefs arrays can be of any length, targeting the 
		 * columns you specifically want. aoColumnDefs may use any of the column 
		 * options available: {@link DataTable.defaults.columns}, but it _must_
		 * have aTargets defined in each object in the array. Values in the aTargets
		 * array may be:
		 *   <ul>
		 *     <li>a string - class name will be matched on the TH for the column</li>
		 *     <li>0 or a positive integer - column index counting from the left</li>
		 *     <li>a negative integer - column index counting from the right</li>
		 *     <li>the string "_all" - all columns (i.e. assign a default)</li>
		 *   </ul>
		 *  @member
		 */
		"aoColumnDefs": null,
	
	
		/**
		 * Basically the same as oSearch, this parameter defines the individual column
		 * filtering state at initialisation time. The array must be of the same size 
		 * as the number of columns, and each element be an object with the parameters
		 * "sSearch" and "bEscapeRegex" (the latter is optional). 'null' is also
		 * accepted and the default will be used.
		 *  @type array
		 *  @default []
		 *  @dtopt Option
		 * 
		 *  @example
		 *    $(document).ready( function() {
		 *      $('#example').dataTable( {
		 *        "aoSearchCols": [
		 *          null,
		 *          { "sSearch": "My filter" },
		 *          null,
		 *          { "sSearch": "^[0-9]", "bEscapeRegex": false }
		 *        ]
		 *      } );
		 *    } )
		 */
		"aoSearchCols": [],
	
	
		/**
		 * An array of CSS classes that should be applied to displayed rows. This 
		 * array may be of any length, and DataTables will apply each class 
		 * sequentially, looping when required.
		 *  @type array
		 *  @default null <i>Will take the values determined by the oClasses.sStripe*
		 *    options</i>
		 *  @dtopt Option
		 * 
		 *  @example
		 *    $(document).ready( function() {
		 *      $('#example').dataTable( {
		 *        "asStripeClasses": [ 'strip1', 'strip2', 'strip3' ]
		 *      } );
		 *    } )
		 */
		"asStripeClasses": null,
	
	
		/**
		 * Enable or disable automatic column width calculation. This can be disabled
		 * as an optimisation (it takes some time to calculate the widths) if the
		 * tables widths are passed in using aoColumns.
		 *  @type boolean
		 *  @default true
		 *  @dtopt Features
		 * 
		 *  @example
		 *    $(document).ready( function () {
		 *      $('#example').dataTable( {
		 *        "bAutoWidth": false
		 *      } );
		 *    } );
		 */
		"bAutoWidth": true,
	
	
		/**
		 * Deferred rendering can provide DataTables with a huge speed boost when you
		 * are using an Ajax or JS data source for the table. This option, when set to
		 * true, will cause DataTables to defer the creation of the table elements for
		 * each row until they are needed for a draw - saving a significant amount of
		 * time.
		 *  @type boolean
		 *  @default false
		 *  @dtopt Features
		 * 
		 *  @example
		 *    $(document).ready( function() {
		 *      var oTable = $('#example').dataTable( {
		 *        "sAjaxSource": "sources/arrays.txt",
		 *        "bDeferRender": true
		 *      } );
		 *    } );
		 */
		"bDeferRender": false,
	
	
		/**
		 * Replace a DataTable which matches the given selector and replace it with 
		 * one which has the properties of the new initialisation object passed. If no
		 * table matches the selector, then the new DataTable will be constructed as
		 * per normal.
		 *  @type boolean
		 *  @default false
		 *  @dtopt Options
		 * 
		 *  @example
		 *    $(document).ready( function() {
		 *      $('#example').dataTable( {
		 *        "sScrollY": "200px",
		 *        "bPaginate": false
		 *      } );
		 *      
		 *      // Some time later....
		 *      $('#example').dataTable( {
		 *        "bFilter": false,
		 *        "bDestroy": true
		 *      } );
		 *    } );
		 */
		"bDestroy": false,
	
	
		/**
		 * Enable or disable filtering of data. Filtering in DataTables is "smart" in
		 * that it allows the end user to input multiple words (space separated) and
		 * will match a row containing those words, even if not in the order that was
		 * specified (this allow matching across multiple columns). Note that if you
		 * wish to use filtering in DataTables this must remain 'true' - to remove the
		 * default filtering input box and retain filtering abilities, please use
		 * {@link DataTable.defaults.sDom}.
		 *  @type boolean
		 *  @default true
		 *  @dtopt Features
		 * 
		 *  @example
		 *    $(document).ready( function () {
		 *      $('#example').dataTable( {
		 *        "bFilter": false
		 *      } );
		 *    } );
		 */
		"bFilter": true,
	
	
		/**
		 * Enable or disable the table information display. This shows information 
		 * about the data that is currently visible on the page, including information
		 * about filtered data if that action is being performed.
		 *  @type boolean
		 *  @default true
		 *  @dtopt Features
		 * 
		 *  @example
		 *    $(document).ready( function () {
		 *      $('#example').dataTable( {
		 *        "bInfo": false
		 *      } );
		 *    } );
		 */
		"bInfo": true,
	
	
		/**
		 * Enable jQuery UI ThemeRoller support (required as ThemeRoller requires some
		 * slightly different and additional mark-up from what DataTables has
		 * traditionally used).
		 *  @type boolean
		 *  @default false
		 *  @dtopt Features
		 * 
		 *  @example
		 *    $(document).ready( function() {
		 *      $('#example').dataTable( {
		 *        "bJQueryUI": true
		 *      } );
		 *    } );
		 */
		"bJQueryUI": false,
	
	
		/**
		 * Allows the end user to select the size of a formatted page from a select
		 * menu (sizes are 10, 25, 50 and 100). Requires pagination (bPaginate).
		 *  @type boolean
		 *  @default true
		 *  @dtopt Features
		 * 
		 *  @example
		 *    $(document).ready( function () {
		 *      $('#example').dataTable( {
		 *        "bLengthChange": false
		 *      } );
		 *    } );
		 */
		"bLengthChange": true,
	
	
		/**
		 * Enable or disable pagination.
		 *  @type boolean
		 *  @default true
		 *  @dtopt Features
		 * 
		 *  @example
		 *    $(document).ready( function () {
		 *      $('#example').dataTable( {
		 *        "bPaginate": false
		 *      } );
		 *    } );
		 */
		"bPaginate": true,
	
	
		/**
		 * Enable or disable the display of a 'processing' indicator when the table is
		 * being processed (e.g. a sort). This is particularly useful for tables with
		 * large amounts of data where it can take a noticeable amount of time to sort
		 * the entries.
		 *  @type boolean
		 *  @default false
		 *  @dtopt Features
		 * 
		 *  @example
		 *    $(document).ready( function () {
		 *      $('#example').dataTable( {
		 *        "bProcessing": true
		 *      } );
		 *    } );
		 */
		"bProcessing": false,
	
	
		/**
		 * Retrieve the DataTables object for the given selector. Note that if the
		 * table has already been initialised, this parameter will cause DataTables
		 * to simply return the object that has already been set up - it will not take
		 * account of any changes you might have made to the initialisation object
		 * passed to DataTables (setting this parameter to true is an acknowledgement
		 * that you understand this). bDestroy can be used to reinitialise a table if
		 * you need.
		 *  @type boolean
		 *  @default false
		 *  @dtopt Options
		 * 
		 *  @example
		 *    $(document).ready( function() {
		 *      initTable();
		 *      tableActions();
		 *    } );
		 *    
		 *    function initTable ()
		 *    {
		 *      return $('#example').dataTable( {
		 *        "sScrollY": "200px",
		 *        "bPaginate": false,
		 *        "bRetrieve": true
		 *      } );
		 *    }
		 *    
		 *    function tableActions ()
		 *    {
		 *      var oTable = initTable();
		 *      // perform API operations with oTable 
		 *    }
		 */
		"bRetrieve": false,
	
	
		/**
		 * Indicate if DataTables should be allowed to set the padding / margin
		 * etc for the scrolling header elements or not. Typically you will want
		 * this.
		 *  @type boolean
		 *  @default true
		 *  @dtopt Options
		 * 
		 *  @example
		 *    $(document).ready( function() {
		 *      $('#example').dataTable( {
		 *        "bScrollAutoCss": false,
		 *        "sScrollY": "200px"
		 *      } );
		 *    } );
		 */
		"bScrollAutoCss": true,
	
	
		/**
		 * When vertical (y) scrolling is enabled, DataTables will force the height of
		 * the table's viewport to the given height at all times (useful for layout).
		 * However, this can look odd when filtering data down to a small data set,
		 * and the footer is left "floating" further down. This parameter (when
		 * enabled) will cause DataTables to collapse the table's viewport down when
		 * the result set will fit within the given Y height.
		 *  @type boolean
		 *  @default false
		 *  @dtopt Options
		 * 
		 *  @example
		 *    $(document).ready( function() {
		 *      $('#example').dataTable( {
		 *        "sScrollY": "200",
		 *        "bScrollCollapse": true
		 *      } );
		 *    } );
		 */
		"bScrollCollapse": false,
	
	
		/**
		 * Enable infinite scrolling for DataTables (to be used in combination with
		 * sScrollY). Infinite scrolling means that DataTables will continually load
		 * data as a user scrolls through a table, which is very useful for large
		 * dataset. This cannot be used with pagination, which is automatically
		 * disabled. Note - the Scroller extra for DataTables is recommended in
		 * in preference to this option.
		 *  @type boolean
		 *  @default false
		 *  @dtopt Features
		 * 
		 *  @example
		 *    $(document).ready( function() {
		 *      $('#example').dataTable( {
		 *        "bScrollInfinite": true,
		 *        "bScrollCollapse": true,
		 *        "sScrollY": "200px"
		 *      } );
		 *    } );
		 */
		"bScrollInfinite": false,
	
	
		/**
		 * Configure DataTables to use server-side processing. Note that the
		 * sAjaxSource parameter must also be given in order to give DataTables a
		 * source to obtain the required data for each draw.
		 *  @type boolean
		 *  @default false
		 *  @dtopt Features
		 *  @dtopt Server-side
		 * 
		 *  @example
		 *    $(document).ready( function () {
		 *      $('#example').dataTable( {
		 *        "bServerSide": true,
		 *        "sAjaxSource": "xhr.php"
		 *      } );
		 *    } );
		 */
		"bServerSide": false,
	
	
		/**
		 * Enable or disable sorting of columns. Sorting of individual columns can be
		 * disabled by the "bSortable" option for each column.
		 *  @type boolean
		 *  @default true
		 *  @dtopt Features
		 * 
		 *  @example
		 *    $(document).ready( function () {
		 *      $('#example').dataTable( {
		 *        "bSort": false
		 *      } );
		 *    } );
		 */
		"bSort": true,
	
	
		/**
		 * Allows control over whether DataTables should use the top (true) unique
		 * cell that is found for a single column, or the bottom (false - default).
		 * This is useful when using complex headers.
		 *  @type boolean
		 *  @default false
		 *  @dtopt Options
		 * 
		 *  @example
		 *    $(document).ready( function() {
		 *      $('#example').dataTable( {
		 *        "bSortCellsTop": true
		 *      } );
		 *    } );
		 */
		"bSortCellsTop": false,
	
	
		/**
		 * Enable or disable the addition of the classes 'sorting_1', 'sorting_2' and
		 * 'sorting_3' to the columns which are currently being sorted on. This is
		 * presented as a feature switch as it can increase processing time (while
		 * classes are removed and added) so for large data sets you might want to
		 * turn this off.
		 *  @type boolean
		 *  @default true
		 *  @dtopt Features
		 * 
		 *  @example
		 *    $(document).ready( function () {
		 *      $('#example').dataTable( {
		 *        "bSortClasses": false
		 *      } );
		 *    } );
		 */
		"bSortClasses": true,
	
	
		/**
		 * Enable or disable state saving. When enabled a cookie will be used to save
		 * table display information such as pagination information, display length,
		 * filtering and sorting. As such when the end user reloads the page the
		 * display display will match what thy had previously set up.
		 *  @type boolean
		 *  @default false
		 *  @dtopt Features
		 * 
		 *  @example
		 *    $(document).ready( function () {
		 *      $('#example').dataTable( {
		 *        "bStateSave": true
		 *      } );
		 *    } );
		 */
		"bStateSave": false,
	
	
		/**
		 * Customise the cookie and / or the parameters being stored when using
		 * DataTables with state saving enabled. This function is called whenever
		 * the cookie is modified, and it expects a fully formed cookie string to be
		 * returned. Note that the data object passed in is a Javascript object which
		 * must be converted to a string (JSON.stringify for example).
		 *  @type function
		 *  @param {string} sName Name of the cookie defined by DataTables
		 *  @param {object} oData Data to be stored in the cookie
		 *  @param {string} sExpires Cookie expires string
		 *  @param {string} sPath Path of the cookie to set
		 *  @returns {string} Cookie formatted string (which should be encoded by
		 *    using encodeURIComponent())
		 *  @dtopt Callbacks
		 * 
		 *  @example
		 *    $(document).ready( function () {
		 *      $('#example').dataTable( {
		 *        "fnCookieCallback": function (sName, oData, sExpires, sPath) {
		 *          // Customise oData or sName or whatever else here
		 *          return sName + "="+JSON.stringify(oData)+"; expires=" + sExpires +"; path=" + sPath;
		 *        }
		 *      } );
		 *    } );
		 */
		"fnCookieCallback": null,
	
	
		/**
		 * This function is called when a TR element is created (and all TD child
		 * elements have been inserted), or registered if using a DOM source, allowing
		 * manipulation of the TR element (adding classes etc).
		 *  @type function
		 *  @param {node} nRow "TR" element for the current row
		 *  @param {array} aData Raw data array for this row
		 *  @param {int} iDataIndex The index of this row in aoData
		 *  @dtopt Callbacks
		 * 
		 *  @example
		 *    $(document).ready( function() {
		 *      $('#example').dataTable( {
		 *        "fnCreatedRow": function( nRow, aData, iDataIndex ) {
		 *          // Bold the grade for all 'A' grade browsers
		 *          if ( aData[4] == "A" )
		 *          {
		 *            $('td:eq(4)', nRow).html( '<b>A</b>' );
		 *          }
		 *        }
		 *      } );
		 *    } );
		 */
		"fnCreatedRow": null,
	
	
		/**
		 * This function is called on every 'draw' event, and allows you to
		 * dynamically modify any aspect you want about the created DOM.
		 *  @type function
		 *  @param {object} oSettings DataTables settings object
		 *  @dtopt Callbacks
		 * 
		 *  @example
		 *    $(document).ready( function() {
		 *      $('#example').dataTable( {
		 *        "fnDrawCallback": function( oSettings ) {
		 *          alert( 'DataTables has redrawn the table' );
		 *        }
		 *      } );
		 *    } );
		 */
		"fnDrawCallback": null,
	
	
		/**
		 * Identical to fnHeaderCallback() but for the table footer this function
		 * allows you to modify the table footer on every 'draw' even.
		 *  @type function
		 *  @param {node} nFoot "TR" element for the footer
		 *  @param {array} aData Full table data (as derived from the original HTML)
		 *  @param {int} iStart Index for the current display starting point in the 
		 *    display array
		 *  @param {int} iEnd Index for the current display ending point in the 
		 *    display array
		 *  @param {array int} aiDisplay Index array to translate the visual position
		 *    to the full data array
		 *  @dtopt Callbacks
		 * 
		 *  @example
		 *    $(document).ready( function() {
		 *      $('#example').dataTable( {
		 *        "fnFooterCallback": function( nFoot, aData, iStart, iEnd, aiDisplay ) {
		 *          nFoot.getElementsByTagName('th')[0].innerHTML = "Starting index is "+iStart;
		 *        }
		 *      } );
		 *    } )
		 */
		"fnFooterCallback": null,
	
	
		/**
		 * When rendering large numbers in the information element for the table
		 * (i.e. "Showing 1 to 10 of 57 entries") DataTables will render large numbers
		 * to have a comma separator for the 'thousands' units (e.g. 1 million is
		 * rendered as "1,000,000") to help readability for the end user. This
		 * function will override the default method DataTables uses.
		 *  @type function
		 *  @member
		 *  @param {int} iIn number to be formatted
		 *  @returns {string} formatted string for DataTables to show the number
		 *  @dtopt Callbacks
		 * 
		 *  @example
		 *    $(document).ready( function() {
		 *      $('#example').dataTable( {
		 *        "fnFormatNumber": function ( iIn ) {
		 *          if ( iIn &lt; 1000 ) {
		 *            return iIn;
		 *          } else {
		 *            var 
		 *              s=(iIn+""), 
		 *              a=s.split(""), out="", 
		 *              iLen=s.length;
		 *            
		 *            for ( var i=0 ; i&lt;iLen ; i++ ) {
		 *              if ( i%3 === 0 &amp;&amp; i !== 0 ) {
		 *                out = "'"+out;
		 *              }
		 *              out = a[iLen-i-1]+out;
		 *            }
		 *          }
		 *          return out;
		 *        };
		 *      } );
		 *    } );
		 */
		"fnFormatNumber": function ( iIn ) {
			if ( iIn < 1000 )
			{
				// A small optimisation for what is likely to be the majority of use cases
				return iIn;
			}
	
			var s=(iIn+""), a=s.split(""), out="", iLen=s.length;
			
			for ( var i=0 ; i<iLen ; i++ )
			{
				if ( i%3 === 0 && i !== 0 )
				{
					out = this.oLanguage.sInfoThousands+out;
				}
				out = a[iLen-i-1]+out;
			}
			return out;
		},
	
	
		/**
		 * This function is called on every 'draw' event, and allows you to
		 * dynamically modify the header row. This can be used to calculate and
		 * display useful information about the table.
		 *  @type function
		 *  @param {node} nHead "TR" element for the header
		 *  @param {array} aData Full table data (as derived from the original HTML)
		 *  @param {int} iStart Index for the current display starting point in the
		 *    display array
		 *  @param {int} iEnd Index for the current display ending point in the
		 *    display array
		 *  @param {array int} aiDisplay Index array to translate the visual position
		 *    to the full data array
		 *  @dtopt Callbacks
		 * 
		 *  @example
		 *    $(document).ready( function() {
		 *      $('#example').dataTable( {
		 *        "fnHeaderCallback": function( nHead, aData, iStart, iEnd, aiDisplay ) {
		 *          nHead.getElementsByTagName('th')[0].innerHTML = "Displaying "+(iEnd-iStart)+" records";
		 *        }
		 *      } );
		 *    } )
		 */
		"fnHeaderCallback": null,
	
	
		/**
		 * The information element can be used to convey information about the current
		 * state of the table. Although the internationalisation options presented by
		 * DataTables are quite capable of dealing with most customisations, there may
		 * be times where you wish to customise the string further. This callback
		 * allows you to do exactly that.
		 *  @type function
		 *  @param {object} oSettings DataTables settings object
		 *  @param {int} iStart Starting position in data for the draw
		 *  @param {int} iEnd End position in data for the draw
		 *  @param {int} iMax Total number of rows in the table (regardless of
		 *    filtering)
		 *  @param {int} iTotal Total number of rows in the data set, after filtering
		 *  @param {string} sPre The string that DataTables has formatted using it's
		 *    own rules
		 *  @returns {string} The string to be displayed in the information element.
		 *  @dtopt Callbacks
		 * 
		 *  @example
		 *    $('#example').dataTable( {
		 *      "fnInfoCallback": function( oSettings, iStart, iEnd, iMax, iTotal, sPre ) {
		 *        return iStart +" to "+ iEnd;
		 *      }
		 *    } );
		 */
		"fnInfoCallback": null,
	
	
		/**
		 * Called when the table has been initialised. Normally DataTables will
		 * initialise sequentially and there will be no need for this function,
		 * however, this does not hold true when using external language information
		 * since that is obtained using an async XHR call.
		 *  @type function
		 *  @param {object} oSettings DataTables settings object
		 *  @param {object} json The JSON object request from the server - only
		 *    present if client-side Ajax sourced data is used
		 *  @dtopt Callbacks
		 * 
		 *  @example
		 *    $(document).ready( function() {
		 *      $('#example').dataTable( {
		 *        "fnInitComplete": function(oSettings, json) {
		 *          alert( 'DataTables has finished its initialisation.' );
		 *        }
		 *      } );
		 *    } )
		 */
		"fnInitComplete": null,
	
	
		/**
		 * Called at the very start of each table draw and can be used to cancel the
		 * draw by returning false, any other return (including undefined) results in
		 * the full draw occurring).
		 *  @type function
		 *  @param {object} oSettings DataTables settings object
		 *  @returns {boolean} False will cancel the draw, anything else (including no
		 *    return) will allow it to complete.
		 *  @dtopt Callbacks
		 * 
		 *  @example
		 *    $(document).ready( function() {
		 *      $('#example').dataTable( {
		 *        "fnPreDrawCallback": function( oSettings ) {
		 *          if ( $('#test').val() == 1 ) {
		 *            return false;
		 *          }
		 *        }
		 *      } );
		 *    } );
		 */
		"fnPreDrawCallback": null,
	
	
		/**
		 * This function allows you to 'post process' each row after it have been
		 * generated for each table draw, but before it is rendered on screen. This
		 * function might be used for setting the row class name etc.
		 *  @type function
		 *  @param {node} nRow "TR" element for the current row
		 *  @param {array} aData Raw data array for this row
		 *  @param {int} iDisplayIndex The display index for the current table draw
		 *  @param {int} iDisplayIndexFull The index of the data in the full list of
		 *    rows (after filtering)
		 *  @dtopt Callbacks
		 * 
		 *  @example
		 *    $(document).ready( function() {
		 *      $('#example').dataTable( {
		 *        "fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
		 *          // Bold the grade for all 'A' grade browsers
		 *          if ( aData[4] == "A" )
		 *          {
		 *            $('td:eq(4)', nRow).html( '<b>A</b>' );
		 *          }
		 *        }
		 *      } );
		 *    } );
		 */
		"fnRowCallback": null,
	
	
		/**
		 * This parameter allows you to override the default function which obtains
		 * the data from the server ($.getJSON) so something more suitable for your
		 * application. For example you could use POST data, or pull information from
		 * a Gears or AIR database.
		 *  @type function
		 *  @member
		 *  @param {string} sSource HTTP source to obtain the data from (sAjaxSource)
		 *  @param {array} aoData A key/value pair object containing the data to send
		 *    to the server
		 *  @param {function} fnCallback to be called on completion of the data get
		 *    process that will draw the data on the page.
		 *  @param {object} oSettings DataTables settings object
		 *  @dtopt Callbacks
		 *  @dtopt Server-side
		 * 
		 *  @example
		 *    // POST data to server
		 *    $(document).ready( function() {
		 *      $('#example').dataTable( {
		 *        "bProcessing": true,
		 *        "bServerSide": true,
		 *        "sAjaxSource": "xhr.php",
		 *        "fnServerData": function ( sSource, aoData, fnCallback, oSettings ) {
		 *          oSettings.jqXHR = $.ajax( {
		 *            "dataType": 'json', 
		 *            "type": "POST", 
		 *            "url": sSource, 
		 *            "data": aoData, 
		 *            "success": fnCallback
		 *          } );
		 *        }
		 *      } );
		 *    } );
		 */
		"fnServerData": function ( sUrl, aoData, fnCallback, oSettings ) {
			oSettings.jqXHR = $.ajax( {
				"url":  sUrl,
				"data": aoData,
				"success": function (json) {
					if ( json.sError ) {
						oSettings.oApi._fnLog( oSettings, 0, json.sError );
					}
					
					$(oSettings.oInstance).trigger('xhr', [oSettings, json]);
					fnCallback( json );
				},
				"dataType": "json",
				"cache": false,
				"type": oSettings.sServerMethod,
				"error": function (xhr, error, thrown) {
					if ( error == "parsererror" ) {
						oSettings.oApi._fnLog( oSettings, 0, "DataTables warning: JSON data from "+
							"server could not be parsed. This is caused by a JSON formatting error." );
					}
				}
			} );
		},
	
	
		/**
		 * It is often useful to send extra data to the server when making an Ajax
		 * request - for example custom filtering information, and this callback
		 * function makes it trivial to send extra information to the server. The
		 * passed in parameter is the data set that has been constructed by
		 * DataTables, and you can add to this or modify it as you require.
		 *  @type function
		 *  @param {array} aoData Data array (array of objects which are name/value
		 *    pairs) that has been constructed by DataTables and will be sent to the
		 *    server. In the case of Ajax sourced data with server-side processing
		 *    this will be an empty array, for server-side processing there will be a
		 *    significant number of parameters!
		 *  @returns {undefined} Ensure that you modify the aoData array passed in,
		 *    as this is passed by reference.
		 *  @dtopt Callbacks
		 *  @dtopt Server-side
		 * 
		 *  @example
		 *    $(document).ready( function() {
		 *      $('#example').dataTable( {
		 *        "bProcessing": true,
		 *        "bServerSide": true,
		 *        "sAjaxSource": "scripts/server_processing.php",
		 *        "fnServerParams": function ( aoData ) {
		 *          aoData.push( { "name": "more_data", "value": "my_value" } );
		 *        }
		 *      } );
		 *    } );
		 */
		"fnServerParams": null,
	
	
		/**
		 * Load the table state. With this function you can define from where, and how, the
		 * state of a table is loaded. By default DataTables will load from its state saving
		 * cookie, but you might wish to use local storage (HTML5) or a server-side database.
		 *  @type function
		 *  @member
		 *  @param {object} oSettings DataTables settings object
		 *  @return {object} The DataTables state object to be loaded
		 *  @dtopt Callbacks
		 * 
		 *  @example
		 *    $(document).ready( function() {
		 *      $('#example').dataTable( {
		 *        "bStateSave": true,
		 *        "fnStateLoad": function (oSettings) {
		 *          var o;
		 *          
		 *          // Send an Ajax request to the server to get the data. Note that
		 *          // this is a synchronous request.
		 *          $.ajax( {
		 *            "url": "/state_load",
		 *            "async": false,
		 *            "dataType": "json",
		 *            "success": function (json) {
		 *              o = json;
		 *            }
		 *          } );
		 *          
		 *          return o;
		 *        }
		 *      } );
		 *    } );
		 */
		"fnStateLoad": function ( oSettings ) {
			var sData = this.oApi._fnReadCookie( oSettings.sCookiePrefix+oSettings.sInstance );
			var oData;
	
			try {
				oData = (typeof $.parseJSON === 'function') ? 
					$.parseJSON(sData) : eval( '('+sData+')' );
			} catch (e) {
				oData = null;
			}
	
			return oData;
		},
	
	
		/**
		 * Callback which allows modification of the saved state prior to loading that state.
		 * This callback is called when the table is loading state from the stored data, but
		 * prior to the settings object being modified by the saved state. Note that for 
		 * plug-in authors, you should use the 'stateLoadParams' event to load parameters for 
		 * a plug-in.
		 *  @type function
		 *  @param {object} oSettings DataTables settings object
		 *  @param {object} oData The state object that is to be loaded
		 *  @dtopt Callbacks
		 * 
		 *  @example
		 *    // Remove a saved filter, so filtering is never loaded
		 *    $(document).ready( function() {
		 *      $('#example').dataTable( {
		 *        "bStateSave": true,
		 *        "fnStateLoadParams": function (oSettings, oData) {
		 *          oData.oSearch.sSearch = "";
		 *        }
		 *      } );
		 *    } );
		 * 
		 *  @example
		 *    // Disallow state loading by returning false
		 *    $(document).ready( function() {
		 *      $('#example').dataTable( {
		 *        "bStateSave": true,
		 *        "fnStateLoadParams": function (oSettings, oData) {
		 *          return false;
		 *        }
		 *      } );
		 *    } );
		 */
		"fnStateLoadParams": null,
	
	
		/**
		 * Callback that is called when the state has been loaded from the state saving method
		 * and the DataTables settings object has been modified as a result of the loaded state.
		 *  @type function
		 *  @param {object} oSettings DataTables settings object
		 *  @param {object} oData The state object that was loaded
		 *  @dtopt Callbacks
		 * 
		 *  @example
		 *    // Show an alert with the filtering value that was saved
		 *    $(document).ready( function() {
		 *      $('#example').dataTable( {
		 *        "bStateSave": true,
		 *        "fnStateLoaded": function (oSettings, oData) {
		 *          alert( 'Saved filter was: '+oData.oSearch.sSearch );
		 *        }
		 *      } );
		 *    } );
		 */
		"fnStateLoaded": null,
	
	
		/**
		 * Save the table state. This function allows you to define where and how the state
		 * information for the table is stored - by default it will use a cookie, but you
		 * might want to use local storage (HTML5) or a server-side database.
		 *  @type function
		 *  @member
		 *  @param {object} oSettings DataTables settings object
		 *  @param {object} oData The state object to be saved
		 *  @dtopt Callbacks
		 * 
		 *  @example
		 *    $(document).ready( function() {
		 *      $('#example').dataTable( {
		 *        "bStateSave": true,
		 *        "fnStateSave": function (oSettings, oData) {
		 *          // Send an Ajax request to the server with the state object
		 *          $.ajax( {
		 *            "url": "/state_save",
		 *            "data": oData,
		 *            "dataType": "json",
		 *            "method": "POST"
		 *            "success": function () {}
		 *          } );
		 *        }
		 *      } );
		 *    } );
		 */
		"fnStateSave": function ( oSettings, oData ) {
			this.oApi._fnCreateCookie( 
				oSettings.sCookiePrefix+oSettings.sInstance, 
				this.oApi._fnJsonString(oData), 
				oSettings.iCookieDuration, 
				oSettings.sCookiePrefix, 
				oSettings.fnCookieCallback
			);
		},
	
	
		/**
		 * Callback which allows modification of the state to be saved. Called when the table 
		 * has changed state a new state save is required. This method allows modification of
		 * the state saving object prior to actually doing the save, including addition or 
		 * other state properties or modification. Note that for plug-in authors, you should 
		 * use the 'stateSaveParams' event to save parameters for a plug-in.
		 *  @type function
		 *  @param {object} oSettings DataTables settings object
		 *  @param {object} oData The state object to be saved
		 *  @dtopt Callbacks
		 * 
		 *  @example
		 *    // Remove a saved filter, so filtering is never saved
		 *    $(document).ready( function() {
		 *      $('#example').dataTable( {
		 *        "bStateSave": true,
		 *        "fnStateSaveParams": function (oSettings, oData) {
		 *          oData.oSearch.sSearch = "";
		 *        }
		 *      } );
		 *    } );
		 */
		"fnStateSaveParams": null,
	
	
		/**
		 * Duration of the cookie which is used for storing session information. This
		 * value is given in seconds.
		 *  @type int
		 *  @default 7200 <i>(2 hours)</i>
		 *  @dtopt Options
		 * 
		 *  @example
		 *    $(document).ready( function() {
		 *      $('#example').dataTable( {
		 *        "iCookieDuration": 60*60*24; // 1 day
		 *      } );
		 *    } )
		 */
		"iCookieDuration": 7200,
	
	
		/**
		 * When enabled DataTables will not make a request to the server for the first
		 * page draw - rather it will use the data already on the page (no sorting etc
		 * will be applied to it), thus saving on an XHR at load time. iDeferLoading
		 * is used to indicate that deferred loading is required, but it is also used
		 * to tell DataTables how many records there are in the full table (allowing
		 * the information element and pagination to be displayed correctly). In the case
		 * where a filtering is applied to the table on initial load, this can be
		 * indicated by giving the parameter as an array, where the first element is
		 * the number of records available after filtering and the second element is the
		 * number of records without filtering (allowing the table information element
		 * to be shown correctly).
		 *  @type int | array
		 *  @default null
		 *  @dtopt Options
		 * 
		 *  @example
		 *    // 57 records available in the table, no filtering applied
		 *    $(document).ready( function() {
		 *      $('#example').dataTable( {
		 *        "bServerSide": true,
		 *        "sAjaxSource": "scripts/server_processing.php",
		 *        "iDeferLoading": 57
		 *      } );
		 *    } );
		 * 
		 *  @example
		 *    // 57 records after filtering, 100 without filtering (an initial filter applied)
		 *    $(document).ready( function() {
		 *      $('#example').dataTable( {
		 *        "bServerSide": true,
		 *        "sAjaxSource": "scripts/server_processing.php",
		 *        "iDeferLoading": [ 57, 100 ],
		 *        "oSearch": {
		 *          "sSearch": "my_filter"
		 *        }
		 *      } );
		 *    } );
		 */
		"iDeferLoading": null,
	
	
		/**
		 * Number of rows to display on a single page when using pagination. If
		 * feature enabled (bLengthChange) then the end user will be able to override
		 * this to a custom setting using a pop-up menu.
		 *  @type int
		 *  @default 10
		 *  @dtopt Options
		 * 
		 *  @example
		 *    $(document).ready( function() {
		 *      $('#example').dataTable( {
		 *        "iDisplayLength": 50
		 *      } );
		 *    } )
		 */
		"iDisplayLength": 10,
	
	
		/**
		 * Define the starting point for data display when using DataTables with
		 * pagination. Note that this parameter is the number of records, rather than
		 * the page number, so if you have 10 records per page and want to start on
		 * the third page, it should be "20".
		 *  @type int
		 *  @default 0
		 *  @dtopt Options
		 * 
		 *  @example
		 *    $(document).ready( function() {
		 *      $('#example').dataTable( {
		 *        "iDisplayStart": 20
		 *      } );
		 *    } )
		 */
		"iDisplayStart": 0,
	
	
		/**
		 * The scroll gap is the amount of scrolling that is left to go before
		 * DataTables will load the next 'page' of data automatically. You typically
		 * want a gap which is big enough that the scrolling will be smooth for the
		 * user, while not so large that it will load more data than need.
		 *  @type int
		 *  @default 100
		 *  @dtopt Options
		 * 
		 *  @example
		 *    $(document).ready( function() {
		 *      $('#example').dataTable( {
		 *        "bScrollInfinite": true,
		 *        "bScrollCollapse": true,
		 *        "sScrollY": "200px",
		 *        "iScrollLoadGap": 50
		 *      } );
		 *    } );
		 */
		"iScrollLoadGap": 100,
	
	
		/**
		 * By default DataTables allows keyboard navigation of the table (sorting, paging,
		 * and filtering) by adding a tabindex attribute to the required elements. This
		 * allows you to tab through the controls and press the enter key to activate them.
		 * The tabindex is default 0, meaning that the tab follows the flow of the document.
		 * You can overrule this using this parameter if you wish. Use a value of -1 to
		 * disable built-in keyboard navigation.
		 *  @type int
		 *  @default 0
		 *  @dtopt Options
		 * 
		 *  @example
		 *    $(document).ready( function() {
		 *      $('#example').dataTable( {
		 *        "iTabIndex": 1
		 *      } );
		 *    } );
		 */
		"iTabIndex": 0,
	
	
		/**
		 * All strings that DataTables uses in the user interface that it creates
		 * are defined in this object, allowing you to modified them individually or
		 * completely replace them all as required.
		 *  @namespace
		 */
		"oLanguage": {
			/**
			 * Strings that are used for WAI-ARIA labels and controls only (these are not
			 * actually visible on the page, but will be read by screenreaders, and thus
			 * must be internationalised as well).
			 *  @namespace
			 */
			"oAria": {
				/**
				 * ARIA label that is added to the table headers when the column may be
				 * sorted ascending by activing the column (click or return when focused).
				 * Note that the column header is prefixed to this string.
				 *  @type string
				 *  @default : activate to sort column ascending
				 *  @dtopt Language
				 * 
				 *  @example
				 *    $(document).ready( function() {
				 *      $('#example').dataTable( {
				 *        "oLanguage": {
				 *          "oAria": {
				 *            "sSortAscending": " - click/return to sort ascending"
				 *          }
				 *        }
				 *      } );
				 *    } );
				 */
				"sSortAscending": ": activate to sort column ascending",
	
				/**
				 * ARIA label that is added to the table headers when the column may be
				 * sorted descending by activing the column (click or return when focused).
				 * Note that the column header is prefixed to this string.
				 *  @type string
				 *  @default : activate to sort column ascending
				 *  @dtopt Language
				 * 
				 *  @example
				 *    $(document).ready( function() {
				 *      $('#example').dataTable( {
				 *        "oLanguage": {
				 *          "oAria": {
				 *            "sSortDescending": " - click/return to sort descending"
				 *          }
				 *        }
				 *      } );
				 *    } );
				 */
				"sSortDescending": ": activate to sort column descending"
			},
	
			/**
			 * Pagination string used by DataTables for the two built-in pagination
			 * control types ("two_button" and "full_numbers")
			 *  @namespace
			 */
			"oPaginate": {
				/**
				 * Text to use when using the 'full_numbers' type of pagination for the
				 * button to take the user to the first page.
				 *  @type string
				 *  @default First
				 *  @dtopt Language
				 * 
				 *  @example
				 *    $(document).ready( function() {
				 *      $('#example').dataTable( {
				 *        "oLanguage": {
				 *          "oPaginate": {
				 *            "sFirst": "First page"
				 *          }
				 *        }
				 *      } );
				 *    } );
				 */
				"sFirst": "First",
			
			
				/**
				 * Text to use when using the 'full_numbers' type of pagination for the
				 * button to take the user to the last page.
				 *  @type string
				 *  @default Last
				 *  @dtopt Language
				 * 
				 *  @example
				 *    $(document).ready( function() {
				 *      $('#example').dataTable( {
				 *        "oLanguage": {
				 *          "oPaginate": {
				 *            "sLast": "Last page"
				 *          }
				 *        }
				 *      } );
				 *    } );
				 */
				"sLast": "Last",
			
			
				/**
				 * Text to use for the 'next' pagination button (to take the user to the 
				 * next page).
				 *  @type string
				 *  @default Next
				 *  @dtopt Language
				 * 
				 *  @example
				 *    $(document).ready( function() {
				 *      $('#example').dataTable( {
				 *        "oLanguage": {
				 *          "oPaginate": {
				 *            "sNext": "Next page"
				 *          }
				 *        }
				 *      } );
				 *    } );
				 */
				"sNext": "Next",
			
			
				/**
				 * Text to use for the 'previous' pagination button (to take the user to  
				 * the previous page).
				 *  @type string
				 *  @default Previous
				 *  @dtopt Language
				 * 
				 *  @example
				 *    $(document).ready( function() {
				 *      $('#example').dataTable( {
				 *        "oLanguage": {
				 *          "oPaginate": {
				 *            "sPrevious": "Previous page"
				 *          }
				 *        }
				 *      } );
				 *    } );
				 */
				"sPrevious": "Previous"
			},
		
			/**
			 * This string is shown in preference to sZeroRecords when the table is
			 * empty of data (regardless of filtering). Note that this is an optional
			 * parameter - if it is not given, the value of sZeroRecords will be used
			 * instead (either the default or given value).
			 *  @type string
			 *  @default No data available in table
			 *  @dtopt Language
			 * 
			 *  @example
			 *    $(document).ready( function() {
			 *      $('#example').dataTable( {
			 *        "oLanguage": {
			 *          "sEmptyTable": "No data available in table"
			 *        }
			 *      } );
			 *    } );
			 */
			"sEmptyTable": "No data available in table",
		
		
			/**
			 * This string gives information to the end user about the information that 
			 * is current on display on the page. The _START_, _END_ and _TOTAL_ 
			 * variables are all dynamically replaced as the table display updates, and 
			 * can be freely moved or removed as the language requirements change.
			 *  @type string
			 *  @default Showing _START_ to _END_ of _TOTAL_ entries
			 *  @dtopt Language
			 * 
			 *  @example
			 *    $(document).ready( function() {
			 *      $('#example').dataTable( {
			 *        "oLanguage": {
			 *          "sInfo": "Got a total of _TOTAL_ entries to show (_START_ to _END_)"
			 *        }
			 *      } );
			 *    } );
			 */
			"sInfo": "Showing _START_ to _END_ of _TOTAL_ entries",
		
		
			/**
			 * Display information string for when the table is empty. Typically the 
			 * format of this string should match sInfo.
			 *  @type string
			 *  @default Showing 0 to 0 of 0 entries
			 *  @dtopt Language
			 * 
			 *  @example
			 *    $(document).ready( function() {
			 *      $('#example').dataTable( {
			 *        "oLanguage": {
			 *          "sInfoEmpty": "No entries to show"
			 *        }
			 *      } );
			 *    } );
			 */
			"sInfoEmpty": "Showing 0 to 0 of 0 entries",
		
		
			/**
			 * When a user filters the information in a table, this string is appended 
			 * to the information (sInfo) to give an idea of how strong the filtering 
			 * is. The variable _MAX_ is dynamically updated.
			 *  @type string
			 *  @default (filtered from _MAX_ total entries)
			 *  @dtopt Language
			 * 
			 *  @example
			 *    $(document).ready( function() {
			 *      $('#example').dataTable( {
			 *        "oLanguage": {
			 *          "sInfoFiltered": " - filtering from _MAX_ records"
			 *        }
			 *      } );
			 *    } );
			 */
			"sInfoFiltered": "(filtered from _MAX_ total entries)",
		
		
			/**
			 * If can be useful to append extra information to the info string at times,
			 * and this variable does exactly that. This information will be appended to
			 * the sInfo (sInfoEmpty and sInfoFiltered in whatever combination they are
			 * being used) at all times.
			 *  @type string
			 *  @default <i>Empty string</i>
			 *  @dtopt Language
			 * 
			 *  @example
			 *    $(document).ready( function() {
			 *      $('#example').dataTable( {
			 *        "oLanguage": {
			 *          "sInfoPostFix": "All records shown are derived from real information."
			 *        }
			 *      } );
			 *    } );
			 */
			"sInfoPostFix": "",
		
		
			/**
			 * DataTables has a build in number formatter (fnFormatNumber) which is used
			 * to format large numbers that are used in the table information. By
			 * default a comma is used, but this can be trivially changed to any
			 * character you wish with this parameter.
			 *  @type string
			 *  @default ,
			 *  @dtopt Language
			 * 
			 *  @example
			 *    $(document).ready( function() {
			 *      $('#example').dataTable( {
			 *        "oLanguage": {
			 *          "sInfoThousands": "'"
			 *        }
			 *      } );
			 *    } );
			 */
			"sInfoThousands": ",",
		
		
			/**
			 * Detail the action that will be taken when the drop down menu for the
			 * pagination length option is changed. The '_MENU_' variable is replaced
			 * with a default select list of 10, 25, 50 and 100, and can be replaced
			 * with a custom select box if required.
			 *  @type string
			 *  @default Show _MENU_ entries
			 *  @dtopt Language
			 * 
			 *  @example
			 *    // Language change only
			 *    $(document).ready( function() {
			 *      $('#example').dataTable( {
			 *        "oLanguage": {
			 *          "sLengthMenu": "Display _MENU_ records"
			 *        }
			 *      } );
			 *    } );
			 *    
			 *  @example
			 *    // Language and options change
			 *    $(document).ready( function() {
			 *      $('#example').dataTable( {
			 *        "oLanguage": {
			 *          "sLengthMenu": 'Display <select>'+
			 *            '<option value="10">10</option>'+
			 *            '<option value="20">20</option>'+
			 *            '<option value="30">30</option>'+
			 *            '<option value="40">40</option>'+
			 *            '<option value="50">50</option>'+
			 *            '<option value="-1">All</option>'+
			 *            '</select> records'
			 *        }
			 *      } );
			 *    } );
			 */
			"sLengthMenu": "Show _MENU_ entries",
		
		
			/**
			 * When using Ajax sourced data and during the first draw when DataTables is
			 * gathering the data, this message is shown in an empty row in the table to
			 * indicate to the end user the the data is being loaded. Note that this
			 * parameter is not used when loading data by server-side processing, just
			 * Ajax sourced data with client-side processing.
			 *  @type string
			 *  @default Loading...
			 *  @dtopt Language
			 * 
			 *  @example
			 *    $(document).ready( function() {
			 *      $('#example').dataTable( {
			 *        "oLanguage": {
			 *          "sLoadingRecords": "Please wait - loading..."
			 *        }
			 *      } );
			 *    } );
			 */
			"sLoadingRecords": "Loading...",
		
		
			/**
			 * Text which is displayed when the table is processing a user action
			 * (usually a sort command or similar).
			 *  @type string
			 *  @default Processing...
			 *  @dtopt Language
			 * 
			 *  @example
			 *    $(document).ready( function() {
			 *      $('#example').dataTable( {
			 *        "oLanguage": {
			 *          "sProcessing": "DataTables is currently busy"
			 *        }
			 *      } );
			 *    } );
			 */
			"sProcessing": "Processing...",
		
		
			/**
			 * Details the actions that will be taken when the user types into the
			 * filtering input text box. The variable "_INPUT_", if used in the string,
			 * is replaced with the HTML text box for the filtering input allowing
			 * control over where it appears in the string. If "_INPUT_" is not given
			 * then the input box is appended to the string automatically.
			 *  @type string
			 *  @default Search:
			 *  @dtopt Language
			 * 
			 *  @example
			 *    // Input text box will be appended at the end automatically
			 *    $(document).ready( function() {
			 *      $('#example').dataTable( {
			 *        "oLanguage": {
			 *          "sSearch": "Filter records:"
			 *        }
			 *      } );
			 *    } );
			 *    
			 *  @example
			 *    // Specify where the filter should appear
			 *    $(document).ready( function() {
			 *      $('#example').dataTable( {
			 *        "oLanguage": {
			 *          "sSearch": "Apply filter _INPUT_ to table"
			 *        }
			 *      } );
			 *    } );
			 */
			"sSearch": "Search:",
		
		
			/**
			 * All of the language information can be stored in a file on the
			 * server-side, which DataTables will look up if this parameter is passed.
			 * It must store the URL of the language file, which is in a JSON format,
			 * and the object has the same properties as the oLanguage object in the
			 * initialiser object (i.e. the above parameters). Please refer to one of
			 * the example language files to see how this works in action.
			 *  @type string
			 *  @default <i>Empty string - i.e. disabled</i>
			 *  @dtopt Language
			 * 
			 *  @example
			 *    $(document).ready( function() {
			 *      $('#example').dataTable( {
			 *        "oLanguage": {
			 *          "sUrl": "http://www.sprymedia.co.uk/dataTables/lang.txt"
			 *        }
			 *      } );
			 *    } );
			 */
			"sUrl": "",
		
		
			/**
			 * Text shown inside the table records when the is no information to be
			 * displayed after filtering. sEmptyTable is shown when there is simply no
			 * information in the table at all (regardless of filtering).
			 *  @type string
			 *  @default No matching records found
			 *  @dtopt Language
			 * 
			 *  @example
			 *    $(document).ready( function() {
			 *      $('#example').dataTable( {
			 *        "oLanguage": {
			 *          "sZeroRecords": "No records to display"
			 *        }
			 *      } );
			 *    } );
			 */
			"sZeroRecords": "No matching records found"
		},
	
	
		/**
		 * This parameter allows you to have define the global filtering state at
		 * initialisation time. As an object the "sSearch" parameter must be
		 * defined, but all other parameters are optional. When "bRegex" is true,
		 * the search string will be treated as a regular expression, when false
		 * (default) it will be treated as a straight string. When "bSmart"
		 * DataTables will use it's smart filtering methods (to word match at
		 * any point in the data), when false this will not be done.
		 *  @namespace
		 *  @extends DataTable.models.oSearch
		 *  @dtopt Options
		 * 
		 *  @example
		 *    $(document).ready( function() {
		 *      $('#example').dataTable( {
		 *        "oSearch": {"sSearch": "Initial search"}
		 *      } );
		 *    } )
		 */
		"oSearch": $.extend( {}, DataTable.models.oSearch ),
	
	
		/**
		 * By default DataTables will look for the property 'aaData' when obtaining
		 * data from an Ajax source or for server-side processing - this parameter
		 * allows that property to be changed. You can use Javascript dotted object
		 * notation to get a data source for multiple levels of nesting.
		 *  @type string
		 *  @default aaData
		 *  @dtopt Options
		 *  @dtopt Server-side
		 * 
		 *  @example
		 *    // Get data from { "data": [...] }
		 *    $(document).ready( function() {
		 *      var oTable = $('#example').dataTable( {
		 *        "sAjaxSource": "sources/data.txt",
		 *        "sAjaxDataProp": "data"
		 *      } );
		 *    } );
		 *    
		 *  @example
		 *    // Get data from { "data": { "inner": [...] } }
		 *    $(document).ready( function() {
		 *      var oTable = $('#example').dataTable( {
		 *        "sAjaxSource": "sources/data.txt",
		 *        "sAjaxDataProp": "data.inner"
		 *      } );
		 *    } );
		 */
		"sAjaxDataProp": "aaData",
	
	
		/**
		 * You can instruct DataTables to load data from an external source using this
		 * parameter (use aData if you want to pass data in you already have). Simply
		 * provide a url a JSON object can be obtained from. This object must include
		 * the parameter 'aaData' which is the data source for the table.
		 *  @type string
		 *  @default null
		 *  @dtopt Options
		 *  @dtopt Server-side
		 * 
		 *  @example
		 *    $(document).ready( function() {
		 *      $('#example').dataTable( {
		 *        "sAjaxSource": "http://www.sprymedia.co.uk/dataTables/json.php"
		 *      } );
		 *    } )
		 */
		"sAjaxSource": null,
	
	
		/**
		 * This parameter can be used to override the default prefix that DataTables
		 * assigns to a cookie when state saving is enabled.
		 *  @type string
		 *  @default SpryMedia_DataTables_
		 *  @dtopt Options
		 * 
		 *  @example
		 *    $(document).ready( function() {
		 *      $('#example').dataTable( {
		 *        "sCookiePrefix": "my_datatable_",
		 *      } );
		 *    } );
		 */
		"sCookiePrefix": "SpryMedia_DataTables_",
	
	
		/**
		 * This initialisation variable allows you to specify exactly where in the
		 * DOM you want DataTables to inject the various controls it adds to the page
		 * (for example you might want the pagination controls at the top of the
		 * table). DIV elements (with or without a custom class) can also be added to
		 * aid styling. The follow syntax is used:
		 *   <ul>
		 *     <li>The following options are allowed:	
		 *       <ul>
		 *         <li>'l' - Length changing</li
		 *         <li>'f' - Filtering input</li>
		 *         <li>'t' - The table!</li>
		 *         <li>'i' - Information</li>
		 *         <li>'p' - Pagination</li>
		 *         <li>'r' - pRocessing</li>
		 *       </ul>
		 *     </li>
		 *     <li>The following constants are allowed:
		 *       <ul>
		 *         <li>'H' - jQueryUI theme "header" classes ('fg-toolbar ui-widget-header ui-corner-tl ui-corner-tr ui-helper-clearfix')</li>
		 *         <li>'F' - jQueryUI theme "footer" classes ('fg-toolbar ui-widget-header ui-corner-bl ui-corner-br ui-helper-clearfix')</li>
		 *       </ul>
		 *     </li>
		 *     <li>The following syntax is expected:
		 *       <ul>
		 *         <li>'&lt;' and '&gt;' - div elements</li>
		 *         <li>'&lt;"class" and '&gt;' - div with a class</li>
		 *         <li>'&lt;"#id" and '&gt;' - div with an ID</li>
		 *       </ul>
		 *     </li>
		 *     <li>Examples:
		 *       <ul>
		 *         <li>'&lt;"wrapper"flipt&gt;'</li>
		 *         <li>'&lt;lf&lt;t&gt;ip&gt;'</li>
		 *       </ul>
		 *     </li>
		 *   </ul>
		 *  @type string
		 *  @default lfrtip <i>(when bJQueryUI is false)</i> <b>or</b> 
		 *    <"H"lfr>t<"F"ip> <i>(when bJQueryUI is true)</i>
		 *  @dtopt Options
		 * 
		 *  @example
		 *    $(document).ready( function() {
		 *      $('#example').dataTable( {
		 *        "sDom": '&lt;"top"i&gt;rt&lt;"bottom"flp&gt;&lt;"clear"&gt;'
		 *      } );
		 *    } );
		 */
		"sDom": "lfrtip",
	
	
		/**
		 * DataTables features two different built-in pagination interaction methods
		 * ('two_button' or 'full_numbers') which present different page controls to
		 * the end user. Further methods can be added using the API (see below).
		 *  @type string
		 *  @default two_button
		 *  @dtopt Options
		 * 
		 *  @example
		 *    $(document).ready( function() {
		 *      $('#example').dataTable( {
		 *        "sPaginationType": "full_numbers"
		 *      } );
		 *    } )
		 */
		"sPaginationType": "two_button",
	
	
		/**
		 * Enable horizontal scrolling. When a table is too wide to fit into a certain
		 * layout, or you have a large number of columns in the table, you can enable
		 * x-scrolling to show the table in a viewport, which can be scrolled. This
		 * property can be any CSS unit, or a number (in which case it will be treated
		 * as a pixel measurement).
		 *  @type string
		 *  @default <i>blank string - i.e. disabled</i>
		 *  @dtopt Features
		 * 
		 *  @example
		 *    $(document).ready( function() {
		 *      $('#example').dataTable( {
		 *        "sScrollX": "100%",
		 *        "bScrollCollapse": true
		 *      } );
		 *    } );
		 */
		"sScrollX": "",
	
	
		/**
		 * This property can be used to force a DataTable to use more width than it
		 * might otherwise do when x-scrolling is enabled. For example if you have a
		 * table which requires to be well spaced, this parameter is useful for
		 * "over-sizing" the table, and thus forcing scrolling. This property can by
		 * any CSS unit, or a number (in which case it will be treated as a pixel
		 * measurement).
		 *  @type string
		 *  @default <i>blank string - i.e. disabled</i>
		 *  @dtopt Options
		 * 
		 *  @example
		 *    $(document).ready( function() {
		 *      $('#example').dataTable( {
		 *        "sScrollX": "100%",
		 *        "sScrollXInner": "110%"
		 *      } );
		 *    } );
		 */
		"sScrollXInner": "",
	
	
		/**
		 * Enable vertical scrolling. Vertical scrolling will constrain the DataTable
		 * to the given height, and enable scrolling for any data which overflows the
		 * current viewport. This can be used as an alternative to paging to display
		 * a lot of data in a small area (although paging and scrolling can both be
		 * enabled at the same time). This property can be any CSS unit, or a number
		 * (in which case it will be treated as a pixel measurement).
		 *  @type string
		 *  @default <i>blank string - i.e. disabled</i>
		 *  @dtopt Features
		 * 
		 *  @example
		 *    $(document).ready( function() {
		 *      $('#example').dataTable( {
		 *        "sScrollY": "200px",
		 *        "bPaginate": false
		 *      } );
		 *    } );
		 */
		"sScrollY": "",
	
	
		/**
		 * Set the HTTP method that is used to make the Ajax call for server-side
		 * processing or Ajax sourced data.
		 *  @type string
		 *  @default GET
		 *  @dtopt Options
		 *  @dtopt Server-side
		 * 
		 *  @example
		 *    $(document).ready( function() {
		 *      $('#example').dataTable( {
		 *        "bServerSide": true,
		 *        "sAjaxSource": "scripts/post.php",
		 *        "sServerMethod": "POST"
		 *      } );
		 *    } );
		 */
		"sServerMethod": "GET"
	};
	
	
	
	/**
	 * Column options that can be given to DataTables at initialisation time.
	 *  @namespace
	 */
	DataTable.defaults.columns = {
		/**
		 * Allows a column's sorting to take multiple columns into account when 
		 * doing a sort. For example first name / last name columns make sense to 
		 * do a multi-column sort over the two columns.
		 *  @type array
		 *  @default null <i>Takes the value of the column index automatically</i>
		 *  @dtopt Columns
		 * 
		 *  @example
		 *    // Using aoColumnDefs
		 *    $(document).ready( function() {
		 *      $('#example').dataTable( {
		 *        "aoColumnDefs": [
		 *          { "aDataSort": [ 0, 1 ], "aTargets": [ 0 ] },
		 *          { "aDataSort": [ 1, 0 ], "aTargets": [ 1 ] },
		 *          { "aDataSort": [ 2, 3, 4 ], "aTargets": [ 2 ] }
		 *        ]
		 *      } );
		 *    } );
		 *    
		 *  @example
		 *    // Using aoColumns
		 *    $(document).ready( function() {
		 *      $('#example').dataTable( {
		 *        "aoColumns": [
		 *          { "aDataSort": [ 0, 1 ] },
		 *          { "aDataSort": [ 1, 0 ] },
		 *          { "aDataSort": [ 2, 3, 4 ] },
		 *          null,
		 *          null
		 *        ]
		 *      } );
		 *    } );
		 */
		"aDataSort": null,
	
	
		/**
		 * You can control the default sorting direction, and even alter the behaviour
		 * of the sort handler (i.e. only allow ascending sorting etc) using this
		 * parameter.
		 *  @type array
		 *  @default [ 'asc', 'desc' ]
		 *  @dtopt Columns
		 * 
		 *  @example
		 *    // Using aoColumnDefs
		 *    $(document).ready( function() {
		 *      $('#example').dataTable( {
		 *        "aoColumnDefs": [
		 *          { "asSorting": [ "asc" ], "aTargets": [ 1 ] },
		 *          { "asSorting": [ "desc", "asc", "asc" ], "aTargets": [ 2 ] },
		 *          { "asSorting": [ "desc" ], "aTargets": [ 3 ] }
		 *        ]
		 *      } );
		 *    } );
		 *    
		 *  @example
		 *    // Using aoColumns
		 *    $(document).ready( function() {
		 *      $('#example').dataTable( {
		 *        "aoColumns": [
		 *          null,
		 *          { "asSorting": [ "asc" ] },
		 *          { "asSorting": [ "desc", "asc", "asc" ] },
		 *          { "asSorting": [ "desc" ] },
		 *          null
		 *        ]
		 *      } );
		 *    } );
		 */
		"asSorting": [ 'asc', 'desc' ],
	
	
		/**
		 * Enable or disable filtering on the data in this column.
		 *  @type boolean
		 *  @default true
		 *  @dtopt Columns
		 * 
		 *  @example
		 *    // Using aoColumnDefs
		 *    $(document).ready( function() {
		 *      $('#example').dataTable( {
		 *        "aoColumnDefs": [ 
		 *          { "bSearchable": false, "aTargets": [ 0 ] }
		 *        ] } );
		 *    } );
		 *    
		 *  @example
		 *    // Using aoColumns
		 *    $(document).ready( function() {
		 *      $('#example').dataTable( {
		 *        "aoColumns": [ 
		 *          { "bSearchable": false },
		 *          null,
		 *          null,
		 *          null,
		 *          null
		 *        ] } );
		 *    } );
		 */
		"bSearchable": true,
	
	
		/**
		 * Enable or disable sorting on this column.
		 *  @type boolean
		 *  @default true
		 *  @dtopt Columns
		 * 
		 *  @example
		 *    // Using aoColumnDefs
		 *    $(document).ready( function() {
		 *      $('#example').dataTable( {
		 *        "aoColumnDefs": [ 
		 *          { "bSortable": false, "aTargets": [ 0 ] }
		 *        ] } );
		 *    } );
		 *    
		 *  @example
		 *    // Using aoColumns
		 *    $(document).ready( function() {
		 *      $('#example').dataTable( {
		 *        "aoColumns": [ 
		 *          { "bSortable": false },
		 *          null,
		 *          null,
		 *          null,
		 *          null
		 *        ] } );
		 *    } );
		 */
		"bSortable": true,
	
	
		/**
		 * <code>Deprecated</code> When using fnRender() for a column, you may wish 
		 * to use the original data (before rendering) for sorting and filtering 
		 * (the default is to used the rendered data that the user can see). This 
		 * may be useful for dates etc.
		 * 
		 * Please note that this option has now been deprecated and will be removed
		 * in the next version of DataTables. Please use mRender / mData rather than
		 * fnRender.
		 *  @type boolean
		 *  @default true
		 *  @dtopt Columns
		 *  @deprecated
		 */
		"bUseRendered": true,
	
	
		/**
		 * Enable or disable the display of this column.
		 *  @type boolean
		 *  @default true
		 *  @dtopt Columns
		 * 
		 *  @example
		 *    // Using aoColumnDefs
		 *    $(document).ready( function() {
		 *      $('#example').dataTable( {
		 *        "aoColumnDefs": [ 
		 *          { "bVisible": false, "aTargets": [ 0 ] }
		 *        ] } );
		 *    } );
		 *    
		 *  @example
		 *    // Using aoColumns
		 *    $(document).ready( function() {
		 *      $('#example').dataTable( {
		 *        "aoColumns": [ 
		 *          { "bVisible": false },
		 *          null,
		 *          null,
		 *          null,
		 *          null
		 *        ] } );
		 *    } );
		 */
		"bVisible": true,
		
		
		/**
		 * Developer definable function that is called whenever a cell is created (Ajax source,
		 * etc) or processed for input (DOM source). This can be used as a compliment to mRender
		 * allowing you to modify the DOM element (add background colour for example) when the
		 * element is available.
		 *  @type function
		 *  @param {element} nTd The TD node that has been created
		 *  @param {*} sData The Data for the cell
		 *  @param {array|object} oData The data for the whole row
		 *  @param {int} iRow The row index for the aoData data store
		 *  @param {int} iCol The column index for aoColumns
		 *  @dtopt Columns
		 * 
		 *  @example
		 *    $(document).ready( function() {
		 *      $('#example').dataTable( {
		 *        "aoColumnDefs": [ {
		 *          "aTargets": [3],
		 *          "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
		 *            if ( sData == "1.7" ) {
		 *              $(nTd).css('color', 'blue')
		 *            }
		 *          }
		 *        } ]
		 *      });
		 *    } );
		 */
		"fnCreatedCell": null,
	
	
		/**
		 * <code>Deprecated</code> Custom display function that will be called for the 
		 * display of each cell in this column.
		 *
		 * Please note that this option has now been deprecated and will be removed
		 * in the next version of DataTables. Please use mRender / mData rather than
		 * fnRender.
		 *  @type function
		 *  @param {object} o Object with the following parameters:
		 *  @param {int}    o.iDataRow The row in aoData
		 *  @param {int}    o.iDataColumn The column in question
		 *  @param {array}  o.aData The data for the row in question
		 *  @param {object} o.oSettings The settings object for this DataTables instance
		 *  @param {object} o.mDataProp The data property used for this column
		 *  @param {*}      val The current cell value
		 *  @returns {string} The string you which to use in the display
		 *  @dtopt Columns
		 *  @deprecated
		 */
		"fnRender": null,
	
	
		/**
		 * The column index (starting from 0!) that you wish a sort to be performed
		 * upon when this column is selected for sorting. This can be used for sorting
		 * on hidden columns for example.
		 *  @type int
		 *  @default -1 <i>Use automatically calculated column index</i>
		 *  @dtopt Columns
		 * 
		 *  @example
		 *    // Using aoColumnDefs
		 *    $(document).ready( function() {
		 *      $('#example').dataTable( {
		 *        "aoColumnDefs": [ 
		 *          { "iDataSort": 1, "aTargets": [ 0 ] }
		 *        ]
		 *      } );
		 *    } );
		 *    
		 *  @example
		 *    // Using aoColumns
		 *    $(document).ready( function() {
		 *      $('#example').dataTable( {
		 *        "aoColumns": [ 
		 *          { "iDataSort": 1 },
		 *          null,
		 *          null,
		 *          null,
		 *          null
		 *        ]
		 *      } );
		 *    } );
		 */
		"iDataSort": -1,
	
	
		/**
		 * This parameter has been replaced by mData in DataTables to ensure naming
		 * consistency. mDataProp can still be used, as there is backwards compatibility
		 * in DataTables for this option, but it is strongly recommended that you use
		 * mData in preference to mDataProp.
		 *  @name DataTable.defaults.columns.mDataProp
		 */
	
	
		/**
		 * This property can be used to read data from any JSON data source property,
		 * including deeply nested objects / properties. mData can be given in a
		 * number of different ways which effect its behaviour:
		 *   <ul>
		 *     <li>integer - treated as an array index for the data source. This is the
		 *       default that DataTables uses (incrementally increased for each column).</li>
		 *     <li>string - read an object property from the data source. Note that you can
		 *       use Javascript dotted notation to read deep properties / arrays from the
		 *       data source.</li>
		 *     <li>null - the sDefaultContent option will be used for the cell (null
		 *       by default, so you will need to specify the default content you want -
		 *       typically an empty string). This can be useful on generated columns such 
		 *       as edit / delete action columns.</li>
		 *     <li>function - the function given will be executed whenever DataTables 
		 *       needs to set or get the data for a cell in the column. The function 
		 *       takes three parameters:
		 *       <ul>
		 *         <li>{array|object} The data source for the row</li>
		 *         <li>{string} The type call data requested - this will be 'set' when
		 *           setting data or 'filter', 'display', 'type', 'sort' or undefined when 
		 *           gathering data. Note that when <i>undefined</i> is given for the type
		 *           DataTables expects to get the raw data for the object back</li>
		 *         <li>{*} Data to set when the second parameter is 'set'.</li>
		 *       </ul>
		 *       The return value from the function is not required when 'set' is the type
		 *       of call, but otherwise the return is what will be used for the data
		 *       requested.</li>
		 *    </ul>
		 *
		 * Note that prior to DataTables 1.9.2 mData was called mDataProp. The name change
		 * reflects the flexibility of this property and is consistent with the naming of
		 * mRender. If 'mDataProp' is given, then it will still be used by DataTables, as
		 * it automatically maps the old name to the new if required.
		 *  @type string|int|function|null
		 *  @default null <i>Use automatically calculated column index</i>
		 *  @dtopt Columns
		 * 
		 *  @example
		 *    // Read table data from objects
		 *    $(document).ready( function() {
		 *      var oTable = $('#example').dataTable( {
		 *        "sAjaxSource": "sources/deep.txt",
		 *        "aoColumns": [
		 *          { "mData": "engine" },
		 *          { "mData": "browser" },
		 *          { "mData": "platform.inner" },
		 *          { "mData": "platform.details.0" },
		 *          { "mData": "platform.details.1" }
		 *        ]
		 *      } );
		 *    } );
		 * 
		 *  @example
		 *    // Using mData as a function to provide different information for
		 *    // sorting, filtering and display. In this case, currency (price)
		 *    $(document).ready( function() {
		 *      var oTable = $('#example').dataTable( {
		 *        "aoColumnDefs": [ {
		 *          "aTargets": [ 0 ],
		 *          "mData": function ( source, type, val ) {
		 *            if (type === 'set') {
		 *              source.price = val;
		 *              // Store the computed dislay and filter values for efficiency
		 *              source.price_display = val=="" ? "" : "$"+numberFormat(val);
		 *              source.price_filter  = val=="" ? "" : "$"+numberFormat(val)+" "+val;
		 *              return;
		 *            }
		 *            else if (type === 'display') {
		 *              return source.price_display;
		 *            }
		 *            else if (type === 'filter') {
		 *              return source.price_filter;
		 *            }
		 *            // 'sort', 'type' and undefined all just use the integer
		 *            return source.price;
		 *          }
		 *        } ]
		 *      } );
		 *    } );
		 */
		"mData": null,
	
	
		/**
		 * This property is the rendering partner to mData and it is suggested that
		 * when you want to manipulate data for display (including filtering, sorting etc)
		 * but not altering the underlying data for the table, use this property. mData
		 * can actually do everything this property can and more, but this parameter is
		 * easier to use since there is no 'set' option. Like mData is can be given
		 * in a number of different ways to effect its behaviour, with the addition of 
		 * supporting array syntax for easy outputting of arrays (including arrays of
		 * objects):
		 *   <ul>
		 *     <li>integer - treated as an array index for the data source. This is the
		 *       default that DataTables uses (incrementally increased for each column).</li>
		 *     <li>string - read an object property from the data source. Note that you can
		 *       use Javascript dotted notation to read deep properties / arrays from the
		 *       data source and also array brackets to indicate that the data reader should
		 *       loop over the data source array. When characters are given between the array
		 *       brackets, these characters are used to join the data source array together.
		 *       For example: "accounts[, ].name" would result in a comma separated list with
		 *       the 'name' value from the 'accounts' array of objects.</li>
		 *     <li>function - the function given will be executed whenever DataTables 
		 *       needs to set or get the data for a cell in the column. The function 
		 *       takes three parameters:
		 *       <ul>
		 *         <li>{array|object} The data source for the row (based on mData)</li>
		 *         <li>{string} The type call data requested - this will be 'filter', 'display', 
		 *           'type' or 'sort'.</li>
		 *         <li>{array|object} The full data source for the row (not based on mData)</li>
		 *       </ul>
		 *       The return value from the function is what will be used for the data
		 *       requested.</li>
		 *    </ul>
		 *  @type string|int|function|null
		 *  @default null <i>Use mData</i>
		 *  @dtopt Columns
		 * 
		 *  @example
		 *    // Create a comma separated list from an array of objects
		 *    $(document).ready( function() {
		 *      var oTable = $('#example').dataTable( {
		 *        "sAjaxSource": "sources/deep.txt",
		 *        "aoColumns": [
		 *          { "mData": "engine" },
		 *          { "mData": "browser" },
		 *          {
		 *            "mData": "platform",
		 *            "mRender": "[, ].name"
		 *          }
		 *        ]
		 *      } );
		 *    } );
		 * 
		 *  @example
		 *    // Use as a function to create a link from the data source
		 *    $(document).ready( function() {
		 *      var oTable = $('#example').dataTable( {
		 *        "aoColumnDefs": [
		 *        {
		 *          "aTargets": [ 0 ],
		 *          "mData": "download_link",
		 *          "mRender": function ( data, type, full ) {
		 *            return '<a href="'+data+'">Download</a>';
		 *          }
		 *        ]
		 *      } );
		 *    } );
		 */
		"mRender": null,
	
	
		/**
		 * Change the cell type created for the column - either TD cells or TH cells. This
		 * can be useful as TH cells have semantic meaning in the table body, allowing them
		 * to act as a header for a row (you may wish to add scope='row' to the TH elements).
		 *  @type string
		 *  @default td
		 *  @dtopt Columns
		 * 
		 *  @example
		 *    // Make the first column use TH cells
		 *    $(document).ready( function() {
		 *      var oTable = $('#example').dataTable( {
		 *        "aoColumnDefs": [ {
		 *          "aTargets": [ 0 ],
		 *          "sCellType": "th"
		 *        } ]
		 *      } );
		 *    } );
		 */
		"sCellType": "td",
	
	
		/**
		 * Class to give to each cell in this column.
		 *  @type string
		 *  @default <i>Empty string</i>
		 *  @dtopt Columns
		 * 
		 *  @example
		 *    // Using aoColumnDefs
		 *    $(document).ready( function() {
		 *      $('#example').dataTable( {
		 *        "aoColumnDefs": [ 
		 *          { "sClass": "my_class", "aTargets": [ 0 ] }
		 *        ]
		 *      } );
		 *    } );
		 *    
		 *  @example
		 *    // Using aoColumns
		 *    $(document).ready( function() {
		 *      $('#example').dataTable( {
		 *        "aoColumns": [ 
		 *          { "sClass": "my_class" },
		 *          null,
		 *          null,
		 *          null,
		 *          null
		 *        ]
		 *      } );
		 *    } );
		 */
		"sClass": "",
		
		/**
		 * When DataTables calculates the column widths to assign to each column,
		 * it finds the longest string in each column and then constructs a
		 * temporary table and reads the widths from that. The problem with this
		 * is that "mmm" is much wider then "iiii", but the latter is a longer 
		 * string - thus the calculation can go wrong (doing it properly and putting
		 * it into an DOM object and measuring that is horribly(!) slow). Thus as
		 * a "work around" we provide this option. It will append its value to the
		 * text that is found to be the longest string for the column - i.e. padding.
		 * Generally you shouldn't need this, and it is not documented on the 
		 * general DataTables.net documentation
		 *  @type string
		 *  @default <i>Empty string<i>
		 *  @dtopt Columns
		 *    
		 *  @example
		 *    // Using aoColumns
		 *    $(document).ready( function() {
		 *      $('#example').dataTable( {
		 *        "aoColumns": [ 
		 *          null,
		 *          null,
		 *          null,
		 *          {
		 *            "sContentPadding": "mmm"
		 *          }
		 *        ]
		 *      } );
		 *    } );
		 */
		"sContentPadding": "",
	
	
		/**
		 * Allows a default value to be given for a column's data, and will be used
		 * whenever a null data source is encountered (this can be because mData
		 * is set to null, or because the data source itself is null).
		 *  @type string
		 *  @default null
		 *  @dtopt Columns
		 * 
		 *  @example
		 *    // Using aoColumnDefs
		 *    $(document).ready( function() {
		 *      $('#example').dataTable( {
		 *        "aoColumnDefs": [ 
		 *          {
		 *            "mData": null,
		 *            "sDefaultContent": "Edit",
		 *            "aTargets": [ -1 ]
		 *          }
		 *        ]
		 *      } );
		 *    } );
		 *    
		 *  @example
		 *    // Using aoColumns
		 *    $(document).ready( function() {
		 *      $('#example').dataTable( {
		 *        "aoColumns": [ 
		 *          null,
		 *          null,
		 *          null,
		 *          {
		 *            "mData": null,
		 *            "sDefaultContent": "Edit"
		 *          }
		 *        ]
		 *      } );
		 *    } );
		 */
		"sDefaultContent": null,
	
	
		/**
		 * This parameter is only used in DataTables' server-side processing. It can
		 * be exceptionally useful to know what columns are being displayed on the
		 * client side, and to map these to database fields. When defined, the names
		 * also allow DataTables to reorder information from the server if it comes
		 * back in an unexpected order (i.e. if you switch your columns around on the
		 * client-side, your server-side code does not also need updating).
		 *  @type string
		 *  @default <i>Empty string</i>
		 *  @dtopt Columns
		 * 
		 *  @example
		 *    // Using aoColumnDefs
		 *    $(document).ready( function() {
		 *      $('#example').dataTable( {
		 *        "aoColumnDefs": [ 
		 *          { "sName": "engine", "aTargets": [ 0 ] },
		 *          { "sName": "browser", "aTargets": [ 1 ] },
		 *          { "sName": "platform", "aTargets": [ 2 ] },
		 *          { "sName": "version", "aTargets": [ 3 ] },
		 *          { "sName": "grade", "aTargets": [ 4 ] }
		 *        ]
		 *      } );
		 *    } );
		 *    
		 *  @example
		 *    // Using aoColumns
		 *    $(document).ready( function() {
		 *      $('#example').dataTable( {
		 *        "aoColumns": [ 
		 *          { "sName": "engine" },
		 *          { "sName": "browser" },
		 *          { "sName": "platform" },
		 *          { "sName": "version" },
		 *          { "sName": "grade" }
		 *        ]
		 *      } );
		 *    } );
		 */
		"sName": "",
	
	
		/**
		 * Defines a data source type for the sorting which can be used to read
		 * real-time information from the table (updating the internally cached
		 * version) prior to sorting. This allows sorting to occur on user editable
		 * elements such as form inputs.
		 *  @type string
		 *  @default std
		 *  @dtopt Columns
		 * 
		 *  @example
		 *    // Using aoColumnDefs
		 *    $(document).ready( function() {
		 *      $('#example').dataTable( {
		 *        "aoColumnDefs": [
		 *          { "sSortDataType": "dom-text", "aTargets": [ 2, 3 ] },
		 *          { "sType": "numeric", "aTargets": [ 3 ] },
		 *          { "sSortDataType": "dom-select", "aTargets": [ 4 ] },
		 *          { "sSortDataType": "dom-checkbox", "aTargets": [ 5 ] }
		 *        ]
		 *      } );
		 *    } );
		 *    
		 *  @example
		 *    // Using aoColumns
		 *    $(document).ready( function() {
		 *      $('#example').dataTable( {
		 *        "aoColumns": [
		 *          null,
		 *          null,
		 *          { "sSortDataType": "dom-text" },
		 *          { "sSortDataType": "dom-text", "sType": "numeric" },
		 *          { "sSortDataType": "dom-select" },
		 *          { "sSortDataType": "dom-checkbox" }
		 *        ]
		 *      } );
		 *    } );
		 */
		"sSortDataType": "std",
	
	
		/**
		 * The title of this column.
		 *  @type string
		 *  @default null <i>Derived from the 'TH' value for this column in the 
		 *    original HTML table.</i>
		 *  @dtopt Columns
		 * 
		 *  @example
		 *    // Using aoColumnDefs
		 *    $(document).ready( function() {
		 *      $('#example').dataTable( {
		 *        "aoColumnDefs": [ 
		 *          { "sTitle": "My column title", "aTargets": [ 0 ] }
		 *        ]
		 *      } );
		 *    } );
		 *    
		 *  @example
		 *    // Using aoColumns
		 *    $(document).ready( function() {
		 *      $('#example').dataTable( {
		 *        "aoColumns": [ 
		 *          { "sTitle": "My column title" },
		 *          null,
		 *          null,
		 *          null,
		 *          null
		 *        ]
		 *      } );
		 *    } );
		 */
		"sTitle": null,
	
	
		/**
		 * The type allows you to specify how the data for this column will be sorted.
		 * Four types (string, numeric, date and html (which will strip HTML tags
		 * before sorting)) are currently available. Note that only date formats
		 * understood by Javascript's Date() object will be accepted as type date. For
		 * example: "Mar 26, 2008 5:03 PM". May take the values: 'string', 'numeric',
		 * 'date' or 'html' (by default). Further types can be adding through
		 * plug-ins.
		 *  @type string
		 *  @default null <i>Auto-detected from raw data</i>
		 *  @dtopt Columns
		 * 
		 *  @example
		 *    // Using aoColumnDefs
		 *    $(document).ready( function() {
		 *      $('#example').dataTable( {
		 *        "aoColumnDefs": [ 
		 *          { "sType": "html", "aTargets": [ 0 ] }
		 *        ]
		 *      } );
		 *    } );
		 *    
		 *  @example
		 *    // Using aoColumns
		 *    $(document).ready( function() {
		 *      $('#example').dataTable( {
		 *        "aoColumns": [ 
		 *          { "sType": "html" },
		 *          null,
		 *          null,
		 *          null,
		 *          null
		 *        ]
		 *      } );
		 *    } );
		 */
		"sType": null,
	
	
		/**
		 * Defining the width of the column, this parameter may take any CSS value
		 * (3em, 20px etc). DataTables apples 'smart' widths to columns which have not
		 * been given a specific width through this interface ensuring that the table
		 * remains readable.
		 *  @type string
		 *  @default null <i>Automatic</i>
		 *  @dtopt Columns
		 * 
		 *  @example
		 *    // Using aoColumnDefs
		 *    $(document).ready( function() {
		 *      $('#example').dataTable( {
		 *        "aoColumnDefs": [ 
		 *          { "sWidth": "20%", "aTargets": [ 0 ] }
		 *        ]
		 *      } );
		 *    } );
		 *    
		 *  @example
		 *    // Using aoColumns
		 *    $(document).ready( function() {
		 *      $('#example').dataTable( {
		 *        "aoColumns": [ 
		 *          { "sWidth": "20%" },
		 *          null,
		 *          null,
		 *          null,
		 *          null
		 *        ]
		 *      } );
		 *    } );
		 */
		"sWidth": null
	};
	
	
	
	/**
	 * DataTables settings object - this holds all the information needed for a
	 * given table, including configuration, data and current application of the
	 * table options. DataTables does not have a single instance for each DataTable
	 * with the settings attached to that instance, but rather instances of the
	 * DataTable "class" are created on-the-fly as needed (typically by a 
	 * $().dataTable() call) and the settings object is then applied to that
	 * instance.
	 * 
	 * Note that this object is related to {@link DataTable.defaults} but this 
	 * one is the internal data store for DataTables's cache of columns. It should
	 * NOT be manipulated outside of DataTables. Any configuration should be done
	 * through the initialisation options.
	 *  @namespace
	 *  @todo Really should attach the settings object to individual instances so we
	 *    don't need to create new instances on each $().dataTable() call (if the
	 *    table already exists). It would also save passing oSettings around and
	 *    into every single function. However, this is a very significant 
	 *    architecture change for DataTables and will almost certainly break
	 *    backwards compatibility with older installations. This is something that
	 *    will be done in 2.0.
	 */
	DataTable.models.oSettings = {
		/**
		 * Primary features of DataTables and their enablement state.
		 *  @namespace
		 */
		"oFeatures": {
			
			/**
			 * Flag to say if DataTables should automatically try to calculate the
			 * optimum table and columns widths (true) or not (false).
			 * Note that this parameter will be set by the initialisation routine. To
			 * set a default use {@link DataTable.defaults}.
			 *  @type boolean
			 */
			"bAutoWidth": null,
	
			/**
			 * Delay the creation of TR and TD elements until they are actually
			 * needed by a driven page draw. This can give a significant speed
			 * increase for Ajax source and Javascript source data, but makes no
			 * difference at all fro DOM and server-side processing tables.
			 * Note that this parameter will be set by the initialisation routine. To
			 * set a default use {@link DataTable.defaults}.
			 *  @type boolean
			 */
			"bDeferRender": null,
			
			/**
			 * Enable filtering on the table or not. Note that if this is disabled
			 * then there is no filtering at all on the table, including fnFilter.
			 * To just remove the filtering input use sDom and remove the 'f' option.
			 * Note that this parameter will be set by the initialisation routine. To
			 * set a default use {@link DataTable.defaults}.
			 *  @type boolean
			 */
			"bFilter": null,
			
			/**
			 * Table information element (the 'Showing x of y records' div) enable
			 * flag.
			 * Note that this parameter will be set by the initialisation routine. To
			 * set a default use {@link DataTable.defaults}.
			 *  @type boolean
			 */
			"bInfo": null,
			
			/**
			 * Present a user control allowing the end user to change the page size
			 * when pagination is enabled.
			 * Note that this parameter will be set by the initialisation routine. To
			 * set a default use {@link DataTable.defaults}.
			 *  @type boolean
			 */
			"bLengthChange": null,
	
			/**
			 * Pagination enabled or not. Note that if this is disabled then length
			 * changing must also be disabled.
			 * Note that this parameter will be set by the initialisation routine. To
			 * set a default use {@link DataTable.defaults}.
			 *  @type boolean
			 */
			"bPaginate": null,
			
			/**
			 * Processing indicator enable flag whenever DataTables is enacting a
			 * user request - typically an Ajax request for server-side processing.
			 * Note that this parameter will be set by the initialisation routine. To
			 * set a default use {@link DataTable.defaults}.
			 *  @type boolean
			 */
			"bProcessing": null,
			
			/**
			 * Server-side processing enabled flag - when enabled DataTables will
			 * get all data from the server for every draw - there is no filtering,
			 * sorting or paging done on the client-side.
			 * Note that this parameter will be set by the initialisation routine. To
			 * set a default use {@link DataTable.defaults}.
			 *  @type boolean
			 */
			"bServerSide": null,
			
			/**
			 * Sorting enablement flag.
			 * Note that this parameter will be set by the initialisation routine. To
			 * set a default use {@link DataTable.defaults}.
			 *  @type boolean
			 */
			"bSort": null,
			
			/**
			 * Apply a class to the columns which are being sorted to provide a
			 * visual highlight or not. This can slow things down when enabled since
			 * there is a lot of DOM interaction.
			 * Note that this parameter will be set by the initialisation routine. To
			 * set a default use {@link DataTable.defaults}.
			 *  @type boolean
			 */
			"bSortClasses": null,
			
			/**
			 * State saving enablement flag.
			 * Note that this parameter will be set by the initialisation routine. To
			 * set a default use {@link DataTable.defaults}.
			 *  @type boolean
			 */
			"bStateSave": null
		},
		
	
		/**
		 * Scrolling settings for a table.
		 *  @namespace
		 */
		"oScroll": {
			/**
			 * Indicate if DataTables should be allowed to set the padding / margin
			 * etc for the scrolling header elements or not. Typically you will want
			 * this.
			 * Note that this parameter will be set by the initialisation routine. To
			 * set a default use {@link DataTable.defaults}.
			 *  @type boolean
			 */
			"bAutoCss": null,
			
			/**
			 * When the table is shorter in height than sScrollY, collapse the
			 * table container down to the height of the table (when true).
			 * Note that this parameter will be set by the initialisation routine. To
			 * set a default use {@link DataTable.defaults}.
			 *  @type boolean
			 */
			"bCollapse": null,
			
			/**
			 * Infinite scrolling enablement flag. Now deprecated in favour of
			 * using the Scroller plug-in.
			 * Note that this parameter will be set by the initialisation routine. To
			 * set a default use {@link DataTable.defaults}.
			 *  @type boolean
			 */
			"bInfinite": null,
			
			/**
			 * Width of the scrollbar for the web-browser's platform. Calculated
			 * during table initialisation.
			 *  @type int
			 *  @default 0
			 */
			"iBarWidth": 0,
			
			/**
			 * Space (in pixels) between the bottom of the scrolling container and 
			 * the bottom of the scrolling viewport before the next page is loaded
			 * when using infinite scrolling.
			 * Note that this parameter will be set by the initialisation routine. To
			 * set a default use {@link DataTable.defaults}.
			 *  @type int
			 */
			"iLoadGap": null,
			
			/**
			 * Viewport width for horizontal scrolling. Horizontal scrolling is 
			 * disabled if an empty string.
			 * Note that this parameter will be set by the initialisation routine. To
			 * set a default use {@link DataTable.defaults}.
			 *  @type string
			 */
			"sX": null,
			
			/**
			 * Width to expand the table to when using x-scrolling. Typically you
			 * should not need to use this.
			 * Note that this parameter will be set by the initialisation routine. To
			 * set a default use {@link DataTable.defaults}.
			 *  @type string
			 *  @deprecated
			 */
			"sXInner": null,
			
			/**
			 * Viewport height for vertical scrolling. Vertical scrolling is disabled
			 * if an empty string.
			 * Note that this parameter will be set by the initialisation routine. To
			 * set a default use {@link DataTable.defaults}.
			 *  @type string
			 */
			"sY": null
		},
		
		/**
		 * Language information for the table.
		 *  @namespace
		 *  @extends DataTable.defaults.oLanguage
		 */
		"oLanguage": {
			/**
			 * Information callback function. See 
			 * {@link DataTable.defaults.fnInfoCallback}
			 *  @type function
			 *  @default null
			 */
			"fnInfoCallback": null
		},
		
		/**
		 * Browser support parameters
		 *  @namespace
		 */
		"oBrowser": {
			/**
			 * Indicate if the browser incorrectly calculates width:100% inside a
			 * scrolling element (IE6/7)
			 *  @type boolean
			 *  @default false
			 */
			"bScrollOversize": false
		},
		
		/**
		 * Array referencing the nodes which are used for the features. The 
		 * parameters of this object match what is allowed by sDom - i.e.
		 *   <ul>
		 *     <li>'l' - Length changing</li>
		 *     <li>'f' - Filtering input</li>
		 *     <li>'t' - The table!</li>
		 *     <li>'i' - Information</li>
		 *     <li>'p' - Pagination</li>
		 *     <li>'r' - pRocessing</li>
		 *   </ul>
		 *  @type array
		 *  @default []
		 */
		"aanFeatures": [],
		
		/**
		 * Store data information - see {@link DataTable.models.oRow} for detailed
		 * information.
		 *  @type array
		 *  @default []
		 */
		"aoData": [],
		
		/**
		 * Array of indexes which are in the current display (after filtering etc)
		 *  @type array
		 *  @default []
		 */
		"aiDisplay": [],
		
		/**
		 * Array of indexes for display - no filtering
		 *  @type array
		 *  @default []
		 */
		"aiDisplayMaster": [],
		
		/**
		 * Store information about each column that is in use
		 *  @type array
		 *  @default []
		 */
		"aoColumns": [],
		
		/**
		 * Store information about the table's header
		 *  @type array
		 *  @default []
		 */
		"aoHeader": [],
		
		/**
		 * Store information about the table's footer
		 *  @type array
		 *  @default []
		 */
		"aoFooter": [],
		
		/**
		 * Search data array for regular expression searching
		 *  @type array
		 *  @default []
		 */
		"asDataSearch": [],
		
		/**
		 * Store the applied global search information in case we want to force a 
		 * research or compare the old search to a new one.
		 * Note that this parameter will be set by the initialisation routine. To
		 * set a default use {@link DataTable.defaults}.
		 *  @namespace
		 *  @extends DataTable.models.oSearch
		 */
		"oPreviousSearch": {},
		
		/**
		 * Store the applied search for each column - see 
		 * {@link DataTable.models.oSearch} for the format that is used for the
		 * filtering information for each column.
		 *  @type array
		 *  @default []
		 */
		"aoPreSearchCols": [],
		
		/**
		 * Sorting that is applied to the table. Note that the inner arrays are
		 * used in the following manner:
		 * <ul>
		 *   <li>Index 0 - column number</li>
		 *   <li>Index 1 - current sorting direction</li>
		 *   <li>Index 2 - index of asSorting for this column</li>
		 * </ul>
		 * Note that this parameter will be set by the initialisation routine. To
		 * set a default use {@link DataTable.defaults}.
		 *  @type array
		 *  @todo These inner arrays should really be objects
		 */
		"aaSorting": null,
		
		/**
		 * Sorting that is always applied to the table (i.e. prefixed in front of
		 * aaSorting).
		 * Note that this parameter will be set by the initialisation routine. To
		 * set a default use {@link DataTable.defaults}.
		 *  @type array|null
		 *  @default null
		 */
		"aaSortingFixed": null,
		
		/**
		 * Classes to use for the striping of a table.
		 * Note that this parameter will be set by the initialisation routine. To
		 * set a default use {@link DataTable.defaults}.
		 *  @type array
		 *  @default []
		 */
		"asStripeClasses": null,
		
		/**
		 * If restoring a table - we should restore its striping classes as well
		 *  @type array
		 *  @default []
		 */
		"asDestroyStripes": [],
		
		/**
		 * If restoring a table - we should restore its width 
		 *  @type int
		 *  @default 0
		 */
		"sDestroyWidth": 0,
		
		/**
		 * Callback functions array for every time a row is inserted (i.e. on a draw).
		 *  @type array
		 *  @default []
		 */
		"aoRowCallback": [],
		
		/**
		 * Callback functions for the header on each draw.
		 *  @type array
		 *  @default []
		 */
		"aoHeaderCallback": [],
		
		/**
		 * Callback function for the footer on each draw.
		 *  @type array
		 *  @default []
		 */
		"aoFooterCallback": [],
		
		/**
		 * Array of callback functions for draw callback functions
		 *  @type array
		 *  @default []
		 */
		"aoDrawCallback": [],
		
		/**
		 * Array of callback functions for row created function
		 *  @type array
		 *  @default []
		 */
		"aoRowCreatedCallback": [],
		
		/**
		 * Callback functions for just before the table is redrawn. A return of 
		 * false will be used to cancel the draw.
		 *  @type array
		 *  @default []
		 */
		"aoPreDrawCallback": [],
		
		/**
		 * Callback functions for when the table has been initialised.
		 *  @type array
		 *  @default []
		 */
		"aoInitComplete": [],
	
		
		/**
		 * Callbacks for modifying the settings to be stored for state saving, prior to
		 * saving state.
		 *  @type array
		 *  @default []
		 */
		"aoStateSaveParams": [],
		
		/**
		 * Callbacks for modifying the settings that have been stored for state saving
		 * prior to using the stored values to restore the state.
		 *  @type array
		 *  @default []
		 */
		"aoStateLoadParams": [],
		
		/**
		 * Callbacks for operating on the settings object once the saved state has been
		 * loaded
		 *  @type array
		 *  @default []
		 */
		"aoStateLoaded": [],
		
		/**
		 * Cache the table ID for quick access
		 *  @type string
		 *  @default <i>Empty string</i>
		 */
		"sTableId": "",
		
		/**
		 * The TABLE node for the main table
		 *  @type node
		 *  @default null
		 */
		"nTable": null,
		
		/**
		 * Permanent ref to the thead element
		 *  @type node
		 *  @default null
		 */
		"nTHead": null,
		
		/**
		 * Permanent ref to the tfoot element - if it exists
		 *  @type node
		 *  @default null
		 */
		"nTFoot": null,
		
		/**
		 * Permanent ref to the tbody element
		 *  @type node
		 *  @default null
		 */
		"nTBody": null,
		
		/**
		 * Cache the wrapper node (contains all DataTables controlled elements)
		 *  @type node
		 *  @default null
		 */
		"nTableWrapper": null,
		
		/**
		 * Indicate if when using server-side processing the loading of data 
		 * should be deferred until the second draw.
		 * Note that this parameter will be set by the initialisation routine. To
		 * set a default use {@link DataTable.defaults}.
		 *  @type boolean
		 *  @default false
		 */
		"bDeferLoading": false,
		
		/**
		 * Indicate if all required information has been read in
		 *  @type boolean
		 *  @default false
		 */
		"bInitialised": false,
		
		/**
		 * Information about open rows. Each object in the array has the parameters
		 * 'nTr' and 'nParent'
		 *  @type array
		 *  @default []
		 */
		"aoOpenRows": [],
		
		/**
		 * Dictate the positioning of DataTables' control elements - see
		 * {@link DataTable.model.oInit.sDom}.
		 * Note that this parameter will be set by the initialisation routine. To
		 * set a default use {@link DataTable.defaults}.
		 *  @type string
		 *  @default null
		 */
		"sDom": null,
		
		/**
		 * Which type of pagination should be used.
		 * Note that this parameter will be set by the initialisation routine. To
		 * set a default use {@link DataTable.defaults}.
		 *  @type string 
		 *  @default two_button
		 */
		"sPaginationType": "two_button",
		
		/**
		 * The cookie duration (for bStateSave) in seconds.
		 * Note that this parameter will be set by the initialisation routine. To
		 * set a default use {@link DataTable.defaults}.
		 *  @type int
		 *  @default 0
		 */
		"iCookieDuration": 0,
		
		/**
		 * The cookie name prefix.
		 * Note that this parameter will be set by the initialisation routine. To
		 * set a default use {@link DataTable.defaults}.
		 *  @type string
		 *  @default <i>Empty string</i>
		 */
		"sCookiePrefix": "",
		
		/**
		 * Callback function for cookie creation.
		 * Note that this parameter will be set by the initialisation routine. To
		 * set a default use {@link DataTable.defaults}.
		 *  @type function
		 *  @default null
		 */
		"fnCookieCallback": null,
		
		/**
		 * Array of callback functions for state saving. Each array element is an 
		 * object with the following parameters:
		 *   <ul>
		 *     <li>function:fn - function to call. Takes two parameters, oSettings
		 *       and the JSON string to save that has been thus far created. Returns
		 *       a JSON string to be inserted into a json object 
		 *       (i.e. '"param": [ 0, 1, 2]')</li>
		 *     <li>string:sName - name of callback</li>
		 *   </ul>
		 *  @type array
		 *  @default []
		 */
		"aoStateSave": [],
		
		/**
		 * Array of callback functions for state loading. Each array element is an 
		 * object with the following parameters:
		 *   <ul>
		 *     <li>function:fn - function to call. Takes two parameters, oSettings 
		 *       and the object stored. May return false to cancel state loading</li>
		 *     <li>string:sName - name of callback</li>
		 *   </ul>
		 *  @type array
		 *  @default []
		 */
		"aoStateLoad": [],
		
		/**
		 * State that was loaded from the cookie. Useful for back reference
		 *  @type object
		 *  @default null
		 */
		"oLoadedState": null,
		
		/**
		 * Source url for AJAX data for the table.
		 * Note that this parameter will be set by the initialisation routine. To
		 * set a default use {@link DataTable.defaults}.
		 *  @type string
		 *  @default null
		 */
		"sAjaxSource": null,
		
		/**
		 * Property from a given object from which to read the table data from. This
		 * can be an empty string (when not server-side processing), in which case 
		 * it is  assumed an an array is given directly.
		 * Note that this parameter will be set by the initialisation routine. To
		 * set a default use {@link DataTable.defaults}.
		 *  @type string
		 */
		"sAjaxDataProp": null,
		
		/**
		 * Note if draw should be blocked while getting data
		 *  @type boolean
		 *  @default true
		 */
		"bAjaxDataGet": true,
		
		/**
		 * The last jQuery XHR object that was used for server-side data gathering. 
		 * This can be used for working with the XHR information in one of the 
		 * callbacks
		 *  @type object
		 *  @default null
		 */
		"jqXHR": null,
		
		/**
		 * Function to get the server-side data.
		 * Note that this parameter will be set by the initialisation routine. To
		 * set a default use {@link DataTable.defaults}.
		 *  @type function
		 */
		"fnServerData": null,
		
		/**
		 * Functions which are called prior to sending an Ajax request so extra 
		 * parameters can easily be sent to the server
		 *  @type array
		 *  @default []
		 */
		"aoServerParams": [],
		
		/**
		 * Send the XHR HTTP method - GET or POST (could be PUT or DELETE if 
		 * required).
		 * Note that this parameter will be set by the initialisation routine. To
		 * set a default use {@link DataTable.defaults}.
		 *  @type string
		 */
		"sServerMethod": null,
		
		/**
		 * Format numbers for display.
		 * Note that this parameter will be set by the initialisation routine. To
		 * set a default use {@link DataTable.defaults}.
		 *  @type function
		 */
		"fnFormatNumber": null,
		
		/**
		 * List of options that can be used for the user selectable length menu.
		 * Note that this parameter will be set by the initialisation routine. To
		 * set a default use {@link DataTable.defaults}.
		 *  @type array
		 *  @default []
		 */
		"aLengthMenu": null,
		
		/**
		 * Counter for the draws that the table does. Also used as a tracker for
		 * server-side processing
		 *  @type int
		 *  @default 0
		 */
		"iDraw": 0,
		
		/**
		 * Indicate if a redraw is being done - useful for Ajax
		 *  @type boolean
		 *  @default false
		 */
		"bDrawing": false,
		
		/**
		 * Draw index (iDraw) of the last error when parsing the returned data
		 *  @type int
		 *  @default -1
		 */
		"iDrawError": -1,
		
		/**
		 * Paging display length
		 *  @type int
		 *  @default 10
		 */
		"_iDisplayLength": 10,
	
		/**
		 * Paging start point - aiDisplay index
		 *  @type int
		 *  @default 0
		 */
		"_iDisplayStart": 0,
	
		/**
		 * Paging end point - aiDisplay index. Use fnDisplayEnd rather than
		 * this property to get the end point
		 *  @type int
		 *  @default 10
		 *  @private
		 */
		"_iDisplayEnd": 10,
		
		/**
		 * Server-side processing - number of records in the result set
		 * (i.e. before filtering), Use fnRecordsTotal rather than
		 * this property to get the value of the number of records, regardless of
		 * the server-side processing setting.
		 *  @type int
		 *  @default 0
		 *  @private
		 */
		"_iRecordsTotal": 0,
	
		/**
		 * Server-side processing - number of records in the current display set
		 * (i.e. after filtering). Use fnRecordsDisplay rather than
		 * this property to get the value of the number of records, regardless of
		 * the server-side processing setting.
		 *  @type boolean
		 *  @default 0
		 *  @private
		 */
		"_iRecordsDisplay": 0,
		
		/**
		 * Flag to indicate if jQuery UI marking and classes should be used.
		 * Note that this parameter will be set by the initialisation routine. To
		 * set a default use {@link DataTable.defaults}.
		 *  @type boolean
		 */
		"bJUI": null,
		
		/**
		 * The classes to use for the table
		 *  @type object
		 *  @default {}
		 */
		"oClasses": {},
		
		/**
		 * Flag attached to the settings object so you can check in the draw 
		 * callback if filtering has been done in the draw. Deprecated in favour of
		 * events.
		 *  @type boolean
		 *  @default false
		 *  @deprecated
		 */
		"bFiltered": false,
		
		/**
		 * Flag attached to the settings object so you can check in the draw 
		 * callback if sorting has been done in the draw. Deprecated in favour of
		 * events.
		 *  @type boolean
		 *  @default false
		 *  @deprecated
		 */
		"bSorted": false,
		
		/**
		 * Indicate that if multiple rows are in the header and there is more than 
		 * one unique cell per column, if the top one (true) or bottom one (false) 
		 * should be used for sorting / title by DataTables.
		 * Note that this parameter will be set by the initialisation routine. To
		 * set a default use {@link DataTable.defaults}.
		 *  @type boolean
		 */
		"bSortCellsTop": null,
		
		/**
		 * Initialisation object that is used for the table
		 *  @type object
		 *  @default null
		 */
		"oInit": null,
		
		/**
		 * Destroy callback functions - for plug-ins to attach themselves to the
		 * destroy so they can clean up markup and events.
		 *  @type array
		 *  @default []
		 */
		"aoDestroyCallback": [],
	
		
		/**
		 * Get the number of records in the current record set, before filtering
		 *  @type function
		 */
		"fnRecordsTotal": function ()
		{
			if ( this.oFeatures.bServerSide ) {
				return parseInt(this._iRecordsTotal, 10);
			} else {
				return this.aiDisplayMaster.length;
			}
		},
		
		/**
		 * Get the number of records in the current record set, after filtering
		 *  @type function
		 */
		"fnRecordsDisplay": function ()
		{
			if ( this.oFeatures.bServerSide ) {
				return parseInt(this._iRecordsDisplay, 10);
			} else {
				return this.aiDisplay.length;
			}
		},
		
		/**
		 * Set the display end point - aiDisplay index
		 *  @type function
		 *  @todo Should do away with _iDisplayEnd and calculate it on-the-fly here
		 */
		"fnDisplayEnd": function ()
		{
			if ( this.oFeatures.bServerSide ) {
				if ( this.oFeatures.bPaginate === false || this._iDisplayLength == -1 ) {
					return this._iDisplayStart+this.aiDisplay.length;
				} else {
					return Math.min( this._iDisplayStart+this._iDisplayLength, 
						this._iRecordsDisplay );
				}
			} else {
				return this._iDisplayEnd;
			}
		},
		
		/**
		 * The DataTables object for this table
		 *  @type object
		 *  @default null
		 */
		"oInstance": null,
		
		/**
		 * Unique identifier for each instance of the DataTables object. If there
		 * is an ID on the table node, then it takes that value, otherwise an
		 * incrementing internal counter is used.
		 *  @type string
		 *  @default null
		 */
		"sInstance": null,
	
		/**
		 * tabindex attribute value that is added to DataTables control elements, allowing
		 * keyboard navigation of the table and its controls.
		 */
		"iTabIndex": 0,
	
		/**
		 * DIV container for the footer scrolling table if scrolling
		 */
		"nScrollHead": null,
	
		/**
		 * DIV container for the footer scrolling table if scrolling
		 */
		"nScrollFoot": null
	};

	/**
	 * Extension object for DataTables that is used to provide all extension options.
	 * 
	 * Note that the <i>DataTable.ext</i> object is available through
	 * <i>jQuery.fn.dataTable.ext</i> where it may be accessed and manipulated. It is
	 * also aliased to <i>jQuery.fn.dataTableExt</i> for historic reasons.
	 *  @namespace
	 *  @extends DataTable.models.ext
	 */
	DataTable.ext = $.extend( true, {}, DataTable.models.ext );
	
	$.extend( DataTable.ext.oStdClasses, {
		"sTable": "dataTable",
	
		/* Two buttons buttons */
		"sPagePrevEnabled": "paginate_enabled_previous",
		"sPagePrevDisabled": "paginate_disabled_previous",
		"sPageNextEnabled": "paginate_enabled_next",
		"sPageNextDisabled": "paginate_disabled_next",
		"sPageJUINext": "",
		"sPageJUIPrev": "",
		
		/* Full numbers paging buttons */
		"sPageButton": "paginate_button",
		"sPageButtonActive": "paginate_active",
		"sPageButtonStaticDisabled": "paginate_button paginate_button_disabled",
		"sPageFirst": "first",
		"sPagePrevious": "previous",
		"sPageNext": "next",
		"sPageLast": "last",
		
		/* Striping classes */
		"sStripeOdd": "odd",
		"sStripeEven": "even",
		
		/* Empty row */
		"sRowEmpty": "dataTables_empty",
		
		/* Features */
		"sWrapper": "dataTables_wrapper",
		"sFilter": "dataTables_filter",
		"sInfo": "dataTables_info",
		"sPaging": "dataTables_paginate paging_", /* Note that the type is postfixed */
		"sLength": "dataTables_length",
		"sProcessing": "dataTables_processing",
		
		/* Sorting */
		"sSortAsc": "sorting_asc",
		"sSortDesc": "sorting_desc",
		"sSortable": "sorting", /* Sortable in both directions */
		"sSortableAsc": "sorting_asc_disabled",
		"sSortableDesc": "sorting_desc_disabled",
		"sSortableNone": "sorting_disabled",
		"sSortColumn": "sorting_", /* Note that an int is postfixed for the sorting order */
		"sSortJUIAsc": "",
		"sSortJUIDesc": "",
		"sSortJUI": "",
		"sSortJUIAscAllowed": "",
		"sSortJUIDescAllowed": "",
		"sSortJUIWrapper": "",
		"sSortIcon": "",
		
		/* Scrolling */
		"sScrollWrapper": "dataTables_scroll",
		"sScrollHead": "dataTables_scrollHead",
		"sScrollHeadInner": "dataTables_scrollHeadInner",
		"sScrollBody": "dataTables_scrollBody",
		"sScrollFoot": "dataTables_scrollFoot",
		"sScrollFootInner": "dataTables_scrollFootInner",
		
		/* Misc */
		"sFooterTH": "",
		"sJUIHeader": "",
		"sJUIFooter": ""
	} );
	
	
	$.extend( DataTable.ext.oJUIClasses, DataTable.ext.oStdClasses, {
		/* Two buttons buttons */
		"sPagePrevEnabled": "fg-button ui-button ui-state-default ui-corner-left",
		"sPagePrevDisabled": "fg-button ui-button ui-state-default ui-corner-left ui-state-disabled",
		"sPageNextEnabled": "fg-button ui-button ui-state-default ui-corner-right",
		"sPageNextDisabled": "fg-button ui-button ui-state-default ui-corner-right ui-state-disabled",
		"sPageJUINext": "ui-icon ui-icon-circle-arrow-e",
		"sPageJUIPrev": "ui-icon ui-icon-circle-arrow-w",
		
		/* Full numbers paging buttons */
		"sPageButton": "fg-button ui-button ui-state-default",
		"sPageButtonActive": "fg-button ui-button ui-state-default ui-state-disabled",
		"sPageButtonStaticDisabled": "fg-button ui-button ui-state-default ui-state-disabled",
		"sPageFirst": "first ui-corner-tl ui-corner-bl",
		"sPageLast": "last ui-corner-tr ui-corner-br",
		
		/* Features */
		"sPaging": "dataTables_paginate fg-buttonset ui-buttonset fg-buttonset-multi "+
			"ui-buttonset-multi paging_", /* Note that the type is postfixed */
		
		/* Sorting */
		"sSortAsc": "ui-state-default",
		"sSortDesc": "ui-state-default",
		"sSortable": "ui-state-default",
		"sSortableAsc": "ui-state-default",
		"sSortableDesc": "ui-state-default",
		"sSortableNone": "ui-state-default",
		"sSortJUIAsc": "css_right ui-icon ui-icon-triangle-1-n",
		"sSortJUIDesc": "css_right ui-icon ui-icon-triangle-1-s",
		"sSortJUI": "css_right ui-icon ui-icon-carat-2-n-s",
		"sSortJUIAscAllowed": "css_right ui-icon ui-icon-carat-1-n",
		"sSortJUIDescAllowed": "css_right ui-icon ui-icon-carat-1-s",
		"sSortJUIWrapper": "DataTables_sort_wrapper",
		"sSortIcon": "DataTables_sort_icon",
		
		/* Scrolling */
		"sScrollHead": "dataTables_scrollHead ui-state-default",
		"sScrollFoot": "dataTables_scrollFoot ui-state-default",
		
		/* Misc */
		"sFooterTH": "ui-state-default",
		"sJUIHeader": "fg-toolbar ui-toolbar ui-widget-header ui-corner-tl ui-corner-tr ui-helper-clearfix",
		"sJUIFooter": "fg-toolbar ui-toolbar ui-widget-header ui-corner-bl ui-corner-br ui-helper-clearfix"
	} );
	
	/*
	 * Variable: oPagination
	 * Purpose:  
	 * Scope:    jQuery.fn.dataTableExt
	 */
	$.extend( DataTable.ext.oPagination, {
		/*
		 * Variable: two_button
		 * Purpose:  Standard two button (forward/back) pagination
		 * Scope:    jQuery.fn.dataTableExt.oPagination
		 */
		"two_button": {
			/*
			 * Function: oPagination.two_button.fnInit
			 * Purpose:  Initialise dom elements required for pagination with forward/back buttons only
			 * Returns:  -
			 * Inputs:   object:oSettings - dataTables settings object
			 *           node:nPaging - the DIV which contains this pagination control
			 *           function:fnCallbackDraw - draw function which must be called on update
			 */
			"fnInit": function ( oSettings, nPaging, fnCallbackDraw )
			{
				var oLang = oSettings.oLanguage.oPaginate;
				var oClasses = oSettings.oClasses;
				var fnClickHandler = function ( e ) {
					if ( oSettings.oApi._fnPageChange( oSettings, e.data.action ) )
					{
						fnCallbackDraw( oSettings );
					}
				};
	
				var sAppend = (!oSettings.bJUI) ?
					'<a class="'+oSettings.oClasses.sPagePrevDisabled+'" tabindex="'+oSettings.iTabIndex+'" role="button">'+oLang.sPrevious+'</a>'+
					'<a class="'+oSettings.oClasses.sPageNextDisabled+'" tabindex="'+oSettings.iTabIndex+'" role="button">'+oLang.sNext+'</a>'
					:
					'<a class="'+oSettings.oClasses.sPagePrevDisabled+'" tabindex="'+oSettings.iTabIndex+'" role="button"><span class="'+oSettings.oClasses.sPageJUIPrev+'"></span></a>'+
					'<a class="'+oSettings.oClasses.sPageNextDisabled+'" tabindex="'+oSettings.iTabIndex+'" role="button"><span class="'+oSettings.oClasses.sPageJUINext+'"></span></a>';
				$(nPaging).append( sAppend );
				
				var els = $('a', nPaging);
				var nPrevious = els[0],
					nNext = els[1];
				
				oSettings.oApi._fnBindAction( nPrevious, {action: "previous"}, fnClickHandler );
				oSettings.oApi._fnBindAction( nNext,     {action: "next"},     fnClickHandler );
				
				/* ID the first elements only */
				if ( !oSettings.aanFeatures.p )
				{
					nPaging.id = oSettings.sTableId+'_paginate';
					nPrevious.id = oSettings.sTableId+'_previous';
					nNext.id = oSettings.sTableId+'_next';
	
					nPrevious.setAttribute('aria-controls', oSettings.sTableId);
					nNext.setAttribute('aria-controls', oSettings.sTableId);
				}
			},
			
			/*
			 * Function: oPagination.two_button.fnUpdate
			 * Purpose:  Update the two button pagination at the end of the draw
			 * Returns:  -
			 * Inputs:   object:oSettings - dataTables settings object
			 *           function:fnCallbackDraw - draw function to call on page change
			 */
			"fnUpdate": function ( oSettings, fnCallbackDraw )
			{
				if ( !oSettings.aanFeatures.p )
				{
					return;
				}
				
				var oClasses = oSettings.oClasses;
				var an = oSettings.aanFeatures.p;
				var nNode;
	
				/* Loop over each instance of the pager */
				for ( var i=0, iLen=an.length ; i<iLen ; i++ )
				{
					nNode = an[i].firstChild;
					if ( nNode )
					{
						/* Previous page */
						nNode.className = ( oSettings._iDisplayStart === 0 ) ?
						    oClasses.sPagePrevDisabled : oClasses.sPagePrevEnabled;
						    
						/* Next page */
						nNode = nNode.nextSibling;
						nNode.className = ( oSettings.fnDisplayEnd() == oSettings.fnRecordsDisplay() ) ?
						    oClasses.sPageNextDisabled : oClasses.sPageNextEnabled;
					}
				}
			}
		},
		
		
		/*
		 * Variable: iFullNumbersShowPages
		 * Purpose:  Change the number of pages which can be seen
		 * Scope:    jQuery.fn.dataTableExt.oPagination
		 */
		"iFullNumbersShowPages": 5,
		
		/*
		 * Variable: full_numbers
		 * Purpose:  Full numbers pagination
		 * Scope:    jQuery.fn.dataTableExt.oPagination
		 */
		"full_numbers": {
			/*
			 * Function: oPagination.full_numbers.fnInit
			 * Purpose:  Initialise dom elements required for pagination with a list of the pages
			 * Returns:  -
			 * Inputs:   object:oSettings - dataTables settings object
			 *           node:nPaging - the DIV which contains this pagination control
			 *           function:fnCallbackDraw - draw function which must be called on update
			 */
			"fnInit": function ( oSettings, nPaging, fnCallbackDraw )
			{
				var oLang = oSettings.oLanguage.oPaginate;
				var oClasses = oSettings.oClasses;
				var fnClickHandler = function ( e ) {
					if ( oSettings.oApi._fnPageChange( oSettings, e.data.action ) )
					{
						fnCallbackDraw( oSettings );
					}
				};
	
				$(nPaging).append(
					'<a  tabindex="'+oSettings.iTabIndex+'" class="'+oClasses.sPageButton+" "+oClasses.sPageFirst+'">'+oLang.sFirst+'</a>'+
					'<a  tabindex="'+oSettings.iTabIndex+'" class="'+oClasses.sPageButton+" "+oClasses.sPagePrevious+'">'+oLang.sPrevious+'</a>'+
					'<span></span>'+
					'<a tabindex="'+oSettings.iTabIndex+'" class="'+oClasses.sPageButton+" "+oClasses.sPageNext+'">'+oLang.sNext+'</a>'+
					'<a tabindex="'+oSettings.iTabIndex+'" class="'+oClasses.sPageButton+" "+oClasses.sPageLast+'">'+oLang.sLast+'</a>'
				);
				var els = $('a', nPaging);
				var nFirst = els[0],
					nPrev = els[1],
					nNext = els[2],
					nLast = els[3];
				
				oSettings.oApi._fnBindAction( nFirst, {action: "first"},    fnClickHandler );
				oSettings.oApi._fnBindAction( nPrev,  {action: "previous"}, fnClickHandler );
				oSettings.oApi._fnBindAction( nNext,  {action: "next"},     fnClickHandler );
				oSettings.oApi._fnBindAction( nLast,  {action: "last"},     fnClickHandler );
				
				/* ID the first elements only */
				if ( !oSettings.aanFeatures.p )
				{
					nPaging.id = oSettings.sTableId+'_paginate';
					nFirst.id =oSettings.sTableId+'_first';
					nPrev.id =oSettings.sTableId+'_previous';
					nNext.id =oSettings.sTableId+'_next';
					nLast.id =oSettings.sTableId+'_last';
				}
			},
			
			/*
			 * Function: oPagination.full_numbers.fnUpdate
			 * Purpose:  Update the list of page buttons shows
			 * Returns:  -
			 * Inputs:   object:oSettings - dataTables settings object
			 *           function:fnCallbackDraw - draw function to call on page change
			 */
			"fnUpdate": function ( oSettings, fnCallbackDraw )
			{
				if ( !oSettings.aanFeatures.p )
				{
					return;
				}
				
				var iPageCount = DataTable.ext.oPagination.iFullNumbersShowPages;
				var iPageCountHalf = Math.floor(iPageCount / 2);
				var iPages = Math.ceil((oSettings.fnRecordsDisplay()) / oSettings._iDisplayLength);
				var iCurrentPage = Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength) + 1;
				var sList = "";
				var iStartButton, iEndButton, i, iLen;
				var oClasses = oSettings.oClasses;
				var anButtons, anStatic, nPaginateList, nNode;
				var an = oSettings.aanFeatures.p;
				var fnBind = function (j) {
					oSettings.oApi._fnBindAction( this, {"page": j+iStartButton-1}, function(e) {
						/* Use the information in the element to jump to the required page */
						oSettings.oApi._fnPageChange( oSettings, e.data.page );
						fnCallbackDraw( oSettings );
						e.preventDefault();
					} );
				};
				
				/* Pages calculation */
				if ( oSettings._iDisplayLength === -1 )
				{
					iStartButton = 1;
					iEndButton = 1;
					iCurrentPage = 1;
				}
				else if (iPages < iPageCount)
				{
					iStartButton = 1;
					iEndButton = iPages;
				}
				else if (iCurrentPage <= iPageCountHalf)
				{
					iStartButton = 1;
					iEndButton = iPageCount;
				}
				else if (iCurrentPage >= (iPages - iPageCountHalf))
				{
					iStartButton = iPages - iPageCount + 1;
					iEndButton = iPages;
				}
				else
				{
					iStartButton = iCurrentPage - Math.ceil(iPageCount / 2) + 1;
					iEndButton = iStartButton + iPageCount - 1;
				}
	
				
				/* Build the dynamic list */
				for ( i=iStartButton ; i<=iEndButton ; i++ )
				{
					sList += (iCurrentPage !== i) ?
						'<a tabindex="'+oSettings.iTabIndex+'" class="'+oClasses.sPageButton+'">'+oSettings.fnFormatNumber(i)+'</a>' :
						'<a tabindex="'+oSettings.iTabIndex+'" class="'+oClasses.sPageButtonActive+'">'+oSettings.fnFormatNumber(i)+'</a>';
				}
				
				/* Loop over each instance of the pager */
				for ( i=0, iLen=an.length ; i<iLen ; i++ )
				{
					nNode = an[i];
					if ( !nNode.hasChildNodes() )
					{
						continue;
					}
					
					/* Build up the dynamic list first - html and listeners */
					$('span:eq(0)', nNode)
						.html( sList )
						.children('a').each( fnBind );
					
					/* Update the permanent button's classes */
					anButtons = nNode.getElementsByTagName('a');
					anStatic = [
						anButtons[0], anButtons[1], 
						anButtons[anButtons.length-2], anButtons[anButtons.length-1]
					];
	
					$(anStatic).removeClass( oClasses.sPageButton+" "+oClasses.sPageButtonActive+" "+oClasses.sPageButtonStaticDisabled );
					$([anStatic[0], anStatic[1]]).addClass( 
						(iCurrentPage==1) ?
							oClasses.sPageButtonStaticDisabled :
							oClasses.sPageButton
					);
					$([anStatic[2], anStatic[3]]).addClass(
						(iPages===0 || iCurrentPage===iPages || oSettings._iDisplayLength===-1) ?
							oClasses.sPageButtonStaticDisabled :
							oClasses.sPageButton
					);
				}
			}
		}
	} );
	
	$.extend( DataTable.ext.oSort, {
		/*
		 * text sorting
		 */
		"string-pre": function ( a )
		{
			if ( typeof a != 'string' ) {
				a = (a !== null && a.toString) ? a.toString() : '';
			}
			return a.toLowerCase();
		},
	
		"string-asc": function ( x, y )
		{
			return ((x < y) ? -1 : ((x > y) ? 1 : 0));
		},
		
		"string-desc": function ( x, y )
		{
			return ((x < y) ? 1 : ((x > y) ? -1 : 0));
		},
		
		
		/*
		 * html sorting (ignore html tags)
		 */
		"html-pre": function ( a )
		{
			return a.replace( /<.*?>/g, "" ).toLowerCase();
		},
		
		"html-asc": function ( x, y )
		{
			return ((x < y) ? -1 : ((x > y) ? 1 : 0));
		},
		
		"html-desc": function ( x, y )
		{
			return ((x < y) ? 1 : ((x > y) ? -1 : 0));
		},
		
		
		/*
		 * date sorting
		 */
		"date-pre": function ( a )
		{
			var x = Date.parse( a );
			
			if ( isNaN(x) || x==="" )
			{
				x = Date.parse( "01/01/1970 00:00:00" );
			}
			return x;
		},
	
		"date-asc": function ( x, y )
		{
			return x - y;
		},
		
		"date-desc": function ( x, y )
		{
			return y - x;
		},
		
		
		/*
		 * numerical sorting
		 */
		"numeric-pre": function ( a )
		{
			return (a=="-" || a==="") ? 0 : a*1;
		},
	
		"numeric-asc": function ( x, y )
		{
			return x - y;
		},
		
		"numeric-desc": function ( x, y )
		{
			return y - x;
		}
	} );
	
	
	$.extend( DataTable.ext.aTypes, [
		/*
		 * Function: -
		 * Purpose:  Check to see if a string is numeric
		 * Returns:  string:'numeric' or null
		 * Inputs:   mixed:sText - string to check
		 */
		function ( sData )
		{
			/* Allow zero length strings as a number */
			if ( typeof sData === 'number' )
			{
				return 'numeric';
			}
			else if ( typeof sData !== 'string' )
			{
				return null;
			}
			
			var sValidFirstChars = "0123456789-";
			var sValidChars = "0123456789.";
			var Char;
			var bDecimal = false;
			
			/* Check for a valid first char (no period and allow negatives) */
			Char = sData.charAt(0); 
			if (sValidFirstChars.indexOf(Char) == -1) 
			{
				return null;
			}
			
			/* Check all the other characters are valid */
			for ( var i=1 ; i<sData.length ; i++ ) 
			{
				Char = sData.charAt(i); 
				if (sValidChars.indexOf(Char) == -1) 
				{
					return null;
				}
				
				/* Only allowed one decimal place... */
				if ( Char == "." )
				{
					if ( bDecimal )
					{
						return null;
					}
					bDecimal = true;
				}
			}
			
			return 'numeric';
		},
		
		/*
		 * Function: -
		 * Purpose:  Check to see if a string is actually a formatted date
		 * Returns:  string:'date' or null
		 * Inputs:   string:sText - string to check
		 */
		function ( sData )
		{
			var iParse = Date.parse(sData);
			if ( (iParse !== null && !isNaN(iParse)) || (typeof sData === 'string' && sData.length === 0) )
			{
				return 'date';
			}
			return null;
		},
		
		/*
		 * Function: -
		 * Purpose:  Check to see if a string should be treated as an HTML string
		 * Returns:  string:'html' or null
		 * Inputs:   string:sText - string to check
		 */
		function ( sData )
		{
			if ( typeof sData === 'string' && sData.indexOf('<') != -1 && sData.indexOf('>') != -1 )
			{
				return 'html';
			}
			return null;
		}
	] );
	

	// jQuery aliases
	$.fn.DataTable = DataTable;
	$.fn.dataTable = DataTable;
	$.fn.dataTableSettings = DataTable.settings;
	$.fn.dataTableExt = DataTable.ext;


	// Information about events fired by DataTables - for documentation.
	/**
	 * Draw event, fired whenever the table is redrawn on the page, at the same point as
	 * fnDrawCallback. This may be useful for binding events or performing calculations when
	 * the table is altered at all.
	 *  @name DataTable#draw
	 *  @event
	 *  @param {event} e jQuery event object
	 *  @param {object} o DataTables settings object {@link DataTable.models.oSettings}
	 */

	/**
	 * Filter event, fired when the filtering applied to the table (using the build in global
	 * global filter, or column filters) is altered.
	 *  @name DataTable#filter
	 *  @event
	 *  @param {event} e jQuery event object
	 *  @param {object} o DataTables settings object {@link DataTable.models.oSettings}
	 */

	/**
	 * Page change event, fired when the paging of the table is altered.
	 *  @name DataTable#page
	 *  @event
	 *  @param {event} e jQuery event object
	 *  @param {object} o DataTables settings object {@link DataTable.models.oSettings}
	 */

	/**
	 * Sort event, fired when the sorting applied to the table is altered.
	 *  @name DataTable#sort
	 *  @event
	 *  @param {event} e jQuery event object
	 *  @param {object} o DataTables settings object {@link DataTable.models.oSettings}
	 */

	/**
	 * DataTables initialisation complete event, fired when the table is fully drawn,
	 * including Ajax data loaded, if Ajax data is required.
	 *  @name DataTable#init
	 *  @event
	 *  @param {event} e jQuery event object
	 *  @param {object} oSettings DataTables settings object
	 *  @param {object} json The JSON object request from the server - only
	 *    present if client-side Ajax sourced data is used</li></ol>
	 */

	/**
	 * State save event, fired when the table has changed state a new state save is required.
	 * This method allows modification of the state saving object prior to actually doing the
	 * save, including addition or other state properties (for plug-ins) or modification
	 * of a DataTables core property.
	 *  @name DataTable#stateSaveParams
	 *  @event
	 *  @param {event} e jQuery event object
	 *  @param {object} oSettings DataTables settings object
	 *  @param {object} json The state information to be saved
	 */

	/**
	 * State load event, fired when the table is loading state from the stored data, but
	 * prior to the settings object being modified by the saved state - allowing modification
	 * of the saved state is required or loading of state for a plug-in.
	 *  @name DataTable#stateLoadParams
	 *  @event
	 *  @param {event} e jQuery event object
	 *  @param {object} oSettings DataTables settings object
	 *  @param {object} json The saved state information
	 */

	/**
	 * State loaded event, fired when state has been loaded from stored data and the settings
	 * object has been modified by the loaded data.
	 *  @name DataTable#stateLoaded
	 *  @event
	 *  @param {event} e jQuery event object
	 *  @param {object} oSettings DataTables settings object
	 *  @param {object} json The saved state information
	 */

	/**
	 * Processing event, fired when DataTables is doing some kind of processing (be it,
	 * sort, filter or anything else). Can be used to indicate to the end user that
	 * there is something happening, or that something has finished.
	 *  @name DataTable#processing
	 *  @event
	 *  @param {event} e jQuery event object
	 *  @param {object} oSettings DataTables settings object
	 *  @param {boolean} bShow Flag for if DataTables is doing processing or not
	 */

	/**
	 * Ajax (XHR) event, fired whenever an Ajax request is completed from a request to 
	 * made to the server for new data (note that this trigger is called in fnServerData,
	 * if you override fnServerData and which to use this event, you need to trigger it in
	 * you success function).
	 *  @name DataTable#xhr
	 *  @event
	 *  @param {event} e jQuery event object
	 *  @param {object} o DataTables settings object {@link DataTable.models.oSettings}
	 *  @param {object} json JSON returned from the server
	 */

	/**
	 * Destroy event, fired when the DataTable is destroyed by calling fnDestroy or passing
	 * the bDestroy:true parameter in the initialisation object. This can be used to remove
	 * bound events, added DOM nodes, etc.
	 *  @name DataTable#destroy
	 *  @event
	 *  @param {event} e jQuery event object
	 *  @param {object} o DataTables settings object {@link DataTable.models.oSettings}
	 */
}));

}(window, document));


/*!
 * jQuery Migrate - v1.2.1 - 2013-05-08
 * https://github.com/jquery/jquery-migrate
 * Copyright 2005, 2013 jQuery Foundation, Inc. and other contributors; Licensed MIT
 */
(function( jQuery, window, undefined ) {
// See http://bugs.jquery.com/ticket/13335
// "use strict";


var warnedAbout = {};

// List of warnings already given; public read only
jQuery.migrateWarnings = [];

// Set to true to prevent console output; migrateWarnings still maintained
// jQuery.migrateMute = false;

// Show a message on the console so devs know we're active
if ( !jQuery.migrateMute && window.console && window.console.log ) {
	window.console.log("JQMIGRATE: Logging is active");
}

// Set to false to disable traces that appear with warnings
if ( jQuery.migrateTrace === undefined ) {
	jQuery.migrateTrace = true;
}

// Forget any warnings we've already given; public
jQuery.migrateReset = function() {
	warnedAbout = {};
	jQuery.migrateWarnings.length = 0;
};

function migrateWarn( msg) {
	var console = window.console;
	if ( !warnedAbout[ msg ] ) {
		warnedAbout[ msg ] = true;
		jQuery.migrateWarnings.push( msg );
		if ( console && console.warn && !jQuery.migrateMute ) {
			console.warn( "JQMIGRATE: " + msg );
			if ( jQuery.migrateTrace && console.trace ) {
				console.trace();
			}
		}
	}
}

function migrateWarnProp( obj, prop, value, msg ) {
	if ( Object.defineProperty ) {
		// On ES5 browsers (non-oldIE), warn if the code tries to get prop;
		// allow property to be overwritten in case some other plugin wants it
		try {
			Object.defineProperty( obj, prop, {
				configurable: true,
				enumerable: true,
				get: function() {
					migrateWarn( msg );
					return value;
				},
				set: function( newValue ) {
					migrateWarn( msg );
					value = newValue;
				}
			});
			return;
		} catch( err ) {
			// IE8 is a dope about Object.defineProperty, can't warn there
		}
	}

	// Non-ES5 (or broken) browser; just set the property
	jQuery._definePropertyBroken = true;
	obj[ prop ] = value;
}

if ( document.compatMode === "BackCompat" ) {
	// jQuery has never supported or tested Quirks Mode
	migrateWarn( "jQuery is not compatible with Quirks Mode" );
}


var attrFn = jQuery( "<input/>", { size: 1 } ).attr("size") && jQuery.attrFn,
	oldAttr = jQuery.attr,
	valueAttrGet = jQuery.attrHooks.value && jQuery.attrHooks.value.get ||
		function() { return null; },
	valueAttrSet = jQuery.attrHooks.value && jQuery.attrHooks.value.set ||
		function() { return undefined; },
	rnoType = /^(?:input|button)$/i,
	rnoAttrNodeType = /^[238]$/,
	rboolean = /^(?:autofocus|autoplay|async|checked|controls|defer|disabled|hidden|loop|multiple|open|readonly|required|scoped|selected)$/i,
	ruseDefault = /^(?:checked|selected)$/i;

// jQuery.attrFn
migrateWarnProp( jQuery, "attrFn", attrFn || {}, "jQuery.attrFn is deprecated" );

jQuery.attr = function( elem, name, value, pass ) {
	var lowerName = name.toLowerCase(),
		nType = elem && elem.nodeType;

	if ( pass ) {
		// Since pass is used internally, we only warn for new jQuery
		// versions where there isn't a pass arg in the formal params
		if ( oldAttr.length < 4 ) {
			migrateWarn("jQuery.fn.attr( props, pass ) is deprecated");
		}
		if ( elem && !rnoAttrNodeType.test( nType ) &&
			(attrFn ? name in attrFn : jQuery.isFunction(jQuery.fn[name])) ) {
			return jQuery( elem )[ name ]( value );
		}
	}

	// Warn if user tries to set `type`, since it breaks on IE 6/7/8; by checking
	// for disconnected elements we don't warn on $( "<button>", { type: "button" } ).
	if ( name === "type" && value !== undefined && rnoType.test( elem.nodeName ) && elem.parentNode ) {
		migrateWarn("Can't change the 'type' of an input or button in IE 6/7/8");
	}

	// Restore boolHook for boolean property/attribute synchronization
	if ( !jQuery.attrHooks[ lowerName ] && rboolean.test( lowerName ) ) {
		jQuery.attrHooks[ lowerName ] = {
			get: function( elem, name ) {
				// Align boolean attributes with corresponding properties
				// Fall back to attribute presence where some booleans are not supported
				var attrNode,
					property = jQuery.prop( elem, name );
				return property === true || typeof property !== "boolean" &&
					( attrNode = elem.getAttributeNode(name) ) && attrNode.nodeValue !== false ?

					name.toLowerCase() :
					undefined;
			},
			set: function( elem, value, name ) {
				var propName;
				if ( value === false ) {
					// Remove boolean attributes when set to false
					jQuery.removeAttr( elem, name );
				} else {
					// value is true since we know at this point it's type boolean and not false
					// Set boolean attributes to the same name and set the DOM property
					propName = jQuery.propFix[ name ] || name;
					if ( propName in elem ) {
						// Only set the IDL specifically if it already exists on the element
						elem[ propName ] = true;
					}

					elem.setAttribute( name, name.toLowerCase() );
				}
				return name;
			}
		};

		// Warn only for attributes that can remain distinct from their properties post-1.9
		if ( ruseDefault.test( lowerName ) ) {
			migrateWarn( "jQuery.fn.attr('" + lowerName + "') may use property instead of attribute" );
		}
	}

	return oldAttr.call( jQuery, elem, name, value );
};

// attrHooks: value
jQuery.attrHooks.value = {
	get: function( elem, name ) {
		var nodeName = ( elem.nodeName || "" ).toLowerCase();
		if ( nodeName === "button" ) {
			return valueAttrGet.apply( this, arguments );
		}
		if ( nodeName !== "input" && nodeName !== "option" ) {
			migrateWarn("jQuery.fn.attr('value') no longer gets properties");
		}
		return name in elem ?
			elem.value :
			null;
	},
	set: function( elem, value ) {
		var nodeName = ( elem.nodeName || "" ).toLowerCase();
		if ( nodeName === "button" ) {
			return valueAttrSet.apply( this, arguments );
		}
		if ( nodeName !== "input" && nodeName !== "option" ) {
			migrateWarn("jQuery.fn.attr('value', val) no longer sets properties");
		}
		// Does not return so that setAttribute is also used
		elem.value = value;
	}
};


var matched, browser,
	oldInit = jQuery.fn.init,
	oldParseJSON = jQuery.parseJSON,
	// Note: XSS check is done below after string is trimmed
	rquickExpr = /^([^<]*)(<[\w\W]+>)([^>]*)$/;

// $(html) "looks like html" rule change
jQuery.fn.init = function( selector, context, rootjQuery ) {
	var match;

	if ( selector && typeof selector === "string" && !jQuery.isPlainObject( context ) &&
			(match = rquickExpr.exec( jQuery.trim( selector ) )) && match[ 0 ] ) {
		// This is an HTML string according to the "old" rules; is it still?
		if ( selector.charAt( 0 ) !== "<" ) {
			migrateWarn("$(html) HTML strings must start with '<' character");
		}
		if ( match[ 3 ] ) {
			migrateWarn("$(html) HTML text after last tag is ignored");
		}
		// Consistently reject any HTML-like string starting with a hash (#9521)
		// Note that this may break jQuery 1.6.x code that otherwise would work.
		if ( match[ 0 ].charAt( 0 ) === "#" ) {
			migrateWarn("HTML string cannot start with a '#' character");
			jQuery.error("JQMIGRATE: Invalid selector string (XSS)");
		}
		// Now process using loose rules; let pre-1.8 play too
		if ( context && context.context ) {
			// jQuery object as context; parseHTML expects a DOM object
			context = context.context;
		}
		if ( jQuery.parseHTML ) {
			return oldInit.call( this, jQuery.parseHTML( match[ 2 ], context, true ),
					context, rootjQuery );
		}
	}
	return oldInit.apply( this, arguments );
};
jQuery.fn.init.prototype = jQuery.fn;

// Let $.parseJSON(falsy_value) return null
jQuery.parseJSON = function( json ) {
	if ( !json && json !== null ) {
		migrateWarn("jQuery.parseJSON requires a valid JSON string");
		return null;
	}
	return oldParseJSON.apply( this, arguments );
};

jQuery.uaMatch = function( ua ) {
	ua = ua.toLowerCase();

	var match = /(chrome)[ \/]([\w.]+)/.exec( ua ) ||
		/(webkit)[ \/]([\w.]+)/.exec( ua ) ||
		/(opera)(?:.*version|)[ \/]([\w.]+)/.exec( ua ) ||
		/(msie) ([\w.]+)/.exec( ua ) ||
		ua.indexOf("compatible") < 0 && /(mozilla)(?:.*? rv:([\w.]+)|)/.exec( ua ) ||
		[];

	return {
		browser: match[ 1 ] || "",
		version: match[ 2 ] || "0"
	};
};

// Don't clobber any existing jQuery.browser in case it's different
if ( !jQuery.browser ) {
	matched = jQuery.uaMatch( navigator.userAgent );
	browser = {};

	if ( matched.browser ) {
		browser[ matched.browser ] = true;
		browser.version = matched.version;
	}

	// Chrome is Webkit, but Webkit is also Safari.
	if ( browser.chrome ) {
		browser.webkit = true;
	} else if ( browser.webkit ) {
		browser.safari = true;
	}

	jQuery.browser = browser;
}

// Warn if the code tries to get jQuery.browser
migrateWarnProp( jQuery, "browser", jQuery.browser, "jQuery.browser is deprecated" );

jQuery.sub = function() {
	function jQuerySub( selector, context ) {
		return new jQuerySub.fn.init( selector, context );
	}
	jQuery.extend( true, jQuerySub, this );
	jQuerySub.superclass = this;
	jQuerySub.fn = jQuerySub.prototype = this();
	jQuerySub.fn.constructor = jQuerySub;
	jQuerySub.sub = this.sub;
	jQuerySub.fn.init = function init( selector, context ) {
		if ( context && context instanceof jQuery && !(context instanceof jQuerySub) ) {
			context = jQuerySub( context );
		}

		return jQuery.fn.init.call( this, selector, context, rootjQuerySub );
	};
	jQuerySub.fn.init.prototype = jQuerySub.fn;
	var rootjQuerySub = jQuerySub(document);
	migrateWarn( "jQuery.sub() is deprecated" );
	return jQuerySub;
};


// Ensure that $.ajax gets the new parseJSON defined in core.js
jQuery.ajaxSetup({
	converters: {
		"text json": jQuery.parseJSON
	}
});


var oldFnData = jQuery.fn.data;

jQuery.fn.data = function( name ) {
	var ret, evt,
		elem = this[0];

	// Handles 1.7 which has this behavior and 1.8 which doesn't
	if ( elem && name === "events" && arguments.length === 1 ) {
		ret = jQuery.data( elem, name );
		evt = jQuery._data( elem, name );
		if ( ( ret === undefined || ret === evt ) && evt !== undefined ) {
			migrateWarn("Use of jQuery.fn.data('events') is deprecated");
			return evt;
		}
	}
	return oldFnData.apply( this, arguments );
};


var rscriptType = /\/(java|ecma)script/i,
	oldSelf = jQuery.fn.andSelf || jQuery.fn.addBack;

jQuery.fn.andSelf = function() {
	migrateWarn("jQuery.fn.andSelf() replaced by jQuery.fn.addBack()");
	return oldSelf.apply( this, arguments );
};

// Since jQuery.clean is used internally on older versions, we only shim if it's missing
if ( !jQuery.clean ) {
	jQuery.clean = function( elems, context, fragment, scripts ) {
		// Set context per 1.8 logic
		context = context || document;
		context = !context.nodeType && context[0] || context;
		context = context.ownerDocument || context;

		migrateWarn("jQuery.clean() is deprecated");

		var i, elem, handleScript, jsTags,
			ret = [];

		jQuery.merge( ret, jQuery.buildFragment( elems, context ).childNodes );

		// Complex logic lifted directly from jQuery 1.8
		if ( fragment ) {
			// Special handling of each script element
			handleScript = function( elem ) {
				// Check if we consider it executable
				if ( !elem.type || rscriptType.test( elem.type ) ) {
					// Detach the script and store it in the scripts array (if provided) or the fragment
					// Return truthy to indicate that it has been handled
					return scripts ?
						scripts.push( elem.parentNode ? elem.parentNode.removeChild( elem ) : elem ) :
						fragment.appendChild( elem );
				}
			};

			for ( i = 0; (elem = ret[i]) != null; i++ ) {
				// Check if we're done after handling an executable script
				if ( !( jQuery.nodeName( elem, "script" ) && handleScript( elem ) ) ) {
					// Append to fragment and handle embedded scripts
					fragment.appendChild( elem );
					if ( typeof elem.getElementsByTagName !== "undefined" ) {
						// handleScript alters the DOM, so use jQuery.merge to ensure snapshot iteration
						jsTags = jQuery.grep( jQuery.merge( [], elem.getElementsByTagName("script") ), handleScript );

						// Splice the scripts into ret after their former ancestor and advance our index beyond them
						ret.splice.apply( ret, [i + 1, 0].concat( jsTags ) );
						i += jsTags.length;
					}
				}
			}
		}

		return ret;
	};
}

var eventAdd = jQuery.event.add,
	eventRemove = jQuery.event.remove,
	eventTrigger = jQuery.event.trigger,
	oldToggle = jQuery.fn.toggle,
	oldLive = jQuery.fn.live,
	oldDie = jQuery.fn.die,
	ajaxEvents = "ajaxStart|ajaxStop|ajaxSend|ajaxComplete|ajaxError|ajaxSuccess",
	rajaxEvent = new RegExp( "\\b(?:" + ajaxEvents + ")\\b" ),
	rhoverHack = /(?:^|\s)hover(\.\S+|)\b/,
	hoverHack = function( events ) {
		if ( typeof( events ) !== "string" || jQuery.event.special.hover ) {
			return events;
		}
		if ( rhoverHack.test( events ) ) {
			migrateWarn("'hover' pseudo-event is deprecated, use 'mouseenter mouseleave'");
		}
		return events && events.replace( rhoverHack, "mouseenter$1 mouseleave$1" );
	};

// Event props removed in 1.9, put them back if needed; no practical way to warn them
if ( jQuery.event.props && jQuery.event.props[ 0 ] !== "attrChange" ) {
	jQuery.event.props.unshift( "attrChange", "attrName", "relatedNode", "srcElement" );
}

// Undocumented jQuery.event.handle was "deprecated" in jQuery 1.7
if ( jQuery.event.dispatch ) {
	migrateWarnProp( jQuery.event, "handle", jQuery.event.dispatch, "jQuery.event.handle is undocumented and deprecated" );
}

// Support for 'hover' pseudo-event and ajax event warnings
jQuery.event.add = function( elem, types, handler, data, selector ){
	if ( elem !== document && rajaxEvent.test( types ) ) {
		migrateWarn( "AJAX events should be attached to document: " + types );
	}
	eventAdd.call( this, elem, hoverHack( types || "" ), handler, data, selector );
};
jQuery.event.remove = function( elem, types, handler, selector, mappedTypes ){
	eventRemove.call( this, elem, hoverHack( types ) || "", handler, selector, mappedTypes );
};

jQuery.fn.error = function() {
	var args = Array.prototype.slice.call( arguments, 0);
	migrateWarn("jQuery.fn.error() is deprecated");
	args.splice( 0, 0, "error" );
	if ( arguments.length ) {
		return this.bind.apply( this, args );
	}
	// error event should not bubble to window, although it does pre-1.7
	this.triggerHandler.apply( this, args );
	return this;
};

jQuery.fn.toggle = function( fn, fn2 ) {

	// Don't mess with animation or css toggles
	if ( !jQuery.isFunction( fn ) || !jQuery.isFunction( fn2 ) ) {
		return oldToggle.apply( this, arguments );
	}
	migrateWarn("jQuery.fn.toggle(handler, handler...) is deprecated");

	// Save reference to arguments for access in closure
	var args = arguments,
		guid = fn.guid || jQuery.guid++,
		i = 0,
		toggler = function( event ) {
			// Figure out which function to execute
			var lastToggle = ( jQuery._data( this, "lastToggle" + fn.guid ) || 0 ) % i;
			jQuery._data( this, "lastToggle" + fn.guid, lastToggle + 1 );

			// Make sure that clicks stop
			event.preventDefault();

			// and execute the function
			return args[ lastToggle ].apply( this, arguments ) || false;
		};

	// link all the functions, so any of them can unbind this click handler
	toggler.guid = guid;
	while ( i < args.length ) {
		args[ i++ ].guid = guid;
	}

	return this.click( toggler );
};

jQuery.fn.live = function( types, data, fn ) {
	migrateWarn("jQuery.fn.live() is deprecated");
	if ( oldLive ) {
		return oldLive.apply( this, arguments );
	}
	jQuery( this.context ).on( types, this.selector, data, fn );
	return this;
};

jQuery.fn.die = function( types, fn ) {
	migrateWarn("jQuery.fn.die() is deprecated");
	if ( oldDie ) {
		return oldDie.apply( this, arguments );
	}
	jQuery( this.context ).off( types, this.selector || "**", fn );
	return this;
};

// Turn global events into document-triggered events
jQuery.event.trigger = function( event, data, elem, onlyHandlers  ){
	if ( !elem && !rajaxEvent.test( event ) ) {
		migrateWarn( "Global events are undocumented and deprecated" );
	}
	return eventTrigger.call( this,  event, data, elem || document, onlyHandlers  );
};
jQuery.each( ajaxEvents.split("|"),
	function( _, name ) {
		jQuery.event.special[ name ] = {
			setup: function() {
				var elem = this;

				// The document needs no shimming; must be !== for oldIE
				if ( elem !== document ) {
					jQuery.event.add( document, name + "." + jQuery.guid, function() {
						jQuery.event.trigger( name, null, elem, true );
					});
					jQuery._data( this, name, jQuery.guid++ );
				}
				return false;
			},
			teardown: function() {
				if ( this !== document ) {
					jQuery.event.remove( document, name + "." + jQuery._data( this, name ) );
				}
				return false;
			}
		};
	}
);


})( jQuery, window );
/* jshint forin:true, noarg:true, noempty:true, eqeqeq:true, boss:true, undef:true, curly:true, browser:true, jquery:true */
/*
 * jQuery MultiSelect UI Widget 1.14pre
 * Copyright (c) 2012 Eric Hynds
 *
 * http://www.erichynds.com/jquery/jquery-ui-multiselect-widget/
 *
 * Depends:
 *   - jQuery 1.4.2+
 *   - jQuery UI 1.8 widget factory
 *
 * Optional:
 *   - jQuery UI effects
 *   - jQuery UI position utility
 *
 * Dual licensed under the MIT and GPL licenses:
 *   http://www.opensource.org/licenses/mit-license.php
 *   http://www.gnu.org/licenses/gpl.html
 *
 */
(function($, undefined) {

  var multiselectID = 0;
  var $doc = $(document);

  $.widget("ech.multiselect", {

    // default options
    options: {
      header: true,
      height: 175,
      minWidth: 225,
      classes: '',
      checkAllText: 'Check all',
      uncheckAllText: 'Uncheck all',
      noneSelectedText: 'Select options',
      selectedText: '# selected',
      selectedList: 0,
      show: null,
      hide: null,
      autoOpen: false,
      multiple: true,
      position: {}
    },

    _create: function() {
      var el = this.element.hide();
      var o = this.options;

      this.speed = $.fx.speeds._default; // default speed for effects
      this._isOpen = false; // assume no

      // create a unique namespace for events that the widget
      // factory cannot unbind automatically. Use eventNamespace if on
      // jQuery UI 1.9+, and otherwise fallback to a custom string.
      this._namespaceID = this.eventNamespace || ('multiselect' + multiselectID);

      var button = (this.button = $('<button type="button"><span class="ui-icon ui-icon-triangle-1-s"></span></button>'))
        .addClass('ui-multiselect ui-widget ui-state-default ui-corner-all')
        .addClass(o.classes)
        .attr({ 'title':el.attr('title'), 'aria-haspopup':true, 'tabIndex':el.attr('tabIndex') })
        .insertAfter(el),

        buttonlabel = (this.buttonlabel = $('<span />'))
          .html(o.noneSelectedText)
          .appendTo(button),

        menu = (this.menu = $('<div />'))
          .addClass('ui-multiselect-menu ui-widget ui-widget-content ui-corner-all')
          .addClass(o.classes)
          .appendTo(document.body),

        header = (this.header = $('<div />'))
          .addClass('ui-widget-header ui-corner-all ui-multiselect-header ui-helper-clearfix')
          .appendTo(menu),

        headerLinkContainer = (this.headerLinkContainer = $('<ul />'))
          .addClass('ui-helper-reset')
          .html(function() {
            if(o.header === true) {
              return '<li><a class="ui-multiselect-all" href="#"><span class="ui-icon ui-icon-check"></span><span>' + o.checkAllText + '</span></a></li><li><a class="ui-multiselect-none" href="#"><span class="ui-icon ui-icon-closethick"></span><span>' + o.uncheckAllText + '</span></a></li>';
            } else if(typeof o.header === "string") {
              return '<li>' + o.header + '</li>';
            } else {
              return '';
            }
          })
          .append('<li class="ui-multiselect-close"><a href="#" class="ui-multiselect-close"><span class="ui-icon ui-icon-circle-close"></span></a></li>')
          .appendTo(header),

        checkboxContainer = (this.checkboxContainer = $('<ul />'))
          .addClass('ui-multiselect-checkboxes ui-helper-reset')
          .appendTo(menu);

        // perform event bindings
        this._bindEvents();

        // build menu
        this.refresh(true);

        // some addl. logic for single selects
        if(!o.multiple) {
          menu.addClass('ui-multiselect-single');
        }

        // bump unique ID
        multiselectID++;
    },

    _init: function() {
      if(this.options.header === false) {
        this.header.hide();
      }
      if(!this.options.multiple) {
        this.headerLinkContainer.find('.ui-multiselect-all, .ui-multiselect-none').hide();
      }
      if(this.options.autoOpen) {
        this.open();
      }
      if(this.element.is(':disabled')) {
        this.disable();
      }
    },

    refresh: function(init) {
      var el = this.element;
      var o = this.options;
      var menu = this.menu;
      var checkboxContainer = this.checkboxContainer;
      var optgroups = [];
      var html = "";
      var id = el.attr('id') || multiselectID++; // unique ID for the label & option tags

      // build items
      el.find('option').each(function(i) {
        var $this = $(this);
        var parent = this.parentNode;
        var title = this.innerHTML;
        var description = this.title;
        var value = this.value;
        var inputID = 'ui-multiselect-' + (this.id || id + '-option-' + i);
        var isDisabled = this.disabled;
        var isSelected = this.selected;
        var labelClasses = [ 'ui-corner-all' ];
        var liClasses = (isDisabled ? 'ui-multiselect-disabled ' : ' ') + this.className;
        var optLabel;

        // is this an optgroup?
        if(parent.tagName === 'OPTGROUP') {
          optLabel = parent.getAttribute('label');

          // has this optgroup been added already?
          if($.inArray(optLabel, optgroups) === -1) {
            html += '<li class="ui-multiselect-optgroup-label ' + parent.className + '"><a href="#">' + optLabel + '</a></li>';
            optgroups.push(optLabel);
          }
        }

        if(isDisabled) {
          labelClasses.push('ui-state-disabled');
        }

        // browsers automatically select the first option
        // by default with single selects
        if(isSelected && !o.multiple) {
          labelClasses.push('ui-state-active');
        }

        html += '<li class="' + liClasses + '">';

        // create the label
        html += '<label for="' + inputID + '" title="' + description + '" class="' + labelClasses.join(' ') + '">';
        html += '<input id="' + inputID + '" name="multiselect_' + id + '" type="' + (o.multiple ? "checkbox" : "radio") + '" value="' + value + '" title="' + title + '"';

        // pre-selected?
        if(isSelected) {
          html += ' checked="checked"';
          html += ' aria-selected="true"';
        }

        // disabled?
        if(isDisabled) {
          html += ' disabled="disabled"';
          html += ' aria-disabled="true"';
        }

        // add the title and close everything off
        html += ' /><span>' + title + '</span></label></li>';
      });

      // insert into the DOM
      checkboxContainer.html(html);

      // cache some moar useful elements
      this.labels = menu.find('label');
      this.inputs = this.labels.children('input');

      // set widths
      this._setButtonWidth();
      this._setMenuWidth();

      // remember default value
      this.button[0].defaultValue = this.update();

      // broadcast refresh event; useful for widgets
      if(!init) {
        this._trigger('refresh');
      }
    },

    // updates the button text. call refresh() to rebuild
    update: function() {
      var o = this.options;
      var $inputs = this.inputs;
      var $checked = $inputs.filter(':checked');
      var numChecked = $checked.length;
      var value;

      if(numChecked === 0) {
        value = o.noneSelectedText;
      } else {
        if($.isFunction(o.selectedText)) {
          value = o.selectedText.call(this, numChecked, $inputs.length, $checked.get());
        } else if(/\d/.test(o.selectedList) && o.selectedList > 0 && numChecked <= o.selectedList) {
          value = $checked.map(function() { return $(this).next().html(); }).get().join(', ');
        } else {
          value = o.selectedText.replace('#', numChecked).replace('#', $inputs.length);
        }
      }

      this._setButtonValue(value);

      return value;
    },

    // this exists as a separate method so that the developer 
    // can easily override it.
    _setButtonValue: function(value) {
      this.buttonlabel.text(value);
    },

    // binds events
    _bindEvents: function() {
      var self = this;
      var button = this.button;

      function clickHandler() {
        self[ self._isOpen ? 'close' : 'open' ]();
        return false;
      }

      // webkit doesn't like it when you click on the span :(
      button
        .find('span')
        .bind('click.multiselect', clickHandler);

      // button events
      button.bind({
        click: clickHandler,
        keypress: function(e) {
          switch(e.which) {
            case 27: // esc
              case 38: // up
              case 37: // left
              self.close();
            break;
            case 39: // right
              case 40: // down
              self.open();
            break;
          }
        },
        mouseenter: function() {
          if(!button.hasClass('ui-state-disabled')) {
            $(this).addClass('ui-state-hover');
          }
        },
        mouseleave: function() {
          $(this).removeClass('ui-state-hover');
        },
        focus: function() {
          if(!button.hasClass('ui-state-disabled')) {
            $(this).addClass('ui-state-focus');
          }
        },
        blur: function() {
          $(this).removeClass('ui-state-focus');
        }
      });

      // header links
      this.header.delegate('a', 'click.multiselect', function(e) {
        // close link
        if($(this).hasClass('ui-multiselect-close')) {
          self.close();

          // check all / uncheck all
        } else {
          self[$(this).hasClass('ui-multiselect-all') ? 'checkAll' : 'uncheckAll']();
        }

        e.preventDefault();
      });

      // optgroup label toggle support
      this.menu.delegate('li.ui-multiselect-optgroup-label a', 'click.multiselect', function(e) {
        e.preventDefault();

        var $this = $(this);
        var $inputs = $this.parent().nextUntil('li.ui-multiselect-optgroup-label').find('input:visible:not(:disabled)');
        var nodes = $inputs.get();
        var label = $this.parent().text();

        // trigger event and bail if the return is false
        if(self._trigger('beforeoptgrouptoggle', e, { inputs:nodes, label:label }) === false) {
          return;
        }

        // toggle inputs
        self._toggleChecked(
          $inputs.filter(':checked').length !== $inputs.length,
          $inputs
        );

        self._trigger('optgrouptoggle', e, {
          inputs: nodes,
          label: label,
          checked: nodes[0].checked
        });
      })
      .delegate('label', 'mouseenter.multiselect', function() {
        if(!$(this).hasClass('ui-state-disabled')) {
          self.labels.removeClass('ui-state-hover');
          $(this).addClass('ui-state-hover').find('input').focus();
        }
      })
      .delegate('label', 'keydown.multiselect', function(e) {
        e.preventDefault();

        switch(e.which) {
          case 9: // tab
            case 27: // esc
            self.close();
          break;
          case 38: // up
            case 40: // down
            case 37: // left
            case 39: // right
            self._traverse(e.which, this);
          break;
          case 13: // enter
            $(this).find('input')[0].click();
          break;
        }
      })
      .delegate('input[type="checkbox"], input[type="radio"]', 'click.multiselect', function(e) {
        var $this = $(this);
        var val = this.value;
        var checked = this.checked;
        var tags = self.element.find('option');

        // bail if this input is disabled or the event is cancelled
        if(this.disabled || self._trigger('click', e, { value: val, text: this.title, checked: checked }) === false) {
          e.preventDefault();
          return;
        }

        // make sure the input has focus. otherwise, the esc key
        // won't close the menu after clicking an item.
        $this.focus();

        // toggle aria state
        $this.attr('aria-selected', checked);

        // change state on the original option tags
        tags.each(function() {
          if(this.value === val) {
            this.selected = checked;
          } else if(!self.options.multiple) {
            this.selected = false;
          }
        });

        // some additional single select-specific logic
        if(!self.options.multiple) {
          self.labels.removeClass('ui-state-active');
          $this.closest('label').toggleClass('ui-state-active', checked);

          // close menu
          self.close();
        }

        // fire change on the select box
        self.element.trigger("change");

        // setTimeout is to fix multiselect issue #14 and #47. caused by jQuery issue #3827
        // http://bugs.jquery.com/ticket/3827
        setTimeout($.proxy(self.update, self), 10);
      });

      // close each widget when clicking on any other element/anywhere else on the page
      $doc.bind('mousedown.' + this._namespaceID, function(event) {
        var target = event.target;

        if(self._isOpen
            && !$.contains(self.menu[0], target)
            && !$.contains(self.button[0], target)
            && target !== self.button[0]
            && target !== self.menu[0])
        {
          self.close();
        }
      });

      // deal with form resets.  the problem here is that buttons aren't
      // restored to their defaultValue prop on form reset, and the reset
      // handler fires before the form is actually reset.  delaying it a bit
      // gives the form inputs time to clear.
      $(this.element[0].form).bind('reset.multiselect', function() {
        setTimeout($.proxy(self.refresh, self), 10);
      });
    },

    // set button width
    _setButtonWidth: function() {
      var width = this.element.outerWidth();
      var o = this.options;

      if(/\d/.test(o.minWidth) && width < o.minWidth) {
        width = o.minWidth;
      }

      // set widths
      this.button.outerWidth(width);
    },

    // set menu width
    _setMenuWidth: function() {
      var m = this.menu;
      m.outerWidth(this.button.outerWidth());
    },

    // move up or down within the menu
    _traverse: function(which, start) {
      var $start = $(start);
      var moveToLast = which === 38 || which === 37;

      // select the first li that isn't an optgroup label / disabled
      $next = $start.parent()[moveToLast ? 'prevAll' : 'nextAll']('li:not(.ui-multiselect-disabled, .ui-multiselect-optgroup-label)')[ moveToLast ? 'last' : 'first']();

      // if at the first/last element
      if(!$next.length) {
        var $container = this.menu.find('ul').last();

        // move to the first/last
        this.menu.find('label')[ moveToLast ? 'last' : 'first' ]().trigger('mouseover');

        // set scroll position
        $container.scrollTop(moveToLast ? $container.height() : 0);

      } else {
        $next.find('label').trigger('mouseover');
      }
    },

    // This is an internal function to toggle the checked property and
    // other related attributes of a checkbox.
    //
    // The context of this function should be a checkbox; do not proxy it.
    _toggleState: function(prop, flag) {
      return function() {
        if(!this.disabled) {
          this[ prop ] = flag;
        }

        if(flag) {
          this.setAttribute('aria-selected', true);
        } else {
          this.removeAttribute('aria-selected');
        }
      };
    },

    _toggleChecked: function(flag, group) {
      var $inputs = (group && group.length) ?  group : this.inputs;
      var self = this;

      // toggle state on inputs
      $inputs.each(this._toggleState('checked', flag));

      // give the first input focus
      $inputs.eq(0).focus();

      // update button text
      this.update();

      // gather an array of the values that actually changed
      var values = $inputs.map(function() {
        return this.value;
      }).get();

      // toggle state on original option tags
      this.element
        .find('option')
        .each(function() {
          if(!this.disabled && $.inArray(this.value, values) > -1) {
            self._toggleState('selected', flag).call(this);
          }
        });

      // trigger the change event on the select
      if($inputs.length) {
        this.element.trigger("change");
      }
    },

    _toggleDisabled: function(flag) {
      this.button.attr({ 'disabled':flag, 'aria-disabled':flag })[ flag ? 'addClass' : 'removeClass' ]('ui-state-disabled');

      var inputs = this.menu.find('input');
      var key = "ech-multiselect-disabled";

      if(flag) {
        // remember which elements this widget disabled (not pre-disabled)
        // elements, so that they can be restored if the widget is re-enabled.
        inputs = inputs.filter(':enabled').data(key, true)
      } else {
        inputs = inputs.filter(function() {
          return $.data(this, key) === true;
        }).removeData(key);
      }

      inputs
        .attr({ 'disabled':flag, 'arial-disabled':flag })
        .parent()[ flag ? 'addClass' : 'removeClass' ]('ui-state-disabled');

      this.element.attr({
        'disabled':flag,
        'aria-disabled':flag
      });
    },

    // open the menu
    open: function(e) {
      var self = this;
      var button = this.button;
      var menu = this.menu;
      var speed = this.speed;
      var o = this.options;
      var args = [];

      // bail if the multiselectopen event returns false, this widget is disabled, or is already open
      if(this._trigger('beforeopen') === false || button.hasClass('ui-state-disabled') || this._isOpen) {
        return;
      }

      var $container = menu.find('ul').last();
      var effect = o.show;

      // figure out opening effects/speeds
      if($.isArray(o.show)) {
        effect = o.show[0];
        speed = o.show[1] || self.speed;
      }

      // if there's an effect, assume jQuery UI is in use
      // build the arguments to pass to show()
      if(effect) {
        args = [ effect, speed ];
      }

      // set the scroll of the checkbox container
      $container.scrollTop(0).height(o.height);

      // positon
      this.position();

      // show the menu, maybe with a speed/effect combo
      $.fn.show.apply(menu, args);

      // select the first not disabled option
      // triggering both mouseover and mouseover because 1.4.2+ has a bug where triggering mouseover
      // will actually trigger mouseenter.  the mouseenter trigger is there for when it's eventually fixed
      this.labels.filter(':not(.ui-state-disabled)').eq(0).trigger('mouseover').trigger('mouseenter').find('input').trigger('focus');

      button.addClass('ui-state-active');
      this._isOpen = true;
      this._trigger('open');
    },

    // close the menu
    close: function() {
      if(this._trigger('beforeclose') === false) {
        return;
      }

      var o = this.options;
      var effect = o.hide;
      var speed = this.speed;
      var args = [];

      // figure out opening effects/speeds
      if($.isArray(o.hide)) {
        effect = o.hide[0];
        speed = o.hide[1] || this.speed;
      }

      if(effect) {
        args = [ effect, speed ];
      }

      $.fn.hide.apply(this.menu, args);
      this.button.removeClass('ui-state-active').trigger('blur').trigger('mouseleave');
      this._isOpen = false;
      this._trigger('close');
    },

    enable: function() {
      this._toggleDisabled(false);
    },

    disable: function() {
      this._toggleDisabled(true);
    },

    checkAll: function(e) {
      this._toggleChecked(true);
      this._trigger('checkAll');
    },

    uncheckAll: function() {
      this._toggleChecked(false);
      this._trigger('uncheckAll');
    },

    getChecked: function() {
      return this.menu.find('input').filter(':checked');
    },

    destroy: function() {
      // remove classes + data
      $.Widget.prototype.destroy.call(this);

      // unbind events
      $doc.unbind(this._namespaceID);

      this.button.remove();
      this.menu.remove();
      this.element.show();

      return this;
    },

    isOpen: function() {
      return this._isOpen;
    },

    widget: function() {
      return this.menu;
    },

    getButton: function() {
      return this.button;
    },

    position: function() {
      var o = this.options;

      // use the position utility if it exists and options are specifified
      if($.ui.position && !$.isEmptyObject(o.position)) {
        o.position.of = o.position.of || this.button;

        this.menu
          .show()
          .position(o.position)
          .hide();

        // otherwise fallback to custom positioning
      } else {
        var pos = this.button.offset();

        this.menu.css({
          top: pos.top + this.button.outerHeight(),
          left: pos.left
        });
      }
    },

    // react to option changes after initialization
    _setOption: function(key, value) {
      var menu = this.menu;

      switch(key) {
        case 'header':
          menu.find('div.ui-multiselect-header')[value ? 'show' : 'hide']();
          break;
        case 'checkAllText':
          menu.find('a.ui-multiselect-all span').eq(-1).text(value);
          break;
        case 'uncheckAllText':
          menu.find('a.ui-multiselect-none span').eq(-1).text(value);
          break;
        case 'height':
          menu.find('ul').last().height(parseInt(value, 10));
          break;
        case 'minWidth':
          this.options[key] = parseInt(value, 10);
          this._setButtonWidth();
          this._setMenuWidth();
          break;
        case 'selectedText':
        case 'selectedList':
        case 'noneSelectedText':
          this.options[key] = value; // these all needs to update immediately for the update() call
          this.update();
          break;
        case 'classes':
          menu.add(this.button).removeClass(this.options.classes).addClass(value);
          break;
        case 'multiple':
          menu.toggleClass('ui-multiselect-single', !value);
          this.options.multiple = value;
          this.element[0].multiple = value;
          this.refresh();
          break;
        case 'position':
          this.position();
      }

      $.Widget.prototype._setOption.apply(this, arguments);
    }
  });

})(jQuery);

//Load datatables settings

/**
 * End of datatables settings
 */

/**
 *Change password validation
 */
$(document).ready(function() {
	  
	
	
	
	var base_url = $("#base_url").val();
	$('.dataTables').dataTable({
		"bJQueryUI" : true,
		"sPaginationType" : "full_numbers",
		"sDom" : '<"H"Tfr>t<"F"ip>',
		"oTableTools" : {
			"sSwfPath" : base_url + "scripts/datatable/copy_csv_xls_pdf.swf",
			"aButtons" : ["copy", "print", "xls", "pdf"]
		},
		"bProcessing" : true,
		"bServerSide" : false,
	});
	//syncOrders("13050");
	/*
	 * Reports generation
	 */

	$(".generate_btn").live('click', function() {

		var base_url = $("#base_url").val();
		if($(".input-medium").is(":visible") || $(".report_type").is(":visible") || $(".report_type_1").is(":visible") || $(".input_year").is(":visible") || $(".input_dates").is(":visible") || $(".donor_input_dates_from").is(":visible") || $(".input_dates_from").is(":visible") || $(".donor_input_dates_to").is(":visible") || $(".input_dates_to").is(":visible")) {

			if($(".input_year").is(":visible") && $(".input_year").val() == "") {
				alert("Please enter the year");
				return;
			}
			//Dates not selected
			if($(".input_dates").is(":visible") && $(".input_dates").val() == "") {
				alert("Please select the date");
			}
			//Dates not selected
			else if($(".input_dates_from").is(":visible") && $(".input_dates_from").val() == "") {
				alert("Please select the starting date");
			}
			//Dates not selected
			else if($(".donor_input_dates_from").is(":visible") && $(".donor_input_dates_from").val() == "") {
				alert("Please select the starting date");
			}
			//Dates not selected
			else if($(".input_dates_to").is(":visible") && $(".input_dates_to").val() == "") {
				alert("Please select the end date");
			}
			//Dates not selected
			else if($(".donor_input_dates_to").is(":visible") && $(".donor_input_dates_to").val() == "") {
				alert("Please select the end date");
			}

			//Dropdown not chosen
			else if($("#commodity_summary_report_type").is(":visible") && $("#commodity_summary_report_type").val() == 0) {
				alert("Please select the report type");
			} else if($("#commodity_summary_report_type_1").is(":visible") && $("#commodity_summary_report_type_1").val() == 0) {
				alert("Please select the report type");
			}
			//If everything is ok,generatea report
			else {

				var id = $(this).attr("id");
				if(id == "generate_date_range_report") {

					var report = $(".select_report:visible").attr("value");
					var from = $("#date_range_from").attr("value");
					var to = $("#date_range_to").attr("value");
					if($(".report_type").is(":visible")) {
						report = report + "/" + $(".report_type:visible").attr("value");
					}

					var report_url = base_url + "report_management/" + report + "/" + from + "/" + to;
					window.location = report_url;
				} else if(id == "generate_single_date_report") {
					var report = $(".select_report:visible").attr("value");
					var selected_date = $("#single_date_filter").attr("value");
					var report_url = base_url + "report_management/" + report + "/" + selected_date;
					window.location = report_url;
				} else if(id == "generate_single_year_report") {
					var report = $(".select_report:visible").attr("value");
					var selected_year = $("#single_year_filter").attr("value");
					var report_url = base_url + "report_management/" + report + "/" + selected_year;
					window.location = report_url;
				} else if(id == "generate_no_filter_report") {
					var report = $(".select_report:visible").attr("value");
					var stock_type = "";
					if($("#commodity_summary_report_type_1")) {
						stock_type = $("#commodity_summary_report_type_1").attr("value");
					}
					var report_url = base_url + "report_management/" + report + "/" + stock_type;
					window.location = report_url;
				} else if(id == "donor_generate_date_range_report") {
					var report = $(".select_report:visible").attr("value");
					var from = $("#donor_date_range_from").attr("value");
					var to = $("#donor_date_range_to").attr("value");
					var donor = $("#donor").attr("value");
					var report_url = base_url + "report_management/" + report + "/" + from + "/" + to + "/" + donor;
					window.location = report_url;
				}
			}
		}

	})
	/*
	 * Reports generation end
	 */
	var base_url = $("#base_url").val();
	$("#change_password_link").click(function() {
		$("#old_password").attr("value", "");
		$("#new_password").attr("value", "");
		$("#new_password_confirm").attr("value", "");
		$(".error").html("");
		$(".error").css("display", "none");
		$("#result").html("");
	});

	$(".error").css("display", "none");
	$('#new_password').keyup(function() {
		$('#result').html(checkStrength($('#new_password').val()))
	})
	function checkStrength(password) {

		//initial strength
		var strength = 0

		//if the password length is less than 6, return message.
		if(password.length < 6) {
			$('#result').removeClass()
			$('#result').addClass('short')
			return 'Too short'
		}

		//length is ok, lets continue.

		//if length is 8 characters or more, increase strength value
		if(password.length > 7)
			strength += 1
		if(password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/))
			strength += 1
		if(password.match(/([a-zA-Z])/) && password.match(/([0-9])/))
			strength += 1
		if(password.match(/([!,%,&,@,#,$,^,*,?,_,~])/))
			strength += 1
		if(password.match(/(.*[!,%,&,@,#,$,^,*,?,_,~].*[!,",%,&,@,#,$,^,*,?,_,~])/))
			strength += 1
		if(strength < 2) {
			$('#result').removeClass()
			$('#result').addClass('weak')
			return 'Weak'
		} else if(strength == 2) {
			$('#result').removeClass()
			$('#result').addClass('good')
			return 'Good'
		} else {
			$('#result').removeClass()
			$('#result').addClass('strong')
			return 'Strong'
		}
	}


	$("#btn_submit_change_pass").click(function(event) {
		var base_url = $("#base_url").val();
		$(".error").css("display", "none");
		$('#result_confirm').html("");
		event.preventDefault();
		var old_password = $("#old_password").attr("value");
		var new_password = $("#new_password").attr("value");
		var new_password_confirm = $("#new_password_confirm").attr("value");

		if(new_password == "" || new_password_confirm == "" || old_password == "") {
			$(".error").css("display", "block");
			$("#error_msg_change_pass").html("All fields are required !");
		} else if($('#new_password').val().length < 6) {
			$(".error").css("display", "block");
			$("#error_msg_change_pass").html("Your password must have more than 6 characters!");
		} else if($("#result").attr("class") == "weak") {
			$(".error").css("display", "block");
			$("#error_msg_change_pass").html("Please enter a strong password!");
		} else if(new_password != new_password_confirm) {
			$(".error").css("display", "block");
			$('#result_confirm').removeClass();
			$('#result_confirm').addClass('short');
			$("#error_msg_change_pass").html("You passwords do not match !");
		} else {
			$(".error").css("display", "none");
			//$("#fmChangePassword").submit();
			var _url = base_url + "user_management/save_new_password/2";
			var request = $.ajax({
				url : _url,
				type : 'post',
				data : {
					"old_password" : old_password,
					"new_password" : new_password
				},
				dataType : "json"
			});
			request.done(function(data) {
				$.each(data, function(key, value) {
					if(value == "password_no_exist") {
						$("#error_msg_change_pass").css("display", "block");
						$("#error_msg_change_pass").html("You entered a wrong password!");
					} else if(value == "password_exist") {
						$("#error_msg_change_pass").css("display", "block");
						$("#error_msg_change_pass").html("Your new password matches one of your three pevious passwords!");
					} else if(value == "password_changed") {
						$("#error_msg_change_pass").css("display", "block");
						$("#error_msg_change_pass").removeClass("error");
						$("#error_msg_change_pass").addClass("success");
						$("#error_msg_change_pass").html("Your password was successfully updated!");
						window.setTimeout('location.reload()', 3000);
					} else {
						alert(value);
					}
				});
			});
			request.fail(function(jqXHR, textStatus) {
				alert("An error occured while updating your password : " + textStatus + ". Please try again or contact your system administrator!");
			});
		}
	});
});
/**
 * End Change password validation
 */

/*
 * Auto logout
 */
var timer = 0;
function set_interval() {
	// the interval 'timer' is set as soon as the page loads
	timer = setInterval("auto_logout()", 600000);
	// the figure '180000' above indicates how many milliseconds the timer be set to.
	// Eg: to set it to 5 mins, calculate 3min = 3x60 = 180 sec = 180,000 millisec.
	// So set it to 180000
}

function reset_interval() {
	//resets the timer. The timer is reset on each of the below events:
	// 1. mousemove   2. mouseclick   3. key press 4. scroliing
	//first step: clear the existing timer

	if(timer != 0) {
		clearInterval(timer);
		timer = 0;
		// second step: implement the timer again
		timer = setInterval("auto_logout()", 10000);
		// completed the reset of the timer
	}
}

function auto_logout() {
	var base_url = $("#base_url").val();
	// this function will redirect the user to the logout script
	window.location = base_url + "user_management/logout";
}

/*
* Auto logout end
*/

//Function to get data for ordering(Cdrr)
function getPeriodDrugBalance(count, drug, start_date, end_date) {
	var href = window.location.href;
	var base_url = href.substr(href.lastIndexOf('http://'), href.lastIndexOf('/ADT'));
	var _href = href.substr(href.lastIndexOf('/') + 1);
	var link = base_url + '/ADT/order_management/getPeriodDrugBalance/' + drug + '/' + start_date + '/' + end_date;
	$.ajax({
		url : link,
		type : 'POST',
		dataType : 'json',
		success : function(data) {
			var total_received = 0;
			var total_dispensed = 0;
			var drug_id = 0;
			$.each(data, function(i, jsondata) {
				total_received = jsondata.total_received;
				total_dispensed = jsondata.total_dispensed;
				drug_id = jsondata.drug;
			});
			var total_received_div = "#received_in_period_" + drug_id;
			var total_dispensed_div = "#dispensed_in_period_" + drug_id;
			$(total_received_div).attr("value", total_received);
			$(total_dispensed_div).attr("value", total_dispensed);
			calculateResupply($(total_dispensed_div));
			//Once the calculations are done for the whole table, put back the pagination
			if($(".ordered_drugs").length == count) {
				$('#generate_order').dataTable({
					"sDom" : "<'row'r>t<'row'<'span5'i><'span7'p>>",
					"sPaginationType" : "bootstrap",
					"bSort" : false,
					'bDestroy' : true
				});
			}

		}
	});
}

//Function to get data for ordering(Maps)
function getPeriodRegimenPatients(start_date, end_date) {
	var href = window.location.href;
	var base_url = href.substr(href.lastIndexOf('http://'), href.lastIndexOf('/ADT'));
	var _href = href.substr(href.lastIndexOf('/') + 1);
	var link = base_url + '/ADT/order_management/getPeriodRegimenPatients/' + start_date + '/' + end_date;
	$.ajax({
		url : link,
		type : 'POST',
		dataType : 'json',
		success : function(data) {
			var total_patients = 0;
			var total_patients_div = "";
			$.each(data, function(i, jsondata) {
				total_patients = jsondata.patients;
				total_patients_div = "#patient_numbers_" + jsondata.regimen;
				$(total_patients_div).attr("value", total_patients);
			});
		}
	});

}

/*
 * Sysnchronization of Orders
 */
function syncOrders(facility,session_id) {
	var href = window.location.href;
	var base_url = href.substr(href.lastIndexOf('http://'), href.lastIndexOf('/ADT'));
	var _href = href.substr(href.lastIndexOf('/') + 1);
	var link = "http://localhost/NASCOP/synchronization_management/getSQL/" + facility;
	$.ajax({
		url : link,
		type : 'POST',
		success : function(data) {
			link = base_url + "/ADT/synchronization_management/uploadSQL/"+session_id;
			$.ajax({
				url : link,
				type : 'POST',
				data : {
					"sql" : data
				},
				success : function(data) {
					link = base_url + "/ADT/synchronization_management/synchronize_orders";
					$.ajax({
						url : link,
						type : 'POST',
						success : function(data) {
							
							link = "http://localhost/NASCOP/synchronization_management/getSQL/" + facility;
							$.ajax({
								url : link,
								type : 'POST',
								data : {
									"sql" : data
								},
								success : function(data) {
									link = base_url + "/ADT/synchronization_management/uploadSQL/"+session_id;
									$.ajax({
										url : link,
										type : 'POST',
										data : {
											"sql" : data
										},
										success : function(data) {
											alert("Successful Order Synchronization");
										}
									});
								}
							});
						}
					});

				}
			});

		}
	});

}

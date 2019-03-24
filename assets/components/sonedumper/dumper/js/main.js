function z(el) {
    return document.getElementById(el);
}
var sod = {
    version: {num: 20007, type: 'lite', full: ''},
    init: function () {
        var icons = {
            ' .lb': '0 -80px',
            ' .rb': '-2px -80px',
            ' .mb': '-4px -80px',
            '.ovr': '0 -20px',
            '.ovr .lb': '0 -100px',
            '.ovr .rb': '-2px -100px',
            '.ovr .mb': '-4px -100px',
            '.ovr .arr': '0 -40px',
            '.dwn': '0 -20px',
            '.dwn .lb': '0 -100px',
            '.dwn .rb': '-2px -120px',
            '.dwn .mb': '-4px -120px',
            '.dwn .arr': '0 -60px'
        };
        for (var ico in icons) {
            this.css.add('.zSel' + ico + ' {background-position:' + icons[ico] + ';}');
        }
        this.version.full = z('header').innerHTML;
        this.main = z('main_div');
        this.menu.el = z('sodMenu');
        this.name = z('name').lastChild;
        this.loading = z('loading');
        this.overlay = z('overlay');
        this.progress.current = zProgressObject();
        this.progress.current.init('sodProc1', 1);
        this.progress.total = zProgressObject();
        this.progress.total.init('sodProc2', 2);
        this.tbar = zToolbarObject();
        this.tree.backup = zTreeObject();
        this.tree.backup.init('backup_tree', 1);
        this.tree.restore = zTreeObject();
        this.tree.restore.init('restore_tree', 2);
        this.tree.services = zTreeObject();
        this.tree.services.init('services_tree', 3);
        this.comment.backup = z('backup_comment');
        this.comment.restore = z('restore_comment');
        this.timer.t1 = z('sodTime1');
        this.timer.t2 = z('sodTime2');
        this.timeout = null;
        this.log = zGridObject();
        this.log.init('sodGrid1', {header: [[this.lng('dt'), 120], [this.lng('action')]], width: '100%', height: 286});
        this.files = zGridObject();
        this.files.init('sodGrid2', {
            header: [[this.lng('db'), 90], [this.lng('dt'), 90], [this.lng('type'), 30], [this.lng('tab'), 30, 1, this.lng('table')], [this.lng('records'), 60, 1], [this.lng('size'), 45, 1], [this.lng('comment')]],
            width: '100%',
            height: 334
        });
        this.result = zGridObject();
        this.result.init('sodGrid3', {
            header: [['Table', 160], ['Op', 70], ['Msg_type', 50], ['Msg_text']],
            width: '100%',
            height: 334
        });
        this.addDialogs(['connect', 'createdb', 'savejob', 'charsets']);
        this.addTabs(['backup', 'restore', 'log', 'result', 'files', 'services', 'options']);
    },
    job: {name: 'abcdefgh', stop: 0, log_seek: 0, type: ''},
    menu: {el: null, type: 'zSelMenu'},
    tabs: {},
    openTab: function (name) {
        if (this.opened)this.tabs[this.opened].el.style.display = 'none';
        this.opened = name;
        this.name.innerHTML = this.tabs[name].name;
        this.tabs[name].el.style.display = '';
        document.title = sod.version.full;
    },
    addTabs: function (o) {
        for (var i = 0, l = o.length; i < l; i++) {
            this.tabs[o[i]] = {name: this.lng(o[i]), el: z('tab_' + o[i])};
        }
        this.openTab(o[0]);
    },
    dialogs: {},
    addDialogs: function (o) {
        for (var i = 0, l = o.length; i < l; i++) {
            this.dialogs[o[i]] = z('dia_' + o[i]);
        }
    },
    tbar: {},
    tree: {},
    options: {},
    progress: {},
    combos: {},
    comment: {},
    lng: function (s) {
        return sodlng[s] ? sodlng[s] : '[LNG: ' + s + ']';
    },
    timer: {
        set: function (time1, time2, proc) {
            function lead0(i) {
                return i < 10 ? '0' + i : i;
            }

            function sec2time(sec) {
                return lead0(Math.floor(sec / 60)) + ':' + lead0(sec % 60);
            }

            if (!time1 && !time2)this.t1.innerHTML = '00:00', this.t2.innerHTML = '00:00'; else {
                var t = time2 - time1;
                this.t1.innerHTML = sec2time(t);
                this.t2.innerHTML = sec2time(t > 0 && proc > 0 ? Math.round(t / (proc / 100) - t) : 0);
            }
        }
    },
    actions: {
        db: function () {
            if (!this.value)return;
            if (this.name == 'backup_db' || this.name == 'services_db')sod.ajax('index', sod.lng('load'), {
                act: 'load_db',
                name: this.name,
                value: this.value
            });
        }, dblist: function () {
            sod.ajax('index', sod.lng('load'), {act: 'dblist'});
        }, filelist: function () {
            sod.ajax('index', sod.lng('load'), {act: 'filelist'});
        }, files: function () {
            if (!this.value)return;
            sod.ajax('index', sod.lng('load'), {act: 'load_files', name: this.name, value: this.value});
        }, tab_connects: function () {
            sod.ajax('index', sod.lng('load'), {act: 'load_connect'});
            sod.showDialog('connect');
        }, tab_createdb: function () {
            sod.showDialog('createdb');
        }, tab_backup: function () {
            sod.openTab('backup');
            if (sod.tree.backup.load)sod.combos.backup_db.action();
        }, tab_restore: function () {
            sod.openTab('restore');
            if (sod.tree.restore.load)sod.combos.restore_file.action();
        }, tab_files: function () {
            sod.ajax('index', sod.lng('load'), {act: 'load_files_ext'});
            sod.openTab('files');
        }, tab_services: function () {
            sod.openTab('services');
            if (sod.tree.services.load)sod.combos.services_db.action();
        }, tab_options: function () {
            sod.ajax('index', sod.lng('load'), {act: 'load_options'});
            sod.openTab('options');
        }, tab_exit: function () {
            sod.ajax('index', sod.lng('load'), {act: 'exit'});
        }
    },
    informer: function () {
        if (sod.job.timer)clearTimeout(sod.job.timer);
        if (sod.job.stop)return;
        sod.job.timer = setTimeout(function () {
            sod.ajax('info', sod.lng('run'), {job: sod.job.name, act: 'info', lseek: sod.job.log_seek}, 1, function () {
                sod.informer();
            });
        }, 250);
    },
    addDb: function () {
        sod.ajax('index', this.lng('sdb'), {
            act: 'add_db',
            name: z('db_name').value,
            charset: this.combos.db_charset.value,
            collate: this.combos.db_charset_col.value
        });
        sod.hideDialog('createdb');
    },
    saveConnect: function () {
        sod.ajax('index', this.lng('sc'), {
            act: 'save_connect',
            host: z('con_host').value,
            port: z('con_port').value,
            user: z('con_user').value,
            pass: z('con_pass').changed ? z('con_pass').value : null,
            comp: z('con_comp').checked ? '1' : '0',
            db: z('con_db').value
        });
        sod.hideDialog('connect');
        z('con_pass').value = '';
    },
    job2php: function () {
        return sod.opened == 'restore' || sod.job.type == 'restore' ? {
            act: 'restore',
            type: 'restore',
            db: this.combos.restore_db.value,
            charset: this.combos.restore_charset.value,
            file: this.combos.restore_file.value,
            strategy: this.combos.restore_type.value,
            correct: z('correct').checked ? 1 : 0,
            autoinc: z('autoinc').checked ? 1 : 0,
            obj: this.tree.restore.save()
        } : {
            act: 'backup',
            type: 'backup',
            db: this.combos.backup_db.value,
            charset: this.combos.backup_charset.value,
            zip: this.combos.backup_zip.value,
            comment: this.comment.backup.value,
            del_time: z('del_time').value,
            del_count: z('del_count').value,
            obj: this.tree.backup.save()
        };
    },
    saveJob: function () {
        var t = this.job2php();
        t.job = z('sj_name').value, t.act = 'save_job', t.title = z('sj_title').value;
        sod.ajax('index', this.lng('sj'), t);
        sod.hideDialog('savejob');
    },
    runSavedJob: function (type, job) {
        if (job == 0)return;
        this.clearLogTab();
        sod.job.name = job;
        sod.job.type = type;
        sod.job.act = 'run_savedjob';
        sod.ajax('index', this.lng('run'), {act: 'run_savedjob', type: type, job: job}, 1);
        this.openTab('log');
        z('btn_resume').style.display = 'none';
        z('btn_pause').style.display = '';
        z('btn_stop').disabled = false;
        z('btn_pause').disabled = false;
        z('btn_again').disabled = true;
        sod.job.stop = 0;
        sod.informer();
    },
    saveOptions: function () {
        sod.confirms = z('conf_import').checked * 1 + z('conf_file').checked * 2 + z('conf_db').checked * 4;
        sod.ajax('index', this.lng('so'), {
            act: 'save_options',
            time_web: z('time_web').value * 1,
            time_cron: z('time_cron').value * 1,
            backup_path: z('backup_path').value,
            backup_url: z('backup_url').value,
            globstat: z('globstat').checked ? '1' : '0',
            charsets: z('charsets').value,
            only_create: z('only_create').value,
            auth: z('auth').value,
            confirm: sod.confirms
        });
        sod.hideDialog('connect');
        z('con_pass').value = '';
    },
    clearLogTab: function () {
        this.log.clear();
        this.timer.set(0);
        this.job.log_seek = 0;
        this.progress.current.set(0);
        this.progress.total.set(0);
    },
    runBackup: function () {
        this.clearLogTab();
        z('btn_resume').style.display = 'none';
        z('btn_pause').style.display = '';
        z('btn_down').style.display = 'none';
        z('btn_stop').disabled = false;
        z('btn_pause').disabled = false;
        z('btn_again').disabled = true;
        sod.job.name = this.newJob();
        sod.job.type = 'backup';
        var t = this.job2php();
        this.openTab('log');
        t.type = 'run', t.job = sod.job.name;
        this.ajax('index', this.lng('run'), t, 1);
        sod.job.stop = 0;
        sod.informer();
    },
    stopJob: function () {
        z('btn_again').disabled = false;
        z('btn_stop').disabled = true;
        z('btn_pause').disabled = true;
        sod.ajax('info', this.lng('run'), {job: sod.job.name, act: 'stop'}, 1);
    },
    pauseJob: function () {
        z('btn_again').disabled = false;
        z('btn_stop').disabled = true;
        z('btn_pause').disabled = true;
        sod.ajax('info', this.lng('run'), {job: sod.job.name, act: 'pause'}, 1);
        z('btn_resume').style.display = '';
        z('btn_pause').style.display = 'none';
    },
    resumeJob: function () {
        z('btn_stop').disabled = false;
        z('btn_pause').disabled = false;
        z('btn_again').disabled = true;
        sod.ajax('index', this.lng('run'), {job: sod.job.name, act: 'resume'}, 1);
        z('btn_resume').style.display = 'none';
        z('btn_pause').style.display = '';
        sod.job.stop = 0;
        sod.informer();
    },
    runAgain: function () {
        if (sod.job.act == 'run_savedjob') {
            sod.runSavedJob(sod.job.type, sod.job.name);
        }
        else if (sod.job.type == 'backup') {
            sod.runBackup();
        }
        else if (sod.job.type == 'restore') {
            sod.runRestore();
        }
    },
    runRestore: function () {
        if (sod.confirms & 1 && !confirm(sod.lng('fic')))return;
        this.clearLogTab();
        z('btn_resume').style.display = 'none';
        z('btn_pause').style.display = '';
        z('btn_down').style.display = 'none';
        z('btn_stop').disabled = false;
        z('btn_pause').disabled = false;
        z('btn_again').disabled = true;
        sod.job.name = this.newJob();
        sod.job.type = 'restore';
        var t = this.job2php();
        this.openTab('log');
        t.type = 'run', t.job = sod.job.name;
        this.ajax('index', this.lng('run'), t, 1);
        sod.job.stop = 0;
        sod.informer();
    },
    runServices: function (type) {
        switch (type) {
            case'delete':
                if (sod.confirms & 4 && !confirm(sod.lng('ddc')))return;
                sod.ajax('index', sod.lng('run'), {act: 'delete_db', name: this.combos.services_db.value});
                return;
        }
        this.result.clear();
        this.openTab('result');
        this.ajax('index', this.lng('run'), {
            act: 'services',
            type: type,
            db: this.combos.services_db.value,
            check: this.combos.services_check.value,
            repair: this.combos.services_repair.value,
            obj: this.tree.services.save()
        });
    },
    runFiles: function (type, file) {
        file = file || this.files.selected.file;
        switch (type) {
            case'open':
                sod.combos.restore_file.select(file);
                sod.openTab('restore');
                break;
            case'download':
                location.href = sod.backupUrl + file;
                break;
            case'delete':
                if (!file)return;
                if (sod.confirms & 2 && !confirm(sod.lng('fdc')))return;
                sod.ajax('index', sod.lng('run'), {act: 'delete_file', name: file});
                sod.actions.filelist();
                break;
        }
    },
    ajax: function (url, txt, req, nothide, onload) {
        function obj2php(obj, depth) {
            var s = '';
            depth = depth || '';
            for (var o in obj) {
                s += typeof obj[o] == 'object' ? obj2php(obj[o], depth + '[' + o + ']') : 'ajax' + depth + '[' + o + ']=' + encodeURIComponent(obj[o]) + '&';
            }
            return s;
        }

        this.showLoading(txt);
        url += '.php';
        var params = obj2php(req);
        var xhr = window.XMLHttpRequest ? new XMLHttpRequest() : (window.ActiveXObject ? new ActiveXObject('Microsoft.XMLHTTP') : null);
        xhr.open('POST', url, true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        var t = this;

        function oncomplete() {
            if (xhr && xhr.readyState == 4) {
                if (xhr.status == 200) {
                    eval(xhr.responseText);
                }
                else {
                    alert(xhr.statusText);
                }
                if (onload)onload();
                xhr = null;
                clearInterval(iv);
                iv = null;
                if (!nothide)t.hideLoading();
            }
        }

        var iv = setInterval(oncomplete, 33);
        xhr.send(params);
    },
    css: {
        add: function (rule, index) {
            var s = document.styleSheets[0];
            if (!index)index = s.cssRules ? s.cssRules.length : s.rules.length;
            if (s.addRule) {
                if (/^([^{]+)\{(.*)\}\s*$/.test(rule)) {
                    s.addRule(RegExp.$1, RegExp.$2, index);
                }
            }
            else {
                s.insertRule(rule, index);
            }
        }, swap: function (elem, classes, sel) {
            var tmp = elem.className.split(/\s+/);
            for (var t in tmp) {
                for (var c in classes) {
                    if (tmp[t] == classes[c]) {
                        tmp[t] = classes[sel];
                        break;
                    }
                }
            }
            elem.className = tmp.join(' ');
        }
    },
    showDialog: function (name) {
        this.overlay.style.display = 'block';
        var d = this.dialogs[name];
        d.style.display = 'block';
        d.style.marginTop = '-' + Math.round(d.clientHeight / 2 - 2) + 'px';
        d.getElementsByTagName('input')[0].focus();
    },
    hideDialog: function (name) {
        this.dialogs[name].style.display = 'none';
        this.overlay.style.display = 'none';
    },
    addCombo: function (name, value, ico, opts) {
        this.combos[name] = {ico: ico || 0, el: z(name)};
        var c = this.combos[name];
        var t;
        if (typeof opts == 'object') {
            opts = this.addOpt(opts);
        }
        else if (t = /^(\w+):(\w+)$/.exec(opts)) {
            var tmp = {};
            if (this.combos[t[2]].options.length > 0)tmp[opts] = this.combos[t[2]].options[this.combos[t[2]].sel].opts; else tmp[opts] = [];
            value = this.addOpt(tmp, 1);
            this.combos[t[2]].child = c;
        }
        else {
            var t = {};
            t[opts] = {};
            opts = this.addOpt(t);
        }
        c.options = this.options[opts];
        c.optName = opts;
        c.name = name;
        c.parent = this;
        c.el.className = 'zSel';
        c.el.innerHTML = '<div class="lb"></div><div class="txt" style="background-position:-16px ' + ((c.ico - 1) * -16) + 'px;"></div><div class="arr"><div class="mb"></div><div class="more"></div><div class="rb"></div></div>';
        c.action = function () {
        };
        c.select = function (value, wheel) {
            this.sel *= 1;
            if (this.options == undefined)return false;
            if (value == '+') {
                this.sel += this.sel < this.options.length - 1 ? 1 : 0;
            }
            else if (value == '-') {
                this.sel -= this.sel > 0 ? 1 : 0;
            }
            else {
                this.sel = 0;
                for (var i in this.options)if (this.options[i].value == value) {
                    this.sel = i;
                    break;
                }
            }
            if (wheel) {
                this.parent.menu.el.style.display = 'none';
                document.body.onclick = null;
            }
            this.value = this.options[this.sel] ? this.options[this.sel].value : 0;
            this.text = this.options[this.sel] ? this.options[this.sel].text : '';
            this.el.childNodes[1].innerHTML = this.text;
            if (this.child) {
                this.parent.clearOpt(this.child.optName);
                var tmp = {};
                tmp[this.child.optName] = this.options[this.sel].opts;
                this.child.select(this.parent.addOpt(tmp, 1), 0);
            }
            var _this = this;
            if (wheel) {
                clearTimeout(sod.timeout);
                sod.timeout = setTimeout(function () {
                    _this.action();
                }, 333);
            }
            else this.action();
        };
        c.select(value, 0);
        c.action = this.actions[opts] || function () {
            };
        c.show = function () {
            if (!c.el.disabled)_this.showMenu(c, c.options, {});
        };
        var _this = this;
        c.el.onmouseover = function (e) {
            e = e || window.event;
            if (!c.el.disabled)c.el.className = 'zSel ovr';
        };
        c.el.onmousewheel = function (e) {
            e = e || window.event;
            var s = e.wheelDelta > 0 ? '-' : '+';
            if (!c.el.disabled)c.select(s, 1);
        };
        if (c.el.addEventListener)c.el.addEventListener('DOMMouseScroll', function (e) {
            e.wheelDelta = -e.detail;
            c.el.onmousewheel(e);
        }, false);
        c.el.onmouseout = function (e) {
            c.el.className = 'zSel';
        };
        c.el.onmousedown = function (e) {
            e = e || window.event;
            if (!c.el.disabled) {
                if (_this.menu.el.style.display != 'none' && _this.menu.el.obj.name == c.name) {
                    _this.menu.el.style.display = 'none';
                    c.el.className = 'zSel ovr';
                }
                else {
                    c.el.className = 'zSel dwn';
                    c.show();
                }
            }
            if (e.stopPropagation)e.stopPropagation();
            e.cancelBubble = true;
        };
    },
    addOpt: function (options, txt) {
        txt = txt || 0;
        var def = '';
        for (var o in options) {
            if (!this.options[o]) {
                this.options[o] = [];
            }
            for (var i in options[o]) {
                if (typeof options[o][i] == 'object')
                    this.options[o].push({text: i, value: i * 1 == i ? i * 1 : i, opts: options[o][i]}); else {
                    if (txt && options[o][i])def = i;
                    this.options[o].push({text: txt ? i : options[o][i], value: i * 1 == i ? i * 1 : i});
                }
            }
            this.options[o] = this.options[o].sort(this.keyNatSort);
        }
        return txt ? def : o;
    },
    clearOpt: function (name) {
        if (name) {
            if (this.options[name])this.options[name].length = 0;
        }
        else for (var o in this.options)this.options[o].length = 0;
    },
    showMenu: function (obj, opts, cfg) {
        var s = '', m = this.menu.el;
        m.className = 'zSelMenu';
        m.innerHTML = '<div style="width:100%;"></div>';
        for (var o in opts) {
            s = document.createElement('DIV');
            s.innerHTML = opts[o].text;
            s.title = s.firstChild.nodeValue || '';
            if (o == obj.sel) {
                s.className = 'ovr';
                m.over = s;
            }
            s.value = opts[o].value;
            s.onmouseover = function () {
                if (m.over)m.over.className = '';
                this.className = 'ovr';
                m.over = this;
            };
            s.onmousedown = function () {
                if (cfg.runjob)sod.runSavedJob(m.obj.com, this.value); else if (cfg.btn)sod.runServices(this.value); else m.obj.select(this.value, 0);
                m.style.display = 'none';
            };
            m.firstChild.appendChild(s);
        }
        m.style.display = 'block';
        var pos = this.offset(obj.el);
        m.style.width = (cfg.width ? cfg.width : obj.el.offsetWidth - 4) + 'px';
        var height = (m.firstChild.offsetHeight < 260 ? m.firstChild.offsetHeight : 260);
        m.style.height = height + 'px';
        m.style.top = pos.top - (cfg.btn ? height + obj.el.offsetHeight + 2 : 0) + 'px';
        m.style.left = pos.left + 'px';
        m.scrollTop = m.over ? m.over.offsetTop : 0;
        m.obj = obj;
        m.onmousedown = function (e) {
            e = e || window.event;
            if (e.stopPropagation)e.stopPropagation();
            e.cancelBubble = true;
        };
        document.body.onmousedown = function () {
            m.style.display = 'none';
            document.body.onclick = null;
        };
    },
    offset: function (el) {
        var top = el.offsetTop + el.offsetHeight + 1, left = el.offsetLeft + 2;
        while ((el = el.offsetParent))top += el.offsetTop - el.scrollTop, left += el.offsetLeft - el.scrollLeft;
        return {top: top, left: left};
    },
    keyNatSort: function (a, b) {
        var aa, bb;
        a = a.value, b = b.value;
        while ((aa = /^(\D+|(\d+))(.*?)$/.exec(a)) && (bb = /^(\D+|(\d+))(.*?)$/.exec(b))) {
            if (aa[2] && bb[2] && aa[2] != bb[2])return aa[2] * 1 > bb[2] * 1 ? 1 : -1; else if (aa[1] && bb[1] && aa[1] != bb[1])return aa[1] > bb[1] ? 1 : -1; else if (aa[3] && bb[3] && aa[3] != bb[3])a = aa[3], b = bb[3]; else return 0;
        }
    },
    formatSize: function (size, add) {
        add = add || 0;
        if (size >= 0) {
            var i = 0;
            while (size > 999 && (size /= 1024))i++;
            size = (i > 0 ? size.toPrecision(3) : size) + ' ' + sodlng.sizes[i];
            if (add == 2)return size; else if (add == 1)return ' <span>[ ' + size + ' ]</span>';
            return '[ ' + size + ' ]';
        }
        return '';
    },
    showLoading: function (txt) {
        this.loading.innerHTML = txt;
        this.loading.style.visibility = 'visible';
    },
    hideLoading: function () {
        this.loading.style.visibility = 'hidden';
        sod.job.stop = 1;
        z('btn_stop').disabled = true;
        z('btn_pause').disabled = true;
        z('btn_again').disabled = false;
    },
    newJob: function () {
        var key = 'qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM1234567890';
        var name = '';
        for (var i = 0; i < 8; i++)name += key.charAt(Math.round(Math.random() * 61));
        return name;
    }
};
function zTreeObject() {
    return {
        init: function (elem, num) {
            this.el = z(elem);
            this.name = elem;
            this.prefix = 'zti_' + num + '_';
            this.id = '#' + elem;
            this.index = [];
            this.data = [];
            this.load = true;
            this.err = false;
            var _this = this;
            this.el.className = 'zTree';
            this.el.onselectstart = function () {
                return false;
            };
            this.el.onclick = function (e) {
                e = e || window.event;
                var t = e.target || e.srcElement;
                switch (t.tagName.toUpperCase()) {
                    case'I':
                        if (t.className == 'pm') {
                            _this.openBranch(_this.getId(t));
                        }
                        else if (t.className.match(/^cb[0124]$/)) {
                            _this.clickBranch(_this.getId(t));
                        }
                        break;
                    case'A':
                        _this.clickBranch(_this.getId(t));
                        if (e.stopPropagation)e.stopPropagation();
                        e.cancelBubble = true;
                        break;
                }
                if (t.parentNode.tagName.toUpperCase() == 'A') {
                    _this.clickBranch(_this.getId(t));
                }
                return false;
            };
            this.el.onmousedown = function (e) {
                e = e || window.event;
                var t = e.target || e.srcElement;
                if (t.tagName.toUpperCase() == 'A' || t.parentNode.tagName.toUpperCase() == 'A') {
                    return false;
                }
            };
            var treeIcons = ['li.df > div', 'li.dt > div', 'li.dl > div', '.close .pm', '.pm', '.cb0', '.cb1', '.cb2', '.cb3', '.cb4'];
            for (var ico in treeIcons) {
                sod.css.add('.zTree ' + treeIcons[ico] + ' {background-position: 0 -' + (ico * 18) + 'px;}');
            }
            var Icons = ['.cTA', '.cVI', '.cPR', '.cFU', '.cTR', '.cEV', '.iTA', '.iVI', '.iPR', '.iFU', '.iTR', '.iEV'];
            for (ico in Icons) {
                sod.css.add('.zTree ' + Icons[ico] + ' {background-position: 0 -' + (ico * 16) + 'px;}');
            }
        }, getId: function (o) {
            while (!o.parentNode.id && (o = o.parentNode)) {
            }
            return o.parentNode.id.replace(this.prefix, '') * 1;
        }, openBranch: function (id) {
            var o = this.index[id];
            o.open = (o.open + 1) % 2;
            sod.css.swap(o.el, ['close', 'open'], o.open);
        }, clickBranch: function (id) {
            if (sod.version.type == 'lite' && this.name == 'restore_tree') {
                alert(sod.lng('pro'));
                return false;
            }
            var o = this.index[id];
            if (o.checked == 3) {
                return false;
            }
            this.setCheckBox(id, o.checked == 4 ? 1 : (o.checked + 1) % (o.type.match(/^.TA$/) ? 3 : 2));
            this.changeChilds(o);
            this.checkParents(o);
        }, setCheckBox: function (id, check) {
            check = (this.index[id].typen == 2 && check == 1 && this.index[id].size == undefined) ? 2 : check;
            this.index[id].checked = check;
            this.index[id].el.firstChild.childNodes[1].className = 'cb' + check;
        }, changeChilds: function (o) {
            if (o.childs) {
                for (var c in o.childs) {
                    this.setCheckBox(o.childs[c].id, o.checked);
                    this.changeChilds(o.childs[c]);
                }
            }
        }, checkParents: function (o) {
            var check;
            while (o.pid > 0) {
                o = this.index[o.pid];
                check = -1;
                for (var c in o.childs) {
                    if (check >= 0 && check != o.childs[c].checked) {
                        check = 4;
                        break;
                    }
                    check = o.childs[c].checked;
                }
                this.setCheckBox(o.id, check);
            }
            if (o.id == 1) {
                this.recountSizes(o);
            }
        }, drawTree: function (d) {
            this.load = this.err = false;
            if (typeof(d) != 'object')return false;
            var index = [''], data = [];
            var types = ['', 'cTA', 'iTA', 'cVI', 'iVI', 'cPR', 'iPR', 'cFU', 'iFU', 'cTR', 'iTR', 'cEV', 'iEV'];
            for (var k = 0, l = d.length; k < l; k++) {
                o = {};
                o.id = d[k][0];
                o.pid = d[k][1];
                o.parent = index[o.pid];
                o.name = d[k][2];
                o.type = types[d[k][3]];
                o.typen = d[k][3];
                o.checked = d[k][4] || 0;
                if (d[k][3] < 3)o.size = d[k][3] == 2 ? d[k][5] : 0;
                if (d[k][3] & 1)o.childs = [], o.open = d[k][5] || 0;
                index[o.id] = o;
                if (o.pid > 0)index[o.pid].childs.push(o); else data.push(o);
            }
            this.lastId = 0;
            this.el.innerHTML = this.drawChilds(data, 0);
            for (k = 1, l = index.length; k < l; k++) {
                if (!index[k])continue;
                o = z(this.prefix + index[k].id);
                index[k].el = o;
            }
            this.data = data;
            this.index = index;
        }, recountSizes: function (o) {
            if (!o.childs) {
                return 0;
            }
            var size = 0;
            for (var k in o.childs) {
                size += this.recountSizes(o.childs[k]);
                if (o.childs[k].type == 'iTA' && o.childs[k].checked == 1) {
                    size += o.childs[k].size || 0;
                }
            }
            o.el.getElementsByTagName('span')[0].innerHTML = sod.formatSize(size, 0);
            return size;
        }, drawChilds: function (aChilds, pid) {
            if (aChilds.length == 0)return '';
            var sTree = '<ul>';
            var cLi, cPlus, cCheck, cIcon, sChilds, o, nChild = 0, lastChild = aChilds.length, pCheck = -1, chSize = 0;
            for (var k = 0; k < lastChild; k++) {
                o = aChilds[k];
                if (o.childs && o.childs.length > 0) {
                    cPlus = 'pm';
                    sChilds = this.drawChilds(o.childs, o.id);
                }
                else {
                    if (pid == 0) {
                        o.checked = 3;
                    }
                    cPlus = sChilds = '';
                }
                pCheck = (pCheck >= 0 && pCheck != o.checked) ? 4 : o.checked;
                ++nChild;
                if (lastChild == nChild) {
                    cLi = 'dl';
                }
                else {
                    cLi = 'dt';
                }
                cCheck = 'cb' + o.checked;
                cIcon = o.type || 'iTA';
                if (o.size && (o.checked == 1 || o.checked == 4)) {
                    chSize += o.size;
                }
                sTree += '<li class="' + cLi + (o.open ? ' open' : ' close') + '" id="' + this.prefix + o.id + '"><div><i class="' + cPlus
                    + '"></i><i class="' + cCheck + '"></i><a href="#"><i class=' + cIcon + '></i> ' + o.name
                    + sod.formatSize(o.size, 1) + ' </a></div>' + sChilds + '</li>';
            }
            if (o.pid > 0) {
                o.parent.checked = pCheck;
                if (chSize > 0) {
                    o.parent.size += chSize;
                }
            }
            return sTree + '</ul>';
        }, save: function () {
            if (this.err)return null;
            var data = this.data;
            var saved = {TA: [], TC: [], VI: [], PR: [], FU: [], TR: [], EV: []};
            var o, c, tc;
            for (var i1 = 0, l1 = data.length; i1 < l1; i1++) {
                o = data[i1];
                if (o.checked == 4) {
                    for (var i2 = 0, l2 = o.childs.length; i2 < l2; i2++) {
                        c = o.childs[i2];
                        if (c.checked == 4) {
                            for (var i3 = 0, l3 = c.childs.length; i3 < l3; i3++) {
                                tc = c.childs[i3];
                                if (tc.checked == 1)saved['TA'].push(tc.name); else if (tc.checked == 2)saved['TC'].push(tc.name);
                            }
                        }
                        else if (c.checked == 1)saved[c.type.substr(1, 2)].push(c.name); else if (c.checked == 2)saved['TC'].push(c.name);
                    }
                }
                else if (o.checked == 1)saved[o.type.substr(1, 2)].push('*'); else if (o.checked == 2)saved['TC'].push('*');
            }
            return saved;
        }, error: function (str) {
            str = str || 'Empty';
            this.err = true;
            this.el.innerHTML = '<div class=error><div>' + str + '</div></div>';
        }
    };
}
function zToolbarObject() {
    return {
        init: function (elem, buttons) {
            this.el = z(elem);
            this.name = elem;
            this.id = '#' + elem;
            this.el.className = 'zTBar';
            this.buttons = buttons;
            this.curBtn = {id: 0, more: 0, pop: 0, el: null, com: null};
            var _this = this;
            this.el.onmouseover = function (e) {
                if (_this.curBtn.pop)return;
                if (_this.getId(e || window.event)) {
                    _this.curBtn.el.className = 'btn ovr';
                }
            };
            this.el.onmouseout = function (e) {
                if (_this.curBtn.pop)return;
                if (_this.getId(e || window.event)) {
                    _this.curBtn.el.className = 'btn';
                }
            };
            this.el.onmousedown = function (e) {
                e = e || window.event;
                if (_this.curBtn.pop)return;
                if (_this.getId(e || window.event)) {
                    _this.curBtn.el.className = _this.curBtn.more ? 'btn ovr' : 'btn dwn';
                    if (_this.curBtn.more) {
                        _this.curBtn.el.lastChild.className = 'arr dwn';
                        _this.curBtn.pop = 1;
                        sod.showMenu(_this.curBtn, sod.options['sj_' + _this.curBtn.com], {width: 220, runjob: true});
                        document.body.onclick = function () {
                            _this.curBtn.el.className = 'btn';
                            _this.curBtn.el.lastChild.className = 'arr';
                            _this.curBtn.pop = 0;
                            document.body.onclick = null;
                        };
                        if (e.stopPropagation)e.stopPropagation();
                        e.cancelBubble = true;
                    }
                }
            };
            this.el.onmouseup = function (e) {
                if (_this.curBtn.pop)return;
                if (_this.getId(e || window.event)) {
                    _this.curBtn.el.className = 'btn ovr';
                    if (_this.curBtn.more) {
                        _this.curBtn.el.lastChild.className = 'arr';
                    }
                    sod.actions['tab_' + _this.curBtn.com](_this.curBtn.more);
                }
            };
            var icons = {
                '.btn.ovr': '0 4px',
                '.ovr .lb': '0 -72px',
                '.ovr .rb': '-4px -72px',
                '.ovr .mb': '0 -138px',
                '.btn.dwn': '0 4px',
                '.dwn .lb': '0 -116px',
                '.dwn .rb': '-4px -116px',
                '.dwn .mb': '-4px -138px',
                '.dwn.arr': '0 -94px',
                '.dwn.arr .mb': '-4px -50px'
            };
            for (var ico in icons) {
                sod.css.add('.zTBar ' + ico + ' {background-position:' + icons[ico] + ';}');
            }
            var btn, sTBar = '';
            for (var b in buttons) {
                btn = buttons[b];
                if (btn[0] == '|') {
                    sTBar += '<div class="spl"></div>';
                    continue;
                }
                ico = ' style="background-position:-16px ' + ((btn[2] - 1) * -16) + 'px;"';
                sTBar += '<div class="btn" id="ztbi_' + b + '"><div class="lb"></div>';
                sTBar += btn[3] & 1 ? '<div class="txt"' + ico + '>' + btn[1] + '</div>' : '<div class="ico" title="' + btn[1] + '"' + ico + '></div>';
                sTBar += btn[3] & 2 ? '<div class="arr"><div class="mb"></div><div class="more"></div><div class="rb"></div></div>' : '<div class="rb"></div>';
                sTBar += '</div>';
            }
            this.el.innerHTML = sTBar;
            if (this.el.lastChild.offsetTop > 30) {
                btn = this.el.lastChild.childNodes[1];
                btn.className = 'ico';
                btn.title = btn.innerHTML;
                btn.innerHTML = '';
            }
        }, getId: function (e) {
            var o = e.target || e.srcElement;
            var r = {id: 0, more: 0, pop: 0, el: null, com: null};
            while (!o.id) {
                if (o.className.match(/arr/)) {
                    r.more = 1;
                }
                o = o.parentNode;
            }
            if (o.id && o.className != 'zTBar') {
                r.id = o.id.replace('ztbi_', '') * 1;
                r.el = o;
                r.com = this.buttons[r.id][0];
                this.curBtn = r;
                return true;
            }
            return false;
        }
    };
}
function zProgressObject() {
    return {
        init: function (elem, type) {
            this.el = z(elem);
            this.name = elem;
            this.type = type;
            this.el.className = 'zProc ' + (type == 2 ? 'blue' : 'green');
            this.el.innerHTML = '<div class=bot><div class=txt>0%</div></div><div class=top><div class=txt>0%</div></div>';
            this.txt1 = this.el.firstChild.firstChild;
            this.txt2 = this.el.lastChild.firstChild;
            this.top = this.el.lastChild;
        }, set: function (proc, size, cur, tot) {
            proc = proc > 0 ? (proc > 100 ? 100 : proc) : 0;
            size = size || 0;
            cur = cur || 0;
            tot = tot || 0;
            this.txt1.innerHTML = proc + '%' + (size ? ' ' + sod.formatSize(size) : '') + (cur && tot ? ' [' + cur + '/' + tot + ']' : '');
            this.txt2.innerHTML = this.txt1.innerHTML;
            if (this.type == 2)document.title = proc + '% - ' + sod.version.full;
            this.top.style.width = Math.round(proc * 3) + 'px';
        }
    };
}
function zGridObject() {
    return {
        init: function (elem, cfg) {
            this.el = z(elem);
            this.name = elem;
            this.cfg = cfg;
            this.el.className = 'zGrid';
            var header = '';
            this.cols = cfg.header.length;
            for (var i = 0; i < this.cols; i++) {
                header += '<th' + (cfg.header[i][1] ? ' width=' + cfg.header[i][1] : '') + '>' + cfg.header[i][0] + '</th>';
            }
            this.el.innerHTML = '<div class=header><div><table cellspacing=0><tr>' + header + '</tr></table></div></div><div style="overflow-x:hidden;overflow-y:auto;"><table cellspacing="0"></table></div>';
            this.data = this.el.lastChild.firstChild;
            this.datadiv = this.el.lastChild;
            this.data.style.width = cfg.width + 'px';
            this.el.firstChild.style.height = '22px';
            this.el.firstChild.style.width = (cfg.width - 1) + 'px';
            this.datadiv.style.height = (cfg.height - 23) + 'px';
            this.datadiv.style.width = (cfg.width - 1) + 'px';
            if (this.name == 'sodGrid1') {
                this.oldtime = '';
                this.add = this.addLog;
            }
            else {
                var _this = this;
                this.selected = null;
                this.add = function (rows) {
                    if (typeof rows[0] == 'object') {
                        for (var row in rows)this.addRow(rows[row]);
                    }
                    else this.addRow(rows);
                };
                this.datadiv.onclick = function () {
                    _this.selected.className = '';
                    _this.selected = null;
                };
            }
        }, addLog: function (time, txt, color) {
            var newrow, td1, td2;
            for (var i = 0; i < txt.length; i++) {
                newrow = this.data.insertRow(-1);
                td1 = newrow.insertCell(-1);
                td2 = newrow.insertCell(-1);
                td1.width = 120;
                if (!i) {
                    td1.innerHTML = this.oldtime != time ? time : '&nbsp;';
                    this.oldtime = time;
                }
                td2.className = 'wrap';
                td2.innerHTML = txt[i] || '&nbsp;';
                if (color)td2.style.color = color;
            }
            this.datadiv.scrollTop = this.datadiv.scrollHeight;
        }, addRow: function (row) {
            var newrow = this.data.insertRow(-1);
            var td;
            if (this.name == 'sodGrid2')row[5] = sod.formatSize(row[5], 2);
            for (var i = 0; i < this.cols; i++) {
                td = newrow.insertCell(-1);
                if (this.cfg.header[i][1])td.width = this.cfg.header[i][1];
                if (this.cfg.header[i][2] == 1)td.style.textAlign = 'right';
                td.innerHTML = row[i] || '&nbsp;';
                td.title = row[i] || '';
                if (i == 0 && this.name == 'sodGrid2')td.title += "\n" + row[7];
            }
            newrow.file = row[this.cols];
            var _this = this;
            newrow.onclick = function (e) {
                e = e || window.event;
                if (_this.selected)_this.selected.className = '';
                this.className = 'sel';
                _this.selected = this;
                if (e.stopPropagation)e.stopPropagation();
                e.cancelBubble = true;
            };
            newrow.ondblclick = function (e) {
                e = e || window.event;
                if (_this.selected)_this.selected.className = '';
                this.className = 'sel';
                _this.selected = this;
                sod.runFiles('open');
                if (e.stopPropagation)e.stopPropagation();
                e.cancelBubble = true;
            };
        }, clear: function () {
            for (var i = 0, l = this.data.rows.length; i < l; i++) {
                this.data.deleteRow(0);
            }
            this.oldtime = '';
        }
    };
}

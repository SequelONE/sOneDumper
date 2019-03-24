<?php

declare(strict_types = 1);

$LNG = [

// Информация о файле локализации
	'name'            => 'Русский', // Название языка

// Панель инструментов
	'tbar_backup'     => 'Экспорт',
	'tbar_restore'    => 'Импорт',
	'tbar_files'      => 'Файлы',
	'tbar_services'   => 'Сервисы',
	'tbar_options'    => 'Опции',
	'tbar_createdb'   => 'Создать БД',
	'tbar_connects'   => 'Соединение',
	'tbar_exit'       => 'Выход',

// Названия объектов в дереве
	'obj_tables'      => 'Таблицы',
	'obj_views'       => 'Представления',
	'obj_procs'       => 'Процедуры',
	'obj_funcs'       => 'Функции',
	'obj_trigs'       => 'Триггеры',
	'obj_events'      => 'События',

// Экспорт
	'zip_max'         => 'максимум',
	'zip_min'         => 'минимум',
	'zip_none'        => 'Без сжатия',
	'default'         => 'по умолчанию',
	'combo_db'        => 'База данных:',
	'combo_charset'   => 'Кодировка:',
	'combo_zip'       => 'Сжатие:',
	'combo_comments'  => 'Комментарий:',
	'del_legend'      => 'Автоудаление, если:',
	'del_date'        => 'файлам больше %s дней',
	'del_count'       => 'количество файлов более %s',
	'tree'            => 'Выберите объекты:',
	'no_saved'        => '*Нет сохраненных задач',
	'btn_save'        => 'Сохранить',
	'btn_exec'        => 'Выполнить',

// Импорт
	'combo_file'      => 'Файл:',
	'combo_strategy'  => 'Стратегия восстановления:',
	'ext_legend'      => 'Дополнительные опции:',
	'correct'         => 'Коррекция кодировки',
	'autoinc'         => 'Обнулить AUTO_INCREMENT',

// Лог
	'status_current'  => 'Текущий статус:',
	'status_total'    => 'Общий статус:',
	'time_elapsed'    => 'Прошло:',
	'time_left'       => 'Осталось:',
	'btn_stop'        => 'Прервать',
	'btn_pause'       => 'Пауза',
	'btn_resume'      => 'Продолжить',
	'btn_again'       => 'Повторить',
	'btn_clear'       => 'Очистить лог',

// Файлы
	'btn_delete'      => 'Удалить',
	'btn_download'    => 'Скачать',
	'btn_open'        => 'Открыть',

// Сервисы
	'opt_check'       => 'Опции для Проверить:',
	'opt_repair'      => 'Опции для Починить:',
	'btn_delete_db'   => 'Удалить БД',
	'btn_check'       => 'Проверить',
	'btn_repair'      => 'Починить',
	'btn_analyze'     => 'Анализировать',
	'btn_optimize'    => 'Оптимизировать',

// Опции
	'cfg_legend'      => 'Основные настройки:',
	'cfg_time_web'    => 'Время выполнения в web (сек.):',
	'cfg_time_cron'   => 'Время выполнения в cron (сек.):',
	'cfg_backup_path' => 'Путь к каталогу backup:',
	'cfg_backup_url'  => 'URL к каталогу backup:',
	'cfg_globstat'    => 'Глобальная статистика:',
	'cfg_extended'    => 'Расширенные настройки:',
	'cfg_charsets'    => 'Фильтр для кодировок:',
	'cfg_only_create' => 'Бэкап только структуры:',
	'cfg_auth'        => 'Цепочка авторизации:',
	'cfg_confirm'     => 'Спрашивать подтверждение для:',
	'cfg_conf_import' => 'импорта БД',
	'cfg_conf_file'   => 'удаления файла',
	'cfg_conf_db'     => 'удаления БД',

// Соединение
	'con_header'      => 'Параметры соединения',
	'connect'         => 'Соединение',
	'my_host'         => 'Хост:',
	'my_port'         => 'Порт:',
	'my_user'         => 'Пользователь:',
	'my_pass'         => 'Пароль:',
	'my_pass_hidden'  => 'Пароль не показан',
	'my_comp'         => 'Протокол со сжатием',
	'my_db'           => 'Базы данных:',
	'btn_cancel'      => 'Отмена',

// Сохранение задания
	'sj_header'       => 'Сохранение задания',
	'sj_job'          => 'Задание',
	'sj_name'         => 'Имя (англ.):',
	'sj_title'        => 'Описание:',

// Создание БД
	'cdb_header'      => 'Создание базы данных',
	'cdb_detail'      => 'Детали',
	'cdb_name'        => 'Название:',
	'combo_collate'   => 'Сравнение',
	'btn_create'      => 'Создать',

// Авторизация
	'js_required'     => 'JavaScript должен быть включен',
	'auth'            => 'Авторизация',
	'auth_user'       => 'Пользователь:',
	'auth_remember'   => 'Запомнить',
	'btn_enter'       => 'Войти',
	'btn_details'     => 'Детали',

// Сообщения в логе
	'not_found_rtl'   => 'Отсутствует RTL-файл',
	'backup_begin'    => 'Начало экспорта БД `%s`',
	'backup_TC'       => 'Экспорт таблицы `%s`',
	'backup_VI'       => 'Экспорт представления `%s`',
	'backup_PR'       => 'Экспорт процедуры `%s`',
	'backup_FU'       => 'Экспорт функции `%s`',
	'backup_EV'       => 'Экспорт события `%s`',
	'backup_TR'       => 'Экспорт триггера `%s`',
	'continue_from'   => 'с позиции %s',
	'backup_end'      => 'Резервная копия БД `%s` создана.',
	'autodelete'      => 'Автоудаление старых файлов:',
	'del_by_date'     => '- `%s` - удален (по дате)',
	'del_by_count'    => '- `%s` - удален (по дате)',
	'del_fail'        => '- `%s` - удалить не удалось',
	'del_nothing'     => '- нет файлов для удаления',
	'set_names'       => 'Установлена кодировка соединения: `%s`',
	'restore_begin'   => 'Начало импорта БД `%s`',
	'restore_TC'      => 'Импорт таблицы `%s`',
	'restore_VI'      => 'Импорт представления `%s`',
	'restore_PR'      => 'Импорт процедуры `%s`',
	'restore_FU'      => 'Импорт функции `%s`',
	'restore_EV'      => 'Импорт события `%s`',
	'restore_TR'      => 'Импорт триггера `%s`',
	'restore_keys'    => 'Включение индексов',
	'restore_end'     => 'БД `%s` восстановлена из резервной копии.',
	'stop_1'          => 'Выполнение прервано пользователем',
	'stop_2'          => 'Выполнение остановлено пользователем',
	'stop_3'          => 'Выполнение остановлено по таймеру',
	'stop_4'          => 'Выполнение остановлено по таймауту',
	'stop_5'          => 'Выполнение прервано из-за ошибки',
	'job_done'        => 'Задание успешно выполнено',
	'file_size'       => 'Размер файла',
	'job_time'        => 'Времени затрачено',
	'seconds'         => 'сек.',
	'job_freeze'      => 'Процесс не обновлялся более 30 секунд. Нажмите Продолжить',
	'stop_job'        => 'Запрос на остановку',

// Надписи в JS
	'js'              => [

		// Названия вкладок
		'backup'       => 'Экспорт базы данных',
		'restore'      => 'Импорт базы данных',
		'log'          => 'Лог действий',
		'result'       => 'Результат выполнения',
		'files'        => 'Файлы резервных копий',
		'services'     => 'Сервисы',
		'options'      => 'Опции',

		// Заголовки таблиц
		'dt'           => 'Дата и время',
		'action'       => 'Действие',
		'db'           => 'База данных',
		'type'         => 'Тип',
		'tab'          => 'Табл.',
		'records'      => 'Записей',
		'size'         => 'Размер',
		'comment'      => 'Комментарий',

		// Статусы
		'load'         => 'Загрузка',
		'run'          => 'Выполнение...',
		'sdb'          => 'Создание базы данных',
		'sc'           => 'Сохранение соединения',
		'sj'           => 'Сохранение задания',
		'so'           => 'Сохранение опций',

		// Сообщения
		'pro'          => 'Опция доступна только в Pro-версии',
		'err_fopen'    => 'Не удается открыть файл',
		'err_sod'     => 'Просмотр содержимого файла доступен только для файлов созданных sOneDumper',
		'err_empty_db' => 'База данных пустая',
		'fdc'          => 'Вы действительно хотите удалить файл?',
		'ddc'          => 'Вы действительно хотите удалить базу данных?',
		'fic'          => 'Вы действительно хотите импортировать файл?',

		// Сокращения размеров файла
		'sizes'        => ['Б', 'КБ', 'МБ', 'ГБ'],
	],
];


﻿<?php

declare(strict_types = 1);

$LNG = [

// Информация о файле локализации
	'name'            => 'Українська', // Название языка

// Панель инструментов
	'tbar_backup'     => 'Експорт',
	'tbar_restore'    => 'Імпорт',
	'tbar_files'      => 'Файли',
	'tbar_services'   => 'Сервіси',
	'tbar_options'    => 'Опції',
	'tbar_createdb'   => 'Створити БД',
	'tbar_connects'   => 'З’єднання',
	'tbar_exit'       => 'Вихід',

// Названия объектов в дереве
	'obj_tables'      => 'Таблиці',
	'obj_views'       => 'Представлення',
	'obj_procs'       => 'Процедури',
	'obj_funcs'       => 'Функції',
	'obj_trigs'       => 'Тригери',
	'obj_events'      => 'Події',

// Экспорт
	'zip_max'         => 'максимум',
	'zip_min'         => 'мінімум',
	'zip_none'        => 'Без стиснення',
	'default'         => 'стандартно',
	'combo_db'        => 'База даних:',
	'combo_charset'   => 'Кодування:',
	'combo_zip'       => 'Стиснення:',
	'combo_comments'  => 'Коментар:',
	'del_legend'      => 'Автовидалення, якщо:',
	'del_date'        => 'файлам більше %s днів',
	'del_count'       => 'кількість файлів понад %s',
	'tree'            => 'Виберіть об’єкти:',
	'no_saved'        => 'Немає збережених завдань',
	'btn_save'        => 'Зберегти',
	'btn_exec'        => 'Виконати',

// Импорт
	'combo_file'      => 'Файл:',
	'combo_strategy'  => 'Стратегія відновлення:',
	'ext_legend'      => 'Додаткові опції:',
	'correct'         => 'Корекція кодування',
	'autoinc'         => 'Обнулити AUTO_INCREMENT',

// Лог
	'status_current'  => 'Поточний статус:',
	'status_total'    => 'Загальний статус:',
	'time_elapsed'    => 'Пройшло:',
	'time_left'       => 'Залишилося:',
	'btn_stop'        => 'Перервати',
	'btn_pause'       => 'Пауза',
	'btn_resume'      => 'Продовжити',
	'btn_again'       => 'Повторити',
	'btn_clear'       => 'Очистити лог',

// Файлы
	'btn_delete'      => 'Видалити',
	'btn_download'    => 'Завантажити',
	'btn_open'        => 'Відкрити',

// Сервисы
	'opt_check'       => 'Опції для Перевірити:',
	'opt_repair'      => 'Опції для Полагодити:',
	'btn_delete_db'   => 'Видалити БД',
	'btn_check'       => 'Перевірити',
	'btn_repair'      => 'Полагодити',
	'btn_analyze'     => 'Аналізувати',
	'btn_optimize'    => 'Оптимізувати',

// Опции
	'cfg_legend'      => 'Основні налаштування:',
	'cfg_time_web'    => 'Час виконання у web (сек.):',
	'cfg_time_cron'   => 'Час виконання у cron (сек.):',
	'cfg_backup_path' => 'Шлях до каталогу backup:',
	'cfg_backup_url'  => 'URL до каталогу backup:',
	'cfg_globstat'    => 'Глобальна статистика:',
	'cfg_extended'    => 'Розширені налаштування:',
	'cfg_charsets'    => 'Фільтр для кодувань:',
	'cfg_only_create' => 'Бекап лише структури:',
	'cfg_auth'        => 'Ланцюжок авторизації:',
	'cfg_confirm'     => 'Запитувати підтвердження для:',
	'cfg_conf_import' => 'імпорту БД',
	'cfg_conf_file'   => 'видалення файлу',
	'cfg_conf_db'     => 'видалення БД',

// Соединение
	'con_header'      => 'Параметри з’єднання',
	'connect'         => 'З’єднання',
	'my_host'         => 'Хост:',
	'my_port'         => 'Порт:',
	'my_user'         => 'Користувач:',
	'my_pass'         => 'Пароль:',
	'my_pass_hidden'  => 'Пароль не відображається',
	'my_comp'         => 'Протокол із стисненням',
	'my_db'           => 'Бази даних:',
	'btn_cancel'      => 'Відміна',

// Сохранение задания
	'sj_header'       => 'Збереження завдання',
	'sj_job'          => 'Завдання',
	'sj_name'         => 'Ім’я (англ.):',
	'sj_title'        => 'Опис:',

// Создание БД
	'cdb_header'      => 'Створення бази даних',
	'cdb_detail'      => 'Деталі',
	'cdb_name'        => 'Назва:',
	'combo_collate'   => 'Порівняння',
	'btn_create'      => 'Створити',

// Авторизация
	'js_required'     => 'JavaScript має бути ввімкнено',
	'auth'            => 'Авторизація',
	'auth_user'       => 'Користувач:',
	'auth_remember'   => 'Запам’ятати',
	'btn_enter'       => 'Увійти',
	'btn_details'     => 'Деталі',

// Сообщения в логе
	'not_found_rtl'   => 'Відсутній RTL-файл',
	'backup_begin'    => 'Початок експорту БД `%s`',
	'backup_TC'       => 'Експорт таблиці `%s`',
	'backup_VI'       => 'Експорт представлення `%s`',
	'backup_PR'       => 'Експорт процедури `%s`',
	'backup_FU'       => 'Експорт функції `%s`',
	'backup_EV'       => 'Експорт події `%s`',
	'backup_TR'       => 'Експорт тригера `%s`',
	'continue_from'   => 'з позиції %s',
	'backup_end'      => 'Резервна копія БД `%s` створена.',
	'autodelete'      => 'Автовидалення старих файлів:',
	'del_by_date'     => '- `%s` - видалений (по даті)',
	'del_by_count'    => '- `%s` - видалений (по даті)',
	'del_fail'        => '- `%s` - видалити не вдалося',
	'del_nothing'     => '- немає файлів для видалення',
	'set_names'       => 'Встановлено кодування з’єднання: `%s`',
	'restore_begin'   => 'Початок імпорту БД `%s`',
	'restore_TC'      => 'Імпорт таблиці `%s`',
	'restore_VI'      => 'Імпорт представлення `%s`',
	'restore_PR'      => 'Імпорт процедури `%s`',
	'restore_FU'      => 'Імпорт функції `%s`',
	'restore_EV'      => 'Імпорт події `%s`',
	'restore_TR'      => 'Імпорт тригера `%s`',
	'restore_keys'    => 'Включення індексів',
	'restore_end'     => 'БД `%s` відновлена з резервної копії.',
	'stop_1'          => 'Виконання перервано користувачем',
	'stop_2'          => 'Виконання зупинено користувачем',
	'stop_3'          => 'Виконання зупинено по таймеру',
	'stop_4'          => 'Виконання зупинено по таймауту',
	'stop_5'          => 'Виконання перервано із-за помилки',
	'job_done'        => 'Завдання успішно виконано',
	'file_size'       => 'Розмір файлу',
	'job_time'        => 'Часу витрачено',
	'seconds'         => 'сек.',
	'job_freeze'      => 'Процес не оновлювався більше 30 секунд. Натисніть Продовжити',
	'stop_job'        => 'Запит на зупинку',

// Надписи в JS
	'js'              => [

		// Названия вкладок
		'backup'       => 'Експорт бази даних',
		'restore'      => 'Імпорт бази даних',
		'log'          => 'Лог дій',
		'result'       => 'Результат виконання',
		'files'        => 'Файли резервних копій',
		'services'     => 'Сервіси',
		'options'      => 'Опції',

		// Заголовки таблиц
		'dt'           => 'Дата і час',
		'action'       => 'Дія',
		'db'           => 'База даних',
		'type'         => 'Тип',
		'tab'          => 'Табл.',
		'records'      => 'Записів',
		'size'         => 'Розмір',
		'comment'      => 'Коментар',

		// Статусы
		'load'         => 'Завантаження',
		'run'          => 'Виконання...',
		'sdb'          => 'Створення бази даних',
		'sc'           => 'Збереження з’єднання',
		'sj'           => 'Збереження завдання',
		'so'           => 'Збереження опцій',

		// Сообщения
		'pro'          => 'Опція доступна лише у версії Pro',
		'err_fopen'    => 'Не вдається відкрити файл',
		'err_sod'     => 'Перегляд вмісту файлу доступний лише для файлів створених sOneDumper',
		'err_empty_db' => 'База даних порожня',
		'fdc'          => 'Ви дійсно бажаєте видалити файл?',
		'ddc'          => 'Ви дійсно бажаєте видалити базу даних?',
		'fic'          => 'Ви дійсно бажаєте імпортувати файл?',

		// Сокращения размеров файла
		'sizes'        => ['Б', 'КБ', 'МБ', 'ГБ'],
	],
];


<?php
// Language File for sOneDumper
$LNG = array(

// Information about the language file
'name'				=> 'Français', // Lang name

// Toolbar
'tbar_backup'		=> 'Exporter',
'tbar_restore'		=> 'Importer', 
'tbar_files'		=> 'Fichiers',
'tbar_services'		=> 'Services',
'tbar_options'		=> 'Options',
'tbar_createdb'		=> 'Créer DB',
'tbar_connects'		=> 'Connection',
'tbar_exit'			=> 'Quitter',

// Names of objects in the tree
'obj_tables'		=> 'Tables',
'obj_views'			=> 'Vues',
'obj_procs'			=> 'Procédures',
'obj_funcs'			=> 'Fonctions',
'obj_trigs'			=> 'Déclencheurs',
'obj_events'		=> 'Evénements',

// Export
'zip_max'			=> 'maximale',
'zip_min'			=> 'minimale',
'zip_none'			=> 'Non compressé',
'default'			=> 'défaut',
'combo_db'			=> 'Base de données (Schema):', 
'combo_charset'		=> 'Encodage:', 
'combo_zip'			=> 'Compression:', 
'combo_comments'	=> 'Commentaire:',
'del_legend'		=> 'Supprimé si la:',
'del_date'			=> 'âge de plus de fichiers que %s jours',
'del_count'			=> 'nombre de fichiers de plus de %s',
'tree'				=> 'Sélectionner les objets:',
'no_saved'			=> 'Pas de projet Enregistrer',
'btn_save'			=> 'Enregistrer',
'btn_exec'			=> 'Exécuter',

// Import	
'combo_file'		=> 'Fichier:',
'combo_strategy'	=> 'Stratégie de restauration:',
'ext_legend'		=> 'Options d’extension:',
'correct'			=> 'Correction de l’encodage',
'autoinc'			=> 'Reset AUTO_INCREMENT',

// Log
'status_current'	=> 'Situation actuelle:',
'status_total'		=> 'Statistiques globales:',
'time_elapsed'		=> 'Passé:',
'time_left'			=> 'Gauche:',
'btn_stop'			=> 'Abandonné',
'btn_pause'			=> 'Pause',
'btn_resume'		=> 'Contunuier',
'btn_again'			=> 'Répétez',
'btn_clear'			=> 'Effacer journal',

// Files
'btn_delete'		=> 'Supprimer',
'btn_download'		=> 'Télécharger',
'btn_open'			=> 'Ouvrir',

// Services
'opt_check'			=> 'Options d’Examen:',
'opt_repair'		=> 'Options de réparation:',
'btn_delete_db'		=> 'Supprimer DB',
'btn_check'			=> 'Examen',
'btn_repair'		=> 'Réparation',
'btn_analyze'		=> 'Analyse',
'btn_optimize'		=> 'Optimiser',

// Options
'cfg_legend'		=> 'Réglages de base:',
'cfg_time_web'		=> 'Temps web (seconds):',
'cfg_time_cron'		=> 'Temps crono (seconds):',
'cfg_backup_path'	=> 'Dossier de sauvegarde:',
'cfg_backup_url'	=> 'Lien du dossier de sauvegarde:',
'cfg_globstat'		=> 'Statistiques globales:',
'cfg_extended'		=> 'Réglages avancé:',
'cfg_charsets'		=> 'Filtre de caractères:',
'cfg_only_create'	=> 'Seule la création de types:',
'cfg_auth'			=> 'chaîne autorisée:',
'cfg_confirm'		=> 'Demander confirmation pour:',
'cfg_conf_import'	=> 'importer',
'cfg_conf_file'		=> 'Suppression de fichier',
'cfg_conf_db'		=> 'Base de données supprimer',

// Connection
'con_header'		=> 'Paramètres de connexion',
'connect'			=> 'Connection',
'my_host'			=> 'Hébergeur:',
'my_port'			=> 'Port:',
'my_user'			=> 'Utilisateur:',
'my_pass'			=> 'Mot de passe:',
'my_pass_hidden'	=> 'Mot de passe ne s’affiche pas',
'my_comp'			=> 'Protocole de compression',
'my_db'				=> 'Bases de données:',
'btn_cancel'		=> 'Annuler',

// Enregistrer Le Projet
'sj_header'			=> 'Enregistrer le Projet',
'sj_job'			=> 'Projet',
'sj_name'			=> 'Nom (eng.):',
'sj_title'			=> 'Description:',

// Create DB
'cdb_header'		=> 'Créer une nouvelle base de données',
'cdb_detail'		=> 'Details',
'cdb_name'			=> 'Nom:',
'combo_collate'		=> 'Collections:',
'btn_create'		=> 'Créer',

// Authorization
'js_required'		=> 'JavaScript doit être activé',
'auth'				=> 'Authentification',
'auth_user'			=> 'Nom d’utilisateur:',
'auth_remember'		=> 'Se souvenir de moi',
'btn_enter'			=> 'Enter',
'btn_details'		=> 'Details',

// Log messages
'not_found_rtl'		=> 'Le fichier RTL n’existe pas',
'backup_begin'		=> 'Démarrez l’exportation DB `%s`',
'backup_TC'			=> 'Export tableau `%s`',
'backup_VI'			=> 'Export affichage `%s`',
'backup_PR'			=> 'Export procédure `%s`',
'backup_FU'			=> 'Export fonction `%s`',
'backup_EV'			=> 'Export événement `%s`',
'backup_TR'			=> 'Export déclencher `%s`',
'continue_from'		=> 'à partir de positions %s',
'backup_end'		=> 'Exportation de la base de données (Schema) `%s` fini.',
'autodelete'		=> 'Suppression auto des anciens fichiers:',
'del_by_date'		=> '- `%s` - supprimé (par date)',
'del_by_count'		=> '- `%s` - supprimé (par le comte)',
'del_fail'			=> '- `%s` - échec de la suppression',
'del_nothing'		=> '- pas de fichier à supprimer',
'set_names'			=> 'Jeu d’encodage de connexion: `%s`',
'restore_begin'		=> 'Commencer l’importationt DB `%s`',
'restore_TC'		=> 'l’importationt tableau `%s`',
'restore_VI'		=> 'l’importationt affichage `%s`',
'restore_PR'		=> 'l’importationt procédure `%s`',
'restore_FU'		=> 'l’importationt fonction `%s`',
'restore_EV'		=> 'l’importationt événement `%s`',
'restore_TR'		=> 'l’importationt déclencher `%s`',
'restore_keys'		=> 'Activer les indexes',
'restore_end'		=> 'DB `%s` restauré à partir d’une sauvegarde.',
'stop_1'			=> 'Exécution interrompue par l’utilisateur', 
'stop_2'			=> 'Exécution stoppée par l’utilisateur',
'stop_3'			=> 'Exécution arrêté par temporisateur',
'stop_4'			=> 'Exécution arrêtée par timeout',
'stop_5'			=> 'Exécution abandonnée en raison d’une erreur',
'job_done'			=> 'Travail réussie',
'file_size'			=> 'Taille du fichier',
'job_time'			=> 'Temps passé',
'seconds'			=> 'seconds',
'job_freeze'		=> 'Le processus n’a pas été mis à jour depuis plus de 30 secondes. Cliquez sur Reprendre',
'stop_job'			=> 'Demande d’arrêt',

// For JS
'js' => array(
	
// Tabs names
'backup'		=> 'Exporter la base de données (schema)',
'restore'		=> 'Importer la base de données (schema)',
'log'			=> 'Log',
'result'		=> 'Résultats',
'files'			=> 'Fichier',
'services'		=> 'Services',
'options'		=> 'Options',

// Tables header
'dt'			=> 'Date/heure',
'action'		=> 'Action',
'db'			=> 'Base de données',
'type'			=> 'Type',
'tab'			=> 'Tables',
'records'		=> 'Records',
'size'			=> 'Taille',
'comment'		=> 'Commentaires',

// AJAX Status
'load'			=> 'Chargement',
'run'			=> 'Progression...',
'sdb'			=> 'Créer une nouvelle base de données',
'sc'			=> 'Enregistrer la Connexion',
'sj'			=> 'Enregistrer le projet',
'so'			=> 'Enregistrer les options',

// Messages
'pro'			=> 'Option disponible uniquement en version Pro',
'err_fopen'		=> 'Impossible d’ouvrir le fichier',
'err_sod'		=> 'Voir le contenu du fichier disponible uniquement pour les fichiers créés par sOneDumper',
'err_empty_db'	=> 'Base de données est vide',
'fdc'			=> 'Voulez-vous vraiment supprimer le fichier?',
'ddc'			=> 'Voulez-vous vraiment supprimer la Base de données?',
'fic'			=> 'Voulez-vous vraiment à l’importez le fichiers?',

// Sizes
'sizes'			=> array('B', 'KB', 'MB', 'GB'),
)
);
?>
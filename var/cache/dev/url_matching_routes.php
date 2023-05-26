<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
        '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
        '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
        '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
        '/_profiler/xdebug' => [[['_route' => '_profiler_xdebug', '_controller' => 'web_profiler.controller.profiler::xdebugAction'], null, null, null, false, false, null]],
        '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
        '/admin/accreditation-index' => [[['_route' => 'app_accreditation_index', '_controller' => 'App\\Controller\\Admin\\AccreditationProController::index'], null, null, null, false, false, null]],
        '/admin' => [[['_route' => 'app_admin_index', '_controller' => 'App\\Controller\\Admin\\AdminController::index'], null, ['GET' => 0], null, true, false, null]],
        '/admin/manage-admin' => [[['_route' => 'app_admin_manage', '_controller' => 'App\\Controller\\Admin\\AdminController::manageAdmin'], null, ['GET' => 0], null, false, false, null]],
        '/admin/demandes' => [[['_route' => 'app_demandes_index', '_controller' => 'App\\Controller\\Admin\\DemandesController::index'], null, ['GET' => 0], null, true, false, null]],
        '/admin/demandes/new' => [[['_route' => 'app_demandes_new', '_controller' => 'App\\Controller\\Admin\\DemandesController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/admin/evenement' => [[['_route' => 'app_evenement_index', '_controller' => 'App\\Controller\\Admin\\EvenementController::index'], null, ['GET' => 0], null, true, false, null]],
        '/admin/evenement/new' => [[['_route' => 'app_evenement_new', '_controller' => 'App\\Controller\\Admin\\EvenementController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/admin/service' => [[['_route' => 'app_service_index', '_controller' => 'App\\Controller\\Admin\\ServiceController::index'], null, ['GET' => 0], null, true, false, null]],
        '/admin/service/new' => [[['_route' => 'app_service_new', '_controller' => 'App\\Controller\\Admin\\ServiceController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/admin/utilisateur' => [[['_route' => 'app_user_index', '_controller' => 'App\\Controller\\Admin\\UtilisateurController::index'], null, ['GET' => 0], null, true, false, null]],
        '/commentaire' => [[['_route' => 'app_commentaire_index', '_controller' => 'App\\Controller\\CommentaireController::index'], null, ['GET' => 0], null, true, false, null]],
        '/commentaire/new' => [[['_route' => 'app_commentaire_new', '_controller' => 'App\\Controller\\CommentaireController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/discussion' => [[['_route' => 'app_discussion_index', '_controller' => 'App\\Controller\\DiscussionController::index'], null, ['GET' => 0], null, true, false, null]],
        '/discussion/new' => [[['_route' => 'app_discussion_new', '_controller' => 'App\\Controller\\DiscussionController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/disponibilite' => [[['_route' => 'app_disponibilite_index', '_controller' => 'App\\Controller\\DisponibiliteController::index'], null, ['GET' => 0], null, true, false, null]],
        '/disponibilite/new' => [[['_route' => 'app_disponibilite_new', '_controller' => 'App\\Controller\\DisponibiliteController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/favori' => [[['_route' => 'app_favori_index', '_controller' => 'App\\Controller\\FavoriController::index'], null, ['GET' => 0], null, true, false, null]],
        '/favori/new' => [[['_route' => 'app_favori_new', '_controller' => 'App\\Controller\\FavoriController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/' => [
            [['_route' => 'app_home', '_controller' => 'App\\Controller\\HomeController::index'], null, null, null, false, false, null],
            [['_route' => 'app_main', '_controller' => 'App\\Controller\\MainController::index'], null, null, null, false, false, null],
            [['_route' => 'app_search_info', '_controller' => 'App\\Controller\\MainController::search_info'], null, null, null, false, false, null],
        ],
        '/anniversaire' => [[['_route' => 'app_anniversaire', '_controller' => 'App\\Controller\\HomeController::Anniversaire'], null, null, null, false, false, null]],
        '/mariage' => [[['_route' => 'app_mariage', '_controller' => 'App\\Controller\\HomeController::Mariage'], null, null, null, false, false, null]],
        '/naissance' => [[['_route' => 'app_naissance', '_controller' => 'App\\Controller\\HomeController::Naissance'], null, null, null, false, false, null]],
        '/soiree-privee' => [[['_route' => 'app_soiree_privee', '_controller' => 'App\\Controller\\HomeController::soireePrivee'], null, null, null, false, false, null]],
        '/message' => [[['_route' => 'app_message_index', '_controller' => 'App\\Controller\\MessageController::index'], null, ['GET' => 0], null, true, false, null]],
        '/message/new' => [[['_route' => 'app_message_new', '_controller' => 'App\\Controller\\MessageController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/admin/option-service' => [[['_route' => 'app_option_service_index', '_controller' => 'App\\Controller\\OptionServiceController::index'], null, null, null, true, false, null]],
        '/admin/option-service/new' => [[['_route' => 'app_option_service_new', '_controller' => 'App\\Controller\\OptionServiceController::new'], null, null, null, false, false, null]],
        '/profil/demandes' => [[['_route' => 'app_demandes_account_index', '_controller' => 'App\\Controller\\Profile\\AccountDemandesController::index'], null, ['GET' => 0], null, true, false, null]],
        '/profil/demandes/new' => [[['_route' => 'app_demandes_account_new', '_controller' => 'App\\Controller\\Profile\\AccountDemandesController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/profil/service' => [[['_route' => 'app_service_account_index', '_controller' => 'App\\Controller\\Profile\\AccountServiceController::index'], null, ['GET' => 0], null, true, false, null]],
        '/profil/service/mes-services' => [[['_route' => 'app_service_account_index_myServices', '_controller' => 'App\\Controller\\Profile\\AccountServiceController::indexMyServices'], null, ['GET' => 0], null, false, false, null]],
        '/profil/service/demandes-pour-mes-services' => [[['_route' => 'app_service_account_index_proposition', '_controller' => 'App\\Controller\\Profile\\AccountServiceController::indexProposition'], null, ['GET' => 0], null, false, false, null]],
        '/profil/service/new' => [[['_route' => 'app_service_account_new', '_controller' => 'App\\Controller\\Profile\\AccountServiceController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/profil' => [[['_route' => 'app_profile', '_controller' => 'App\\Controller\\Profile\\ProfileController::profil'], null, null, null, true, false, null]],
        '/register' => [[['_route' => 'app_register', '_controller' => 'App\\Controller\\Security\\RegistrationController::register'], null, null, null, false, false, null]],
        '/verify/email' => [[['_route' => 'app_verify_email', '_controller' => 'App\\Controller\\Security\\RegistrationController::verifyUserEmail'], null, null, null, false, false, null]],
        '/login' => [[['_route' => 'app_login', '_controller' => 'App\\Controller\\Security\\SecurityController::login'], null, null, null, false, false, null]],
        '/logout' => [[['_route' => 'app_logout', '_controller' => 'App\\Controller\\Security\\SecurityController::logout'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_(?'
                    .'|error/(\\d+)(?:\\.([^/]++))?(*:38)'
                    .'|wdt/([^/]++)(*:57)'
                    .'|profiler/([^/]++)(?'
                        .'|/(?'
                            .'|search/results(*:102)'
                            .'|router(*:116)'
                            .'|exception(?'
                                .'|(*:136)'
                                .'|\\.css(*:149)'
                            .')'
                        .')'
                        .'|(*:159)'
                    .')'
                .')'
                .'|/admin/(?'
                    .'|([^/]++)/(?'
                        .'|accredidation\\-(?'
                            .'|accept(*:215)'
                            .'|refuse(*:229)'
                        .')'
                        .'|modify\\-admin(*:251)'
                    .')'
                    .'|demandes/([^/]++)(?'
                        .'|(*:280)'
                        .'|/edit(*:293)'
                        .'|(*:301)'
                    .')'
                    .'|evenement/([^/]++)(?'
                        .'|(*:331)'
                        .'|/edit(*:344)'
                        .'|(*:352)'
                    .')'
                    .'|service/([^/]++)(?'
                        .'|(*:380)'
                        .'|/edit(*:393)'
                        .'|(*:401)'
                    .')'
                .')'
                .'|/commentaire/([^/]++)(?'
                    .'|(*:435)'
                    .'|/edit(*:448)'
                    .'|(*:456)'
                .')'
                .'|/dis(?'
                    .'|cussion/([^/]++)(?'
                        .'|(*:491)'
                        .'|/edit(*:504)'
                        .'|(*:512)'
                    .')'
                    .'|ponibilite/([^/]++)(?'
                        .'|(*:543)'
                        .'|/edit(*:556)'
                        .'|(*:564)'
                    .')'
                .')'
                .'|/favori/(?'
                    .'|add/([^/]++)(*:597)'
                    .'|([^/]++)(?'
                        .'|(*:616)'
                        .'|/edit(*:629)'
                        .'|(*:637)'
                    .')'
                    .'|isFav/([^/]++)(*:660)'
                .')'
                .'|/service/([^/]++)(?'
                    .'|(*:689)'
                    .'|(*:697)'
                    .'|/demande(*:713)'
                .')'
                .'|/message/(?'
                    .'|([^/]++)(?'
                        .'|(*:745)'
                        .'|/edit(*:758)'
                    .')'
                    .'|reply/([^/]++)(*:781)'
                    .'|([^/]++)(*:797)'
                .')'
                .'|/profil/(?'
                    .'|demandes/([^/]++)(?'
                        .'|(*:837)'
                        .'|/(?'
                            .'|conv(*:853)'
                            .'|edit(*:865)'
                            .'|paiement(?'
                                .'|(*:884)'
                                .'|\\-c(?'
                                    .'|onfirm(*:904)'
                                    .'|ancel(*:917)'
                                .')'
                            .')'
                            .'|nouvelle\\-date(*:941)'
                            .'|add\\-note(*:958)'
                        .')'
                        .'|(*:967)'
                    .')'
                    .'|service/(?'
                        .'|demandes\\-pour\\-mes\\-services/([^/]++)(?'
                            .'|(*:1028)'
                            .'|/(?'
                                .'|nouvelle\\-date(?'
                                    .'|(*:1058)'
                                    .'|\\-confirm(*:1076)'
                                .')'
                                .'|accept\\-demande(*:1101)'
                                .'|refuse\\-demande(*:1125)'
                            .')'
                        .')'
                        .'|mes\\-services/(?'
                            .'|([^/]++)(?'
                                .'|(*:1164)'
                                .'|/disponibilite(*:1187)'
                            .')'
                            .'|disponibilite/([^/]++)(*:1219)'
                        .')'
                        .'|([^/]++)(?'
                            .'|/(?'
                                .'|edit(*:1248)'
                                .'|avertir\\-note(*:1270)'
                                .'|send\\-email\\-pro(*:1295)'
                            .')'
                            .'|(*:1305)'
                        .')'
                    .')'
                    .'|([^/]++)/edit\\-picture\\-user(*:1344)'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        38 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        57 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        102 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        116 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        136 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception_panel::body'], ['token'], null, null, false, false, null]],
        149 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception_panel::stylesheet'], ['token'], null, null, false, false, null]],
        159 => [[['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null]],
        215 => [[['_route' => 'app_accreditation_accept', '_controller' => 'App\\Controller\\Admin\\AccreditationProController::accredidationAccept'], ['id'], null, null, false, false, null]],
        229 => [[['_route' => 'app_accreditation_refuse', '_controller' => 'App\\Controller\\Admin\\AccreditationProController::accredidationRefuse'], ['id'], null, null, false, false, null]],
        251 => [[['_route' => 'app_admin_edit', '_controller' => 'App\\Controller\\Admin\\AdminController::modifyAdmin'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        280 => [[['_route' => 'app_demandes_show', '_controller' => 'App\\Controller\\Admin\\DemandesController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        293 => [[['_route' => 'app_demandes_edit', '_controller' => 'App\\Controller\\Admin\\DemandesController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        301 => [[['_route' => 'app_demandes_delete', '_controller' => 'App\\Controller\\Admin\\DemandesController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        331 => [[['_route' => 'app_evenement_show', '_controller' => 'App\\Controller\\Admin\\EvenementController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        344 => [[['_route' => 'app_evenement_edit', '_controller' => 'App\\Controller\\Admin\\EvenementController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        352 => [[['_route' => 'app_evenement_delete', '_controller' => 'App\\Controller\\Admin\\EvenementController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        380 => [[['_route' => 'app_service_show', '_controller' => 'App\\Controller\\Admin\\ServiceController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        393 => [[['_route' => 'app_service_edit', '_controller' => 'App\\Controller\\Admin\\ServiceController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        401 => [[['_route' => 'app_service_delete', '_controller' => 'App\\Controller\\Admin\\ServiceController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        435 => [[['_route' => 'app_commentaire_show', '_controller' => 'App\\Controller\\CommentaireController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        448 => [[['_route' => 'app_commentaire_edit', '_controller' => 'App\\Controller\\CommentaireController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        456 => [[['_route' => 'app_commentaire_delete', '_controller' => 'App\\Controller\\CommentaireController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        491 => [[['_route' => 'app_discussion_show', '_controller' => 'App\\Controller\\DiscussionController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        504 => [[['_route' => 'app_discussion_edit', '_controller' => 'App\\Controller\\DiscussionController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        512 => [[['_route' => 'app_discussion_delete', '_controller' => 'App\\Controller\\DiscussionController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        543 => [[['_route' => 'app_disponibilite_show', '_controller' => 'App\\Controller\\DisponibiliteController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        556 => [[['_route' => 'app_disponibilite_edit', '_controller' => 'App\\Controller\\DisponibiliteController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        564 => [[['_route' => 'app_disponibilite_delete', '_controller' => 'App\\Controller\\DisponibiliteController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        597 => [[['_route' => 'app_favori_add', '_controller' => 'App\\Controller\\FavoriController::add'], ['id'], ['GET' => 0, 'POST' => 1], null, false, true, null]],
        616 => [[['_route' => 'app_favori_show', '_controller' => 'App\\Controller\\FavoriController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        629 => [[['_route' => 'app_favori_edit', '_controller' => 'App\\Controller\\FavoriController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        637 => [[['_route' => 'app_favori_delete', '_controller' => 'App\\Controller\\FavoriController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        660 => [[['_route' => 'app_favori_is_fav', '_controller' => 'App\\Controller\\FavoriController::isFav'], ['id'], ['GET' => 0, 'POST' => 1], null, false, true, null]],
        689 => [[['_route' => 'app_home_service_show', '_controller' => 'App\\Controller\\HomeController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        697 => [[['_route' => 'app_home_service_categorie_show', '_controller' => 'App\\Controller\\HomeController::categorie_show'], ['categorie'], ['GET' => 0], null, false, true, null]],
        713 => [[['_route' => 'app_home_demande', '_controller' => 'App\\Controller\\HomeController::demande'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        745 => [[['_route' => 'app_message_show', '_controller' => 'App\\Controller\\MessageController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        758 => [[['_route' => 'app_message_edit', '_controller' => 'App\\Controller\\MessageController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        781 => [[['_route' => 'app_message_reply', '_controller' => 'App\\Controller\\MessageController::reply'], ['id'], ['GET' => 0, 'POST' => 1], null, false, true, null]],
        797 => [[['_route' => 'app_message_delete', '_controller' => 'App\\Controller\\MessageController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        837 => [[['_route' => 'app_demandes_account_show', '_controller' => 'App\\Controller\\Profile\\AccountDemandesController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        853 => [[['_route' => 'app_demandes_account_conv', '_controller' => 'App\\Controller\\Profile\\AccountDemandesController::conv'], ['id'], ['GET' => 0], null, false, false, null]],
        865 => [[['_route' => 'app_demandes_account_edit', '_controller' => 'App\\Controller\\Profile\\AccountDemandesController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        884 => [[['_route' => 'app_demandes_account_paiement', '_controller' => 'App\\Controller\\Profile\\AccountDemandesController::paiement'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        904 => [[['_route' => 'app_demandes_account_confirm_paiement', '_controller' => 'App\\Controller\\Profile\\AccountDemandesController::paiementConfirm'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        917 => [[['_route' => 'app_demandes_account_cancel_paiement', '_controller' => 'App\\Controller\\Profile\\AccountDemandesController::paiementCancel'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        941 => [[['_route' => 'app_demande_account_new_date', '_controller' => 'App\\Controller\\Profile\\AccountDemandesController::demandeNewDate'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        958 => [[['_route' => 'app_demande_account_add_note', '_controller' => 'App\\Controller\\Profile\\AccountDemandesController::addNote'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        967 => [[['_route' => 'app_demandes_account_delete', '_controller' => 'App\\Controller\\Profile\\AccountDemandesController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        1028 => [[['_route' => 'app_service_account_show_proposition', '_controller' => 'App\\Controller\\Profile\\AccountServiceController::showProposition'], ['id'], ['GET' => 0, 'POST' => 1], null, false, true, null]],
        1058 => [[['_route' => 'app_service_account_new_date', '_controller' => 'App\\Controller\\Profile\\AccountServiceController::serviceNewDate'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        1076 => [[['_route' => 'app_service_account_new_date_confirm', '_controller' => 'App\\Controller\\Profile\\AccountServiceController::serviceNewDateConfirm'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        1101 => [[['_route' => 'app_service_account_accept_new_date', '_controller' => 'App\\Controller\\Profile\\AccountServiceController::serviceDemandeAccept'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        1125 => [[['_route' => 'app_service_account_refuse_new_date', '_controller' => 'App\\Controller\\Profile\\AccountServiceController::serviceDemandeRefuse'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        1164 => [[['_route' => 'app_service_account_show', '_controller' => 'App\\Controller\\Profile\\AccountServiceController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        1187 => [[['_route' => 'app_service_account_disponibilite', '_controller' => 'App\\Controller\\Profile\\AccountServiceController::disponibilite'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        1219 => [[['_route' => 'app_service_account_remove_disponibilite', '_controller' => 'App\\Controller\\Profile\\AccountServiceController::removeDisponibilite'], ['id'], ['GET' => 0, 'POST' => 1], null, false, true, null]],
        1248 => [[['_route' => 'app_service_account_edit', '_controller' => 'App\\Controller\\Profile\\AccountServiceController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        1270 => [[['_route' => 'app_service_avertir_note', '_controller' => 'App\\Controller\\Profile\\AccountServiceController::avertirNote'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        1295 => [[['_route' => 'app_send_email_pro', '_controller' => 'App\\Controller\\Profile\\AccountServiceController::sendEmailPro'], ['id'], null, null, false, false, null]],
        1305 => [[['_route' => 'app_service_account_delete', '_controller' => 'App\\Controller\\Profile\\AccountServiceController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        1344 => [
            [['_route' => 'app_profile_edit_picture_user', '_controller' => 'App\\Controller\\Profile\\ProfileController::profilEditPicture'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];

<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* base.html.twig */
class __TwigTemplate_11fbe7761762e88cbfe0a179d3149a20 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'stylesheets' => [$this, 'block_stylesheets'],
            'javascripts' => [$this, 'block_javascripts'],
            'aside' => [$this, 'block_aside'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "base.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "base.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\">
        <title>";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        <link rel=\"icon\" href=\"data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 128 128%22><text y=%221.2em%22 font-size=%2296%22>⚫️</text></svg>\">
        ";
        // line 8
        echo "        ";
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 11
        echo "
        ";
        // line 12
        $this->displayBlock('javascripts', $context, $blocks);
        // line 15
        echo "    </head>
    <body>
        <header>
            <nav class=\"container navbar flex jcb aic\">
                <h1><a href=\"/\">Lucie</a></h1>
                <div class=\"search flex aic\">
                    <i class=\"fa fa-search\"></i>
                    <input type=\"text\" name=\"\" id=\"\" placeholder=\"Filtrez vos recherches ici\">
                    <form>
                        <img src=\"";
        // line 24
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/images/settings.svg"), "html", null, true);
        echo "\" alt=\"filtre\" class=\"btn-filter\">
                        <div class=\"filter-list\">
                            <div>
                                <button class=\"close-btn-filter\"><i class=\"fa-regular fa-circle-xmark\"></i></button>
                                <span>Filtres</span>
                            </div>
                            <hr />
                            <div>
                                <label>Fouchette de prix</label>
                                <div class=\"flex jcb container-price-filter\">
                                    <input type=\"number\" name=\"\" id=\"\" placeholder=\"Minimum\">
                                    <hr />
                                    <input type=\"number\" name=\"\" id=\"\" placeholder=\"Maximum\">
                                </div>
                                <label for=\"\">Date de l’événement et nombre de jours </label>
                                <div class=\"flex jcb\">
                                    <input type=\"text\" name=\"\" id=\"\" placeholder=\"JJ/MM/AAAA\">
                                    <hr />
                                    <input type=\"number\" name=\"\" id=\"\" placeholder=\"0\">
                                </div>
                            </div>
                            <hr />
                            <div>
                                <label for=\"\">Type d’évènement </label>
                                <div>
                                    <ul class=\"flex jcb fww\">
                                        <li class=\"flex aic\">
                                          <div class=\"btn-choise-event\" data-filter=\"mariage\"></div>
                                          <input type=\"checkbox\" name=\"mariage\" id=\"\" hidden>
                                          <label for=\"\">Mariage</label>
                                        </li>
                                        <li class=\"flex aic\">
                                          <div class=\"btn-choise-event\" data-filter=\"anniversaire\"></div>
                                          <input type=\"checkbox\" name=\"anniversaire\" id=\"\" hidden>
                                          <label for=\"\">Anniversaire</label>
                                        </li>
                                        <li class=\"flex aic\">
                                          <div class=\"btn-choise-event\" data-filter=\"bapteme_Barrmivah\"></div>
                                          <input type=\"checkbox\" name=\"bapteme_Barrmivah\" id=\"\" hidden>
                                          <label for=\"\">Baptème / Barrmivah</label>
                                        </li>
                                        <li class=\"flex aic\">
                                          <div class=\"btn-choise-event\" data-filter=\"soiree_privee\"></div>
                                          <input type=\"checkbox\" name=\"soiree_privee\" id=\"\" hidden>
                                          <label for=\"\">Soirée privée</label>
                                        </li>
                                        <li class=\"flex aic\">
                                          <div class=\"btn-choise-event\" data-filter=\"soiree_entreprise\"></div>
                                          <input type=\"checkbox\" name=\"soiree_entreprise\" id=\"\" hidden>
                                          <label for=\"\">Soirée d’entreprise</label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <hr />
                            <div>
                                <label for=\"\">Service</label>
                                <div>
                                    <ul class=\"flex jcb fww\">
                                        <li class=\"flex aic\">
                                            <div class=\"btn-choise-event\" data-filter=\"salle\"></div>
                                            <input type=\"checkbox\" name=\"salle\" id=\"\" hidden>
                                            <label for=\"\">Salle</label></li>
                                        <li class=\"flex aic\">
                                            <div class=\"btn-choise-event\" data-filter=\"traiteur\"></div>
                                            <input type=\"checkbox\" name=\"traiteur\" id=\"\" hidden>
                                            <label for=\"\">Traiteur</label>
                                        </li>
                                        <li class=\"flex aic\">
                                            <div class=\"btn-choise-event\" data-filter=\"wedding_planer\"></div>
                                            <input type=\"checkbox\" name=\"wedding_planer\" id=\"\" hidden>
                                            <label for=\"\">Wedding Planer</label>
                                        </li>
                                        <li class=\"flex aic\">
                                            <div class=\"btn-choise-event\" data-filter=\"dj\"></div>
                                            <input type=\"checkbox\" name=\"dj\" id=\"\" hidden>
                                            <label for=\"\">DJ</label>
                                        </li>
                                        <li class=\"flex aic\">
                                            <div class=\"btn-choise-event\" data-filter=\"orchestre\"></div>
                                            <input type=\"checkbox\" name=\"orchestre\" id=\"\" hidden>
                                            <label for=\"\">Orchestre</label>
                                        </li>
                                        <li class=\"flex aic\">
                                            <div class=\"btn-choise-event\" data-filter=\"decorateur\"></div>
                                            <input type=\"checkbox\" name=\"decorateur\" id=\"\" hidden>
                                            <label for=\"\">Décorateur</label>
                                        </li>
                                        <li class=\"flex aic\">
                                            <div class=\"btn-choise-event\" data-filter=\"fleuriste\"></div>
                                            <input type=\"checkbox\" name=\"fleuriste\" id=\"\" hidden>
                                            <label for=\"\">Fleuriste</label>
                                        </li>
                                        <li class=\"flex aic\">
                                            <div class=\"btn-choise-event\" data-filter=\"photo_vidéo\"></div>
                                            <input type=\"checkbox\" name=\"photo_vidéo\" id=\"\" hidden>
                                            <label for=\"\">Photo/ Vidéo</label>
                                        </li>
                                        <li class=\"flex aic\">
                                            <div class=\"btn-choise-event\" data-filter=\"maquillage\"></div>
                                            <input type=\"checkbox\" name=\"maquillage\" id=\"\" hidden>
                                            <label for=\"\">Maquillage </label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <hr />
                            <div>
                                <label for=\"\">Option de réservation </label>
                            </div>
                            <hr />
                            <div class=\"text-center\">
                                <button class=\"btn-valid-filter\">Valider</button>
                            </div>
                        </div>
                        
                    </form>
                </div>
                <ul class=\"flex jcb\">
                    <li class=\"flex\">
                        <a href=\"/favori\" class=\"flex aic\">
                            <i class=\"fa-regular fa-heart\"></i>
                            <span>Favori</span>
                        </a>
                    </li>
                    <li class=\"flex\">
                        <a href=\"/profil/demandes\" class=\"flex aic calendar-link\">
                            <i class=\"fa-regular fa-calendar-days\"></i>
                            <input type=\"date\" class=\"date-reservaton\" name=\"\" id=\"\">
                            <span>Réservations</span>
                        </a>
                    </li>
                    <li class=\"flex\">
                        <a href=\"/message\" class=\"flex aic\">
                            <i class=\"fa-regular fa-comment-dots\"></i>
                            <span>Messages</span>
                        </a>
                    </li>
                    <li class=\"flex\">
                        ";
        // line 163
        if (twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 163, $this->source); })()), "user", [], "any", false, false, false, 163)) {
            // line 164
            echo "                            <a href=\"/profil\" class=\"flex aic\">
                                <div style=\"display: flex; width: 20px; height: 20px;\">
                                    <img class=\"circle profil-picture\" title=\"";
            // line 166
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 166, $this->source); })()), "user", [], "any", false, false, false, 166), "userIdentifier", [], "any", false, false, false, 166), "html", null, true);
            echo "\" src=\"";
            echo twig_escape_filter($this->env, $this->extensions['Vich\UploaderBundle\Twig\Extension\UploaderExtension']->asset(twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 166, $this->source); })()), "user", [], "any", false, false, false, 166), "imageFile"), "html", null, true);
            echo "\">
                                </div>
                                <span>";
            // line 168
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 168, $this->source); })()), "user", [], "any", false, false, false, 168), "userIdentifier", [], "any", false, false, false, 168), "html", null, true);
            echo "</span>

                            </a>
                        ";
        } else {
            // line 172
            echo "                            <a href=\"/login\" class=\"flex aic\">
                                <span>Connexion</span>
                                <i class=\"fa-regular fa-circle-user\"></i>
                            </a>
                        ";
        }
        // line 177
        echo "                    </li>
                </ul>
            </nav>
        </header>
         ";
        // line 181
        $this->displayBlock('aside', $context, $blocks);
        // line 182
        echo "
        <main class=\"container\">
            ";
        // line 184
        $this->displayBlock('body', $context, $blocks);
        // line 185
        echo "        </main>

        <footer>
            <nav class=\"container flex jcb\">
            <div>
                <a href=\"#\" class=\"menu-title\">Mariage</a>
                <ul>
                    <li><a href=\"#\">Lorem, ipsum dolor.</a></li>
                    <li><a href=\"#\">Maiores, suscipit quisquam?</a></li>
                    <li><a href=\"#\">Quasi, omnis numquam?</a></li>
                    <li><a href=\"#\">Expedita, est modi?</a></li>
                    <li><a href=\"#\">Nostrum, dicta sapiente!</a></li>
                    <li><a href=\"#\">Harum, sed nulla?</a></li>
                    <li><a href=\"#\">Molestias, assumenda accusamus!</a></li>
                </ul>
            </div>
            <div>
                <a href=\"#\" class=\"menu-title\">Anniversaire</a>
                <ul>
                    <li><a href=\"#\">Lorem, ipsum dolor.</a></li>
                    <li><a href=\"#\">Maiores, suscipit quisquam?</a></li>
                    <li><a href=\"#\">Quasi, omnis numquam?</a></li>
                    <li><a href=\"#\">Expedita, est modi?</a></li>
                    <li><a href=\"#\">Nostrum, dicta sapiente!</a></li>
                    <li><a href=\"#\">Harum, sed nulla?</a></li>
                    <li><a href=\"#\">Molestias, assumenda accusamus!</a></li>
                </ul>
            </div>
            <div>
                <a href=\"#\" class=\"menu-title\">Soirée privée</a>
                <ul>
                    <li><a href=\"#\">Lorem, ipsum dolor.</a></li>
                    <li><a href=\"#\">Maiores, suscipit quisquam?</a></li>
                    <li><a href=\"#\">Quasi, omnis numquam?</a></li>
                    <li><a href=\"#\">Expedita, est modi?</a></li>
                    <li><a href=\"#\">Nostrum, dicta sapiente!</a></li>
                    <li><a href=\"#\">Harum, sed nulla?</a></li>
                    <li><a href=\"#\">Molestias, assumenda accusamus!</a></li>
                </ul>
            </div>
            <div>
                <a href=\"#\" class=\"menu-title\">Naissance</a>
                <ul>
                    <li><a href=\"#\">Lorem, ipsum dolor.</a></li>
                    <li><a href=\"#\">Maiores, suscipit quisquam?</a></li>
                    <li><a href=\"#\">Quasi, omnis numquam?</a></li>
                    <li><a href=\"#\">Expedita, est modi?</a></li>
                    <li><a href=\"#\">Nostrum, dicta sapiente!</a></li>
                    <li><a href=\"#\">Harum, sed nulla?</a></li>
                    <li><a href=\"#\">Molestias, assumenda accusamus!</a></li>
                </ul>
            </div>
                
            </nav>
        </footer>
    </body>
</html>
";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 5
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        echo "Welcome!";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    // line 8
    public function block_stylesheets($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 9
        echo "            ";
        echo $this->extensions['Symfony\WebpackEncoreBundle\Twig\EntryFilesTwigExtension']->renderWebpackLinkTags("app");
        echo "
        ";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    // line 12
    public function block_javascripts($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        // line 13
        echo "            ";
        echo $this->extensions['Symfony\WebpackEncoreBundle\Twig\EntryFilesTwigExtension']->renderWebpackScriptTags("app");
        echo "
        ";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    // line 181
    public function block_aside($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "aside"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "aside"));

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    // line 184
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    public function getTemplateName()
    {
        return "base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  411 => 184,  393 => 181,  380 => 13,  370 => 12,  357 => 9,  347 => 8,  328 => 5,  261 => 185,  259 => 184,  255 => 182,  253 => 181,  247 => 177,  240 => 172,  233 => 168,  226 => 166,  222 => 164,  220 => 163,  78 => 24,  67 => 15,  65 => 12,  62 => 11,  59 => 8,  54 => 5,  48 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\">
        <title>{% block title %}Welcome!{% endblock %}</title>
        <link rel=\"icon\" href=\"data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 128 128%22><text y=%221.2em%22 font-size=%2296%22>⚫️</text></svg>\">
        {# Run `composer require symfony/webpack-encore-bundle` to start using Symfony UX #}
        {% block stylesheets %}
            {{ encore_entry_link_tags('app') }}
        {% endblock %}

        {% block javascripts %}
            {{ encore_entry_script_tags('app') }}
        {% endblock %}
    </head>
    <body>
        <header>
            <nav class=\"container navbar flex jcb aic\">
                <h1><a href=\"/\">Lucie</a></h1>
                <div class=\"search flex aic\">
                    <i class=\"fa fa-search\"></i>
                    <input type=\"text\" name=\"\" id=\"\" placeholder=\"Filtrez vos recherches ici\">
                    <form>
                        <img src=\"{{ asset('build/images/settings.svg') }}\" alt=\"filtre\" class=\"btn-filter\">
                        <div class=\"filter-list\">
                            <div>
                                <button class=\"close-btn-filter\"><i class=\"fa-regular fa-circle-xmark\"></i></button>
                                <span>Filtres</span>
                            </div>
                            <hr />
                            <div>
                                <label>Fouchette de prix</label>
                                <div class=\"flex jcb container-price-filter\">
                                    <input type=\"number\" name=\"\" id=\"\" placeholder=\"Minimum\">
                                    <hr />
                                    <input type=\"number\" name=\"\" id=\"\" placeholder=\"Maximum\">
                                </div>
                                <label for=\"\">Date de l’événement et nombre de jours </label>
                                <div class=\"flex jcb\">
                                    <input type=\"text\" name=\"\" id=\"\" placeholder=\"JJ/MM/AAAA\">
                                    <hr />
                                    <input type=\"number\" name=\"\" id=\"\" placeholder=\"0\">
                                </div>
                            </div>
                            <hr />
                            <div>
                                <label for=\"\">Type d’évènement </label>
                                <div>
                                    <ul class=\"flex jcb fww\">
                                        <li class=\"flex aic\">
                                          <div class=\"btn-choise-event\" data-filter=\"mariage\"></div>
                                          <input type=\"checkbox\" name=\"mariage\" id=\"\" hidden>
                                          <label for=\"\">Mariage</label>
                                        </li>
                                        <li class=\"flex aic\">
                                          <div class=\"btn-choise-event\" data-filter=\"anniversaire\"></div>
                                          <input type=\"checkbox\" name=\"anniversaire\" id=\"\" hidden>
                                          <label for=\"\">Anniversaire</label>
                                        </li>
                                        <li class=\"flex aic\">
                                          <div class=\"btn-choise-event\" data-filter=\"bapteme_Barrmivah\"></div>
                                          <input type=\"checkbox\" name=\"bapteme_Barrmivah\" id=\"\" hidden>
                                          <label for=\"\">Baptème / Barrmivah</label>
                                        </li>
                                        <li class=\"flex aic\">
                                          <div class=\"btn-choise-event\" data-filter=\"soiree_privee\"></div>
                                          <input type=\"checkbox\" name=\"soiree_privee\" id=\"\" hidden>
                                          <label for=\"\">Soirée privée</label>
                                        </li>
                                        <li class=\"flex aic\">
                                          <div class=\"btn-choise-event\" data-filter=\"soiree_entreprise\"></div>
                                          <input type=\"checkbox\" name=\"soiree_entreprise\" id=\"\" hidden>
                                          <label for=\"\">Soirée d’entreprise</label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <hr />
                            <div>
                                <label for=\"\">Service</label>
                                <div>
                                    <ul class=\"flex jcb fww\">
                                        <li class=\"flex aic\">
                                            <div class=\"btn-choise-event\" data-filter=\"salle\"></div>
                                            <input type=\"checkbox\" name=\"salle\" id=\"\" hidden>
                                            <label for=\"\">Salle</label></li>
                                        <li class=\"flex aic\">
                                            <div class=\"btn-choise-event\" data-filter=\"traiteur\"></div>
                                            <input type=\"checkbox\" name=\"traiteur\" id=\"\" hidden>
                                            <label for=\"\">Traiteur</label>
                                        </li>
                                        <li class=\"flex aic\">
                                            <div class=\"btn-choise-event\" data-filter=\"wedding_planer\"></div>
                                            <input type=\"checkbox\" name=\"wedding_planer\" id=\"\" hidden>
                                            <label for=\"\">Wedding Planer</label>
                                        </li>
                                        <li class=\"flex aic\">
                                            <div class=\"btn-choise-event\" data-filter=\"dj\"></div>
                                            <input type=\"checkbox\" name=\"dj\" id=\"\" hidden>
                                            <label for=\"\">DJ</label>
                                        </li>
                                        <li class=\"flex aic\">
                                            <div class=\"btn-choise-event\" data-filter=\"orchestre\"></div>
                                            <input type=\"checkbox\" name=\"orchestre\" id=\"\" hidden>
                                            <label for=\"\">Orchestre</label>
                                        </li>
                                        <li class=\"flex aic\">
                                            <div class=\"btn-choise-event\" data-filter=\"decorateur\"></div>
                                            <input type=\"checkbox\" name=\"decorateur\" id=\"\" hidden>
                                            <label for=\"\">Décorateur</label>
                                        </li>
                                        <li class=\"flex aic\">
                                            <div class=\"btn-choise-event\" data-filter=\"fleuriste\"></div>
                                            <input type=\"checkbox\" name=\"fleuriste\" id=\"\" hidden>
                                            <label for=\"\">Fleuriste</label>
                                        </li>
                                        <li class=\"flex aic\">
                                            <div class=\"btn-choise-event\" data-filter=\"photo_vidéo\"></div>
                                            <input type=\"checkbox\" name=\"photo_vidéo\" id=\"\" hidden>
                                            <label for=\"\">Photo/ Vidéo</label>
                                        </li>
                                        <li class=\"flex aic\">
                                            <div class=\"btn-choise-event\" data-filter=\"maquillage\"></div>
                                            <input type=\"checkbox\" name=\"maquillage\" id=\"\" hidden>
                                            <label for=\"\">Maquillage </label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <hr />
                            <div>
                                <label for=\"\">Option de réservation </label>
                            </div>
                            <hr />
                            <div class=\"text-center\">
                                <button class=\"btn-valid-filter\">Valider</button>
                            </div>
                        </div>
                        
                    </form>
                </div>
                <ul class=\"flex jcb\">
                    <li class=\"flex\">
                        <a href=\"/favori\" class=\"flex aic\">
                            <i class=\"fa-regular fa-heart\"></i>
                            <span>Favori</span>
                        </a>
                    </li>
                    <li class=\"flex\">
                        <a href=\"/profil/demandes\" class=\"flex aic calendar-link\">
                            <i class=\"fa-regular fa-calendar-days\"></i>
                            <input type=\"date\" class=\"date-reservaton\" name=\"\" id=\"\">
                            <span>Réservations</span>
                        </a>
                    </li>
                    <li class=\"flex\">
                        <a href=\"/message\" class=\"flex aic\">
                            <i class=\"fa-regular fa-comment-dots\"></i>
                            <span>Messages</span>
                        </a>
                    </li>
                    <li class=\"flex\">
                        {% if app.user %}
                            <a href=\"/profil\" class=\"flex aic\">
                                <div style=\"display: flex; width: 20px; height: 20px;\">
                                    <img class=\"circle profil-picture\" title=\"{{ app.user.userIdentifier }}\" src=\"{{ vich_uploader_asset(app.user, 'imageFile') }}\">
                                </div>
                                <span>{{ app.user.userIdentifier }}</span>

                            </a>
                        {% else %}
                            <a href=\"/login\" class=\"flex aic\">
                                <span>Connexion</span>
                                <i class=\"fa-regular fa-circle-user\"></i>
                            </a>
                        {% endif %}
                    </li>
                </ul>
            </nav>
        </header>
         {% block aside %}{% endblock %}

        <main class=\"container\">
            {% block body %}{% endblock %}
        </main>

        <footer>
            <nav class=\"container flex jcb\">
            <div>
                <a href=\"#\" class=\"menu-title\">Mariage</a>
                <ul>
                    <li><a href=\"#\">Lorem, ipsum dolor.</a></li>
                    <li><a href=\"#\">Maiores, suscipit quisquam?</a></li>
                    <li><a href=\"#\">Quasi, omnis numquam?</a></li>
                    <li><a href=\"#\">Expedita, est modi?</a></li>
                    <li><a href=\"#\">Nostrum, dicta sapiente!</a></li>
                    <li><a href=\"#\">Harum, sed nulla?</a></li>
                    <li><a href=\"#\">Molestias, assumenda accusamus!</a></li>
                </ul>
            </div>
            <div>
                <a href=\"#\" class=\"menu-title\">Anniversaire</a>
                <ul>
                    <li><a href=\"#\">Lorem, ipsum dolor.</a></li>
                    <li><a href=\"#\">Maiores, suscipit quisquam?</a></li>
                    <li><a href=\"#\">Quasi, omnis numquam?</a></li>
                    <li><a href=\"#\">Expedita, est modi?</a></li>
                    <li><a href=\"#\">Nostrum, dicta sapiente!</a></li>
                    <li><a href=\"#\">Harum, sed nulla?</a></li>
                    <li><a href=\"#\">Molestias, assumenda accusamus!</a></li>
                </ul>
            </div>
            <div>
                <a href=\"#\" class=\"menu-title\">Soirée privée</a>
                <ul>
                    <li><a href=\"#\">Lorem, ipsum dolor.</a></li>
                    <li><a href=\"#\">Maiores, suscipit quisquam?</a></li>
                    <li><a href=\"#\">Quasi, omnis numquam?</a></li>
                    <li><a href=\"#\">Expedita, est modi?</a></li>
                    <li><a href=\"#\">Nostrum, dicta sapiente!</a></li>
                    <li><a href=\"#\">Harum, sed nulla?</a></li>
                    <li><a href=\"#\">Molestias, assumenda accusamus!</a></li>
                </ul>
            </div>
            <div>
                <a href=\"#\" class=\"menu-title\">Naissance</a>
                <ul>
                    <li><a href=\"#\">Lorem, ipsum dolor.</a></li>
                    <li><a href=\"#\">Maiores, suscipit quisquam?</a></li>
                    <li><a href=\"#\">Quasi, omnis numquam?</a></li>
                    <li><a href=\"#\">Expedita, est modi?</a></li>
                    <li><a href=\"#\">Nostrum, dicta sapiente!</a></li>
                    <li><a href=\"#\">Harum, sed nulla?</a></li>
                    <li><a href=\"#\">Molestias, assumenda accusamus!</a></li>
                </ul>
            </div>
                
            </nav>
        </footer>
    </body>
</html>
", "base.html.twig", "/home/betkom/Bureau/PROJECT_EVENT/templates/base.html.twig");
    }
}

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

/* home/index.html.twig */
class __TwigTemplate_e1d301098a9a27d2aff7af43f5ec400c extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'body' => [$this, 'block_body'],
            'aside' => [$this, 'block_aside'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "home/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "home/index.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "home/index.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        echo "Accueil";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    // line 5
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 6
        echo "<div class=\"home-page\">
    <p class=\"ranking-order text-center\">Classement par ordre de pertinance</p>
    <div class=\"articles flex jcc fww\">
        ";
        // line 9
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["services"]) || array_key_exists("services", $context) ? $context["services"] : (function () { throw new RuntimeError('Variable "services" does not exist.', 9, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["service"]) {
            // line 10
            echo "            <a href=\"";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_home_service_show", ["id" => twig_get_attribute($this->env, $this->source, $context["service"], "id", [], "any", false, false, false, 10)]), "html", null, true);
            echo "\" class=\"article-item\">
                <div class=\"image-picture\">
                    <i class=\"fa-solid fa-heart\"></i>
                    <img src=\"";
            // line 13
            echo twig_escape_filter($this->env, $this->extensions['Vich\UploaderBundle\Twig\Extension\UploaderExtension']->asset($context["service"], "imageFile"), "html", null, true);
            echo "\" alt=\"Article\">
                </div>
                <div class=\"flex jcb\">
                    <p>";
            // line 16
            echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, $context["service"], "nom", [], "any", false, false, false, 16) . ", ") . twig_get_attribute($this->env, $this->source, $context["service"], "localisation", [], "any", false, false, false, 16)), "html", null, true);
            echo "</p>
                    <div class=\"flex aic\">
                        <div><i class=\"fa-solid fa-star\"></i></div>
                        <div class=\"note\">4,88</div>
                    </div>
                </div>
                <div>
                    <p>";
            // line 23
            echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["service"], "user", [], "any", false, false, false, 23), "nom", [], "any", false, false, false, 23) . " ") . twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["service"], "user", [], "any", false, false, false, 23), "prenom", [], "any", false, false, false, 23)), "html", null, true);
            echo "</p>
                    <p>Prochaine dispo. 4 févr.</p>
                    <p>";
            // line 25
            echo twig_escape_filter($this->env, (twig_get_attribute($this->env, $this->source, $context["service"], "prix", [], "any", false, false, false, 25) . " euros"), "html", null, true);
            echo "</p>
                </div>
            </a>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['service'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 29
        echo "    </div>
</div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    // line 33
    public function block_aside($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "aside"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "aside"));

        // line 34
        echo "    <aside class=\"container\">
        <nav class=\"infinite-carousel\">
            <button id=\"prev\" class=\"prev carousel-button-left\"><i class=\"fa-solid fa-chevron-left\"></i></button>
            <button id=\"next\" class=\"next carousel-button-right\"><i class=\"fa-solid fa-chevron-right\"></i></button>
            <ul class=\"carousel-items\">
                <li class=\"principal-category marriage carousel-block\" data-category=\"mariage\">
                    <a href=\"";
        // line 40
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_mariage");
        echo "\"class=\"flex fdc aic jcb h-100\">
                        <img src=\"";
        // line 41
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/images/mariage.svg"), "html", null, true);
        echo "\" alt=\"Mariage\">
                        <span>Mariage</span>
                    </a>
                </li>
                <li class=\"principal-category carousel-block\" data-category=\"anniversaire\">
                    <a href=\"";
        // line 46
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_anniversaire");
        echo "\" class=\"flex fdc aic h-100\">
                        <img src=\"";
        // line 47
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/images/anniversaire.svg"), "html", null, true);
        echo "\" alt=\"Anniversaire\">
                        <span>Anniversaire</span>
                    </a>
                </li>
                <li class=\"principal-category carousel-block\" data-category=\"soiree-privee\">
                    <a href=\"";
        // line 52
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_soiree_privee");
        echo "\" class=\"flex fdc aic h-100\">
                        <img src=\"";
        // line 53
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/images/soiree.svg"), "html", null, true);
        echo "\" alt=\"Soirée privée\">
                        <span>Soirée privée</span>
                    </a>
                </li>
                <li class=\"principal-category carousel-block\" data-category=\"naissance\">
                    <a href=\"";
        // line 58
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_naissance");
        echo "\" class=\"flex fdc aic h-100\">
                        <img src=\"";
        // line 59
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/images/naissance.svg"), "html", null, true);
        echo "\" alt=\"Naissance\">
                        <span>Naissance</span>
                    </a>
                </li>
            </ul>
        </nav>
    </aside>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    public function getTemplateName()
    {
        return "home/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  206 => 59,  202 => 58,  194 => 53,  190 => 52,  182 => 47,  178 => 46,  170 => 41,  166 => 40,  158 => 34,  148 => 33,  136 => 29,  126 => 25,  121 => 23,  111 => 16,  105 => 13,  98 => 10,  94 => 9,  89 => 6,  79 => 5,  60 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Accueil{% endblock %}

{% block body %}
<div class=\"home-page\">
    <p class=\"ranking-order text-center\">Classement par ordre de pertinance</p>
    <div class=\"articles flex jcc fww\">
        {% for service in services %}
            <a href=\"{{ path('app_home_service_show', {'id': service.id}) }}\" class=\"article-item\">
                <div class=\"image-picture\">
                    <i class=\"fa-solid fa-heart\"></i>
                    <img src=\"{{ vich_uploader_asset(service, 'imageFile') }}\" alt=\"Article\">
                </div>
                <div class=\"flex jcb\">
                    <p>{{ service.nom ~ ', ' ~ service.localisation }}</p>
                    <div class=\"flex aic\">
                        <div><i class=\"fa-solid fa-star\"></i></div>
                        <div class=\"note\">4,88</div>
                    </div>
                </div>
                <div>
                    <p>{{ service.user.nom ~ ' ' ~ service.user.prenom }}</p>
                    <p>Prochaine dispo. 4 févr.</p>
                    <p>{{ service.prix ~ ' euros'}}</p>
                </div>
            </a>
        {% endfor %}
    </div>
</div>
{% endblock %}

{% block aside %}
    <aside class=\"container\">
        <nav class=\"infinite-carousel\">
            <button id=\"prev\" class=\"prev carousel-button-left\"><i class=\"fa-solid fa-chevron-left\"></i></button>
            <button id=\"next\" class=\"next carousel-button-right\"><i class=\"fa-solid fa-chevron-right\"></i></button>
            <ul class=\"carousel-items\">
                <li class=\"principal-category marriage carousel-block\" data-category=\"mariage\">
                    <a href=\"{{ path('app_mariage') }}\"class=\"flex fdc aic jcb h-100\">
                        <img src=\"{{ asset('build/images/mariage.svg') }}\" alt=\"Mariage\">
                        <span>Mariage</span>
                    </a>
                </li>
                <li class=\"principal-category carousel-block\" data-category=\"anniversaire\">
                    <a href=\"{{ path('app_anniversaire') }}\" class=\"flex fdc aic h-100\">
                        <img src=\"{{ asset('build/images/anniversaire.svg') }}\" alt=\"Anniversaire\">
                        <span>Anniversaire</span>
                    </a>
                </li>
                <li class=\"principal-category carousel-block\" data-category=\"soiree-privee\">
                    <a href=\"{{ path('app_soiree_privee') }}\" class=\"flex fdc aic h-100\">
                        <img src=\"{{ asset('build/images/soiree.svg') }}\" alt=\"Soirée privée\">
                        <span>Soirée privée</span>
                    </a>
                </li>
                <li class=\"principal-category carousel-block\" data-category=\"naissance\">
                    <a href=\"{{ path('app_naissance') }}\" class=\"flex fdc aic h-100\">
                        <img src=\"{{ asset('build/images/naissance.svg') }}\" alt=\"Naissance\">
                        <span>Naissance</span>
                    </a>
                </li>
            </ul>
        </nav>
    </aside>
{% endblock %}
", "home/index.html.twig", "/home/betkom/Bureau/PROJECT_EVENT/templates/home/index.html.twig");
    }
}

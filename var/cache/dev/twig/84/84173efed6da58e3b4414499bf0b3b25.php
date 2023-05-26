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

/* profile/demandes/index.html.twig */
class __TwigTemplate_87c149af538490e6f667dab94a96573d extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "profile/demandes/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "profile/demandes/index.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "profile/demandes/index.html.twig", 1);
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

        echo "Demandes index";
        
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
        echo "<div class=\"demande\">
<h2>Demandes index</h2>
    <table class=\"table\">
        <thead>
            <tr>
                <th>Service</th>
                <th>Date</th>
                <th>Paiement</th>
                <th>Statut</th>
                <th>actions</th>
            </tr>
        </thead>
        <tbody>
        ";
        // line 19
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["demandes"]) || array_key_exists("demandes", $context) ? $context["demandes"] : (function () { throw new RuntimeError('Variable "demandes" does not exist.', 19, $this->source); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["demande"]) {
            // line 20
            echo "            <tr>
                <td>";
            // line 21
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["demande"], "service", [], "any", false, false, false, 21), "nom", [], "any", false, false, false, 21), "html", null, true);
            echo "</td>
                <td>";
            // line 22
            ((twig_get_attribute($this->env, $this->source, $context["demande"], "planedDate", [], "any", false, false, false, 22)) ? (print (twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["demande"], "planedDate", [], "any", false, false, false, 22), "Y-m-d"), "html", null, true))) : (print ("")));
            echo "</td>
                <td>";
            // line 23
            echo ((twig_get_attribute($this->env, $this->source, $context["demande"], "paiement", [], "any", false, false, false, 23)) ? ("Fait") : (""));
            echo "</td>
                <td>";
            // line 24
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["demande"], "statut", [], "any", false, false, false, 24), "html", null, true);
            echo "</td>
                <td>
                    <a href=\"";
            // line 26
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_demandes_account_show", ["id" => twig_get_attribute($this->env, $this->source, $context["demande"], "id", [], "any", false, false, false, 26)]), "html", null, true);
            echo "\">Afficher</a>
                </td>
            </tr>
        ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 30
            echo "            <tr>
                <td colspan=\"5\">no records found</td>
            </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['demande'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 34
        echo "        </tbody>
    </table></br>

    ";
        // line 37
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["demandes"]) || array_key_exists("demandes", $context) ? $context["demandes"] : (function () { throw new RuntimeError('Variable "demandes" does not exist.', 37, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["demande"]) {
            // line 38
            echo "        ";
            if (((twig_get_attribute($this->env, $this->source, $context["demande"], "statut", [], "any", false, false, false, 38) == "en attente") &&  !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["demande"], "newPlanedDate", [], "any", false, false, false, 38)))) {
                // line 39
                echo "            <h3>Nouvelle date propositions : </h3>
        ";
            }
            // line 41
            echo "        ";
            $context["break"] = true;
            // line 42
            echo "    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['demande'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 43
        echo "
    ";
        // line 44
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["demandes"]) || array_key_exists("demandes", $context) ? $context["demandes"] : (function () { throw new RuntimeError('Variable "demandes" does not exist.', 44, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["demande"]) {
            // line 45
            echo "        ";
            if (((twig_get_attribute($this->env, $this->source, $context["demande"], "statut", [], "any", false, false, false, 45) == "en attente") &&  !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["demande"], "newPlanedDate", [], "any", false, false, false, 45)))) {
                // line 46
                echo "            <p>Le prestataire vous a proposé une nouvelle date pour votre demande du service ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["demande"], "service", [], "any", false, false, false, 46), "nom", [], "any", false, false, false, 46), "html", null, true);
                echo " : <a href=\"";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_demandes_account_new_date", ["id" => twig_get_attribute($this->env, $this->source, $context["demande"], "id", [], "any", false, false, false, 46)]), "html", null, true);
                echo "\">Cliquez ici pour donner votre réponse</a></p>
        ";
            }
            // line 48
            echo "    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['demande'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 49
        echo "
    <a href=\"";
        // line 50
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_demandes_account_new");
        echo "\">Créer une nouvelle demande</a>
</div>
    
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    public function getTemplateName()
    {
        return "profile/demandes/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  198 => 50,  195 => 49,  189 => 48,  181 => 46,  178 => 45,  174 => 44,  171 => 43,  165 => 42,  162 => 41,  158 => 39,  155 => 38,  151 => 37,  146 => 34,  137 => 30,  128 => 26,  123 => 24,  119 => 23,  115 => 22,  111 => 21,  108 => 20,  103 => 19,  88 => 6,  78 => 5,  59 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Demandes index{% endblock %}

{% block body %}
<div class=\"demande\">
<h2>Demandes index</h2>
    <table class=\"table\">
        <thead>
            <tr>
                <th>Service</th>
                <th>Date</th>
                <th>Paiement</th>
                <th>Statut</th>
                <th>actions</th>
            </tr>
        </thead>
        <tbody>
        {% for demande in demandes %}
            <tr>
                <td>{{ demande.service.nom}}</td>
                <td>{{ demande.planedDate ? demande.planedDate|date('Y-m-d') : '' }}</td>
                <td>{{ demande.paiement ? 'Fait' : '' }}</td>
                <td>{{ demande.statut }}</td>
                <td>
                    <a href=\"{{ path('app_demandes_account_show', {'id': demande.id}) }}\">Afficher</a>
                </td>
            </tr>
        {% else %}
            <tr>
                <td colspan=\"5\">no records found</td>
            </tr>
        {% endfor %}
        </tbody>
    </table></br>

    {% for demande in demandes %}
        {% if demande.statut == \"en attente\" and demande.newPlanedDate is not empty %}
            <h3>Nouvelle date propositions : </h3>
        {% endif %}
        {% set break = true %}
    {% endfor %}

    {% for demande in demandes %}
        {% if demande.statut == \"en attente\" and demande.newPlanedDate is not empty %}
            <p>Le prestataire vous a proposé une nouvelle date pour votre demande du service {{ demande.service.nom}} : <a href=\"{{ path('app_demandes_account_new_date', {'id': demande.id}) }}\">Cliquez ici pour donner votre réponse</a></p>
        {% endif %}
    {% endfor %}

    <a href=\"{{ path('app_demandes_account_new') }}\">Créer une nouvelle demande</a>
</div>
    
{% endblock %}
", "profile/demandes/index.html.twig", "/home/betkom/Bureau/PROJECT_EVENT/templates/profile/demandes/index.html.twig");
    }
}

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

/* message/index.html.twig */
class __TwigTemplate_59534ce7f55ce6fcdfbe4dc88b917162 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "message/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "message/index.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "message/index.html.twig", 1);
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

        echo "Message index";
        
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
        echo "    <h2>Messages</h2>
    <a href=\"message/new\" class=\"flex gap-5\"><span>Ecrire</span><i class=\"fa-regular fa-pen-to-square\"></i></a>
    <div class=\"message-container flex jcsb gap-15\">
        <div class=\"message-items flex fdc gap-5 w-30\">
            ";
        // line 10
        if (twig_test_iterable((isset($context["messages"]) || array_key_exists("messages", $context) ? $context["messages"] : (function () { throw new RuntimeError('Variable "messages" does not exist.', 10, $this->source); })()))) {
            echo " 
                ";
            // line 11
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["messages"]) || array_key_exists("messages", $context) ? $context["messages"] : (function () { throw new RuntimeError('Variable "messages" does not exist.', 11, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
                // line 12
                echo "                    ";
                if ((twig_get_attribute($this->env, $this->source, $context["message"], "emmeteur", [], "any", false, false, false, 12) == twig_get_attribute($this->env, $this->source, (isset($context["lastMessage"]) || array_key_exists("lastMessage", $context) ? $context["lastMessage"] : (function () { throw new RuntimeError('Variable "lastMessage" does not exist.', 12, $this->source); })()), "emmeteur", [], "any", false, false, false, 12))) {
                    // line 13
                    echo "                    <a href=\"";
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_message_index_detail", ["id" => twig_get_attribute($this->env, $this->source, $context["message"], "id", [], "any", false, false, false, 13)]), "html", null, true);
                    echo "\" class=\"message-block active\">
                    ";
                } else {
                    // line 15
                    echo "                    <a href=\"";
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_message_index_detail", ["id" => twig_get_attribute($this->env, $this->source, $context["message"], "id", [], "any", false, false, false, 15)]), "html", null, true);
                    echo "\" class=\"message-block\">
                    ";
                }
                // line 17
                echo "                        <div class=\"msg-date-name flex aic jcsb\">
                            <strong>";
                // line 18
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["message"], "recepteur", [], "any", false, false, false, 18), "html", null, true);
                echo "</strong>
                            <span>";
                // line 19
                ((twig_get_attribute($this->env, $this->source, $context["message"], "date", [], "any", false, false, false, 19)) ? (print (twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["message"], "date", [], "any", false, false, false, 19), "Y-m-d H:i:s"), "html", null, true))) : (print ("")));
                echo "</span>
                        </div>
                        <div class=\"msg-title\">
                            ";
                // line 22
                echo twig_escape_filter($this->env, (((twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, $context["message"], "message", [], "any", false, false, false, 22)) > 20)) ? ((twig_slice($this->env, twig_get_attribute($this->env, $this->source, $context["message"], "message", [], "any", false, false, false, 22), 0, 20) . "...")) : (twig_get_attribute($this->env, $this->source, $context["message"], "message", [], "any", false, false, false, 22))), "html", null, true);
                echo "
                        </div>
                    </a>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 26
            echo "            ";
        }
        // line 27
        echo "        </div>
        <div class=\"message-show flex fdc gap-15  w-70\">
            ";
        // line 29
        if (array_key_exists("message_detail", $context)) {
            // line 30
            echo "                <div class=\"msg-show-title flex jcsb\">
                <div class=\"flex gap-10\">
                        <a href=\"";
            // line 32
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_message_reply", ["id" => twig_get_attribute($this->env, $this->source, (isset($context["message_detail"]) || array_key_exists("message_detail", $context) ? $context["message_detail"] : (function () { throw new RuntimeError('Variable "message_detail" does not exist.', 32, $this->source); })()), "id_destinataire", [], "any", false, false, false, 32)]), "html", null, true);
            echo "\" class=\"flex gap-5\"><span>Répondre</span><i class=\"fa-solid fa-reply-all\"></i></a>
                    </div>
                </div>
                <div class=\"flex aic jcsb\">
                    <strong>Emetteur: ";
            // line 36
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["message_detail"]) || array_key_exists("message_detail", $context) ? $context["message_detail"] : (function () { throw new RuntimeError('Variable "message_detail" does not exist.', 36, $this->source); })()), "recepteur", [], "any", false, false, false, 36), "html", null, true);
            echo "</strong>
                    <span>date: ";
            // line 37
            ((twig_get_attribute($this->env, $this->source, (isset($context["message_detail"]) || array_key_exists("message_detail", $context) ? $context["message_detail"] : (function () { throw new RuntimeError('Variable "message_detail" does not exist.', 37, $this->source); })()), "date", [], "any", false, false, false, 37)) ? (print (twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["message_detail"]) || array_key_exists("message_detail", $context) ? $context["message_detail"] : (function () { throw new RuntimeError('Variable "message_detail" does not exist.', 37, $this->source); })()), "date", [], "any", false, false, false, 37), "Y-m-d H:i:s"), "html", null, true))) : (print ("")));
            echo "</span>
                </div>
                <div class=\"msg-show-content\">
                    <p>";
            // line 40
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["message_detail"]) || array_key_exists("message_detail", $context) ? $context["message_detail"] : (function () { throw new RuntimeError('Variable "message_detail" does not exist.', 40, $this->source); })()), "message", [], "any", false, false, false, 40), "html", null, true);
            echo "</p>
                </div>
            ";
        } else {
            // line 43
            echo "
            <div class=\"msg-show-title flex jcsb\">
                <div class=\"flex gap-10\">
                    ";
            // line 47
            echo "                    <a href=\"";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_message_reply", ["id" => twig_get_attribute($this->env, $this->source, (isset($context["lastMessage"]) || array_key_exists("lastMessage", $context) ? $context["lastMessage"] : (function () { throw new RuntimeError('Variable "lastMessage" does not exist.', 47, $this->source); })()), "id_destinataire", [], "any", false, false, false, 47)]), "html", null, true);
            echo "\" class=\"flex gap-5\"><span>Répondre</span><i class=\"fa-solid fa-reply-all\"></i></a>
                </div>
                </div>
                <div class=\"flex aic jcsb\">
                    <strong>Emetteur: ";
            // line 51
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["lastMessage"]) || array_key_exists("lastMessage", $context) ? $context["lastMessage"] : (function () { throw new RuntimeError('Variable "lastMessage" does not exist.', 51, $this->source); })()), "recepteur", [], "any", false, false, false, 51), "html", null, true);
            echo "</strong>
                    <span>date: ";
            // line 52
            ((twig_get_attribute($this->env, $this->source, (isset($context["lastMessage"]) || array_key_exists("lastMessage", $context) ? $context["lastMessage"] : (function () { throw new RuntimeError('Variable "lastMessage" does not exist.', 52, $this->source); })()), "date", [], "any", false, false, false, 52)) ? (print (twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["lastMessage"]) || array_key_exists("lastMessage", $context) ? $context["lastMessage"] : (function () { throw new RuntimeError('Variable "lastMessage" does not exist.', 52, $this->source); })()), "date", [], "any", false, false, false, 52), "Y-m-d H:i:s"), "html", null, true))) : (print ("")));
            echo "</span>
                </div>
                <div class=\"msg-show-content\">
                    <p>";
            // line 55
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["lastMessage"]) || array_key_exists("lastMessage", $context) ? $context["lastMessage"] : (function () { throw new RuntimeError('Variable "lastMessage" does not exist.', 55, $this->source); })()), "message", [], "any", false, false, false, 55), "html", null, true);
            echo "</p>
                </div>
            </div>
        ";
        }
        // line 59
        echo "

    </div>

    ";
        // line 101
        echo "
    
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    public function getTemplateName()
    {
        return "message/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  212 => 101,  206 => 59,  199 => 55,  193 => 52,  189 => 51,  181 => 47,  176 => 43,  170 => 40,  164 => 37,  160 => 36,  153 => 32,  149 => 30,  147 => 29,  143 => 27,  140 => 26,  130 => 22,  124 => 19,  120 => 18,  117 => 17,  111 => 15,  105 => 13,  102 => 12,  98 => 11,  94 => 10,  88 => 6,  78 => 5,  59 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Message index{% endblock %}

{% block body %}
    <h2>Messages</h2>
    <a href=\"message/new\" class=\"flex gap-5\"><span>Ecrire</span><i class=\"fa-regular fa-pen-to-square\"></i></a>
    <div class=\"message-container flex jcsb gap-15\">
        <div class=\"message-items flex fdc gap-5 w-30\">
            {% if messages is iterable %} 
                {% for message in messages %}
                    {% if message.emmeteur == lastMessage.emmeteur %}
                    <a href=\"{{ path('app_message_index_detail', {'id': message.id}) }}\" class=\"message-block active\">
                    {% else %}
                    <a href=\"{{ path('app_message_index_detail', {'id': message.id}) }}\" class=\"message-block\">
                    {% endif %}
                        <div class=\"msg-date-name flex aic jcsb\">
                            <strong>{{ message.recepteur }}</strong>
                            <span>{{ message.date ? message.date|date('Y-m-d H:i:s') : '' }}</span>
                        </div>
                        <div class=\"msg-title\">
                            {{ message.message|length > 20 ? message.message|slice(0, 20) ~ '...' :  message.message}}
                        </div>
                    </a>
                {% endfor %}
            {% endif %}
        </div>
        <div class=\"message-show flex fdc gap-15  w-70\">
            {% if message_detail is defined%}
                <div class=\"msg-show-title flex jcsb\">
                <div class=\"flex gap-10\">
                        <a href=\"{{ path('app_message_reply', {'id': message_detail.id_destinataire}) }}\" class=\"flex gap-5\"><span>Répondre</span><i class=\"fa-solid fa-reply-all\"></i></a>
                    </div>
                </div>
                <div class=\"flex aic jcsb\">
                    <strong>Emetteur: {{ message_detail.recepteur }}</strong>
                    <span>date: {{ message_detail.date ? message_detail.date|date('Y-m-d H:i:s') : '' }}</span>
                </div>
                <div class=\"msg-show-content\">
                    <p>{{ message_detail.message }}</p>
                </div>
            {% else %}

            <div class=\"msg-show-title flex jcsb\">
                <div class=\"flex gap-10\">
                    {# <a href=\"{{ path('app_message_reply', {'id': message.id}) }}\" class=\"flex gap-5\"><span>Répondre</span><i class=\"fa-solid fa-reply-all\"></i></a> #}
                    <a href=\"{{ path('app_message_reply', {'id': lastMessage.id_destinataire}) }}\" class=\"flex gap-5\"><span>Répondre</span><i class=\"fa-solid fa-reply-all\"></i></a>
                </div>
                </div>
                <div class=\"flex aic jcsb\">
                    <strong>Emetteur: {{ lastMessage.recepteur }}</strong>
                    <span>date: {{ lastMessage.date ? lastMessage.date|date('Y-m-d H:i:s') : '' }}</span>
                </div>
                <div class=\"msg-show-content\">
                    <p>{{ lastMessage.message }}</p>
                </div>
            </div>
        {% endif %}


    </div>

    {# <table class=\"table\">
        <thead>
            <tr>
                <th>Id</th>
                <th>Message</th>
                <th>Date</th>
                <th>Service</th>
                <th>Emmeteur</th>
                <th>Destinataire</th>
                <th>actions</th>
            </tr>
        </thead>
        <tbody>
           
        {% if messages is iterable %} 
            {% for message in messages %}
                <tr>
                    <td>{{ message.id }}</td>
                    <td>{{ message.message }}</td>
                    <td>{{ message.date ? message.date|date('Y-m-d H:i:s') : '' }}</td>
                    <td>{{ message.demande }}</td>
                    <td>{{ message.emmeteur }}</td>
                    <td>{{ message.recepteur }}</td>
                    <td>
                        <a href=\"{{ path('app_message_show', {'id': message.id}) }}\">show</a>
                        <a href=\"{{ path('app_message_edit', {'id': message.id}) }}\">edit</a>
                    </td>
                </tr>
                {% else %}
                <tr>
                    <td colspan=\"7\">no records found</td>
                </tr>
               
            {% endfor %}
        {% endif %}
                
        </tbody>
    </table> #}

    
{% endblock %}
", "message/index.html.twig", "/home/betkom/Bureau/PROJECT_EVENT/templates/message/index.html.twig");
    }
}

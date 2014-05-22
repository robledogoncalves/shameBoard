<?php

/* ConradCaineFrontendBundle:Default:index.html.twig */
class __TwigTemplate_5d7cee0be5ad1094c0a0452487d176cbeff13731d5c88a3cfc78888270170e1e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("ConradCaineFrontendBundle::base.html.twig");

        $this->blocks = array(
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "ConradCaineFrontendBundle::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        // line 4
        echo "\t<div class=\"container\" ng-controller=\"ShameController\">
    <div class=\"page-header text-center\">
        <h1 id=\"timeline\" style=\"color: #6CBFEE\">Last Shames Waiting for Approval</h1><!-- <button data-toggle=\"modal\" href=\"#myModal\" type=\"button\" class=\"btn btn-default\">Add New Shame</button> -->
    </div>
    <ul class=\"cbp_tmtimeline\">
        <li ng-repeat=\"shame in shames\">
            <time class=\"cbp_tmtime\" datetime=\"{[{ shame.date.date| date : 'yyyy-MM-dd HH:mm:ss' }]}\"><span>{[{ shame.date.date|date : 'dd/MM/yyyy' }]}</span> <span>{[{ shame.date.date|date : 'HH:mm' }]}</span></time>
            <div class=\"cbp_tmicon\" title=\"{[{ shame.user.username }]}\"><img class=\"user-photo img-circle\" src=\"http://www.gravatar.com/avatar/{[{ shame.user.photoHash }]}?s=40&r=g&d=http%3A%2F%2Fimageshack.com%2Fa%2Fimg835%2F4017%2Fndp4.png\" alt=\"\"></div>
            <div class=\"cbp_tmlabel\">
                <h2>{[{ shame.user.username }]}: {[{ shame.shameDesc }]} </h2>
                <p>{[{ shame.description}]}</p>
                <hr>
                <a href=\"#\" class=\"btn btn-success\"><i class=\"glyphicon glyphicon-thumbs-up\"></i> Agree with Shame</a>
                <a href=\"#\" class=\"btn btn-danger\"><i class=\"glyphicon glyphicon-thumbs-down\"></i> Disagree with Shame</a>
            </div>

        </li>
    </ul>
</div>
";
    }

    public function getTemplateName()
    {
        return "ConradCaineFrontendBundle:Default:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  31 => 4,  28 => 3,);
    }
}

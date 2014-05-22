<?php

/* ConradCaineFrontendBundle:Default:index.html.twig */
class __TwigTemplate_240a07df592884ce13c210601f6454fafa2956dadb061ae3f941fd7424e3f5ec extends Twig_Template
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
        echo "    <div class=\"container\" ng-controller=\"ShameController\">
    <div class=\"page-header text-center\">
        <h1 id=\"timeline\" style=\"color: #6CBFEE\">Last Shames Waiting for Approval</h1><!-- <button data-toggle=\"modal\" href=\"#myModal\" type=\"button\" class=\"btn btn-default\">Add New Shame</button> -->
    </div>
    <ul class=\"cbp_tmtimeline\">
        <li ng-repeat=\"shame in shames\">
            <time class=\"cbp_tmtime\" datetime=\"{[{ shame.date.date| date : 'yyyy-MM-dd HH:mm:ss' }]}\"><span>{[{ shame.date.date|date : 'dd/MM/yyyy' }]}</span> <span>{[{ shame.date.date|date : 'HH:mm' }]}</span></time>
            <div class=\"cbp_tmicon\" title=\"{[{ shame.user.username }]}\"><img class=\"user-photo img-circle\" src=\"{[{ shame.user.gravatarPhoto }]}\" alt=\"\"></div>
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

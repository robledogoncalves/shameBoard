<?php

/* ConradCaineFrontendBundle::base.html.twig */
class __TwigTemplate_c8c900325410c5c91853fc122f0fd2b6cfe764c22a5f64324121ffc7df203cca extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'navigation' => array($this, 'block_navigation'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html ng-app=\"shameBoard\">
    <head>
        <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
        <title>";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        echo "</title>

        ";
        // line 7
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 14
        echo "
        <script src=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/conradcainefrontend/js/jquery.min.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
        <script src=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/conradcainefrontend/js/bootstrap.min.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
        <script src=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/conradcainefrontend/js/script.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
        <script src=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/conradcainefrontend/js/angular.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
        <script src=\"";
        // line 19
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/conradcainefrontend/js/app.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
        <script src=\"";
        // line 20
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/conradcainefrontend/js/modernizr.custom.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
    </head>

    <body style=\"background-image: url('";
        // line 23
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/conradcainefrontend/images/background.jpg"), "html", null, true);
        echo "');\">
        ";
        // line 24
        $this->displayBlock('navigation', $context, $blocks);
        // line 47
        echo "
        <div id=\"content\">
            ";
        // line 49
        $this->displayBlock('body', $context, $blocks);
        // line 50
        echo "        </div>

    </body>
</html>";
    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        echo "Test Application";
    }

    // line 7
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 8
        echo "            <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/conradcainefrontend/css/bootstrap.min.css"), "html", null, true);
        echo "\" type=\"text/css\" rel=\"stylesheet\" />
            <link href=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/conradcainefrontend/css/style.css"), "html", null, true);
        echo "\" type=\"text/css\" rel=\"stylesheet\" />
            <link href=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/conradcainefrontend/css/component.css"), "html", null, true);
        echo "\" type=\"text/css\" rel=\"stylesheet\" />
            <link href=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/conradcainefrontend/css/default.css"), "html", null, true);
        echo "\" type=\"text/css\" rel=\"stylesheet\" />
            <link href=\"//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css\" rel=\"stylesheet\">
        ";
    }

    // line 24
    public function block_navigation($context, array $blocks = array())
    {
        // line 25
        echo "            <div role=\"navigation\" class=\"navbar navbar-inverse navbar-static-top\">
                <div class=\"container\">
                    <div class=\"navbar-header\">
                        <a href=\"#\" class=\"navbar-brand\">ShameBoard #dev-version</a>
                    </div>

                    <div class=\"navbar-collapse collapse\">
                        <ul class=\"nav navbar-nav\">
                            <li class=\"active\"><a href=\"";
        // line 33
        echo $this->env->getExtension('routing')->getPath("index_default");
        echo "\">Home</a></li>
                            <li class=\"active\"><a href=\"";
        // line 34
        echo $this->env->getExtension('routing')->getPath("index_rule");
        echo "\">Rules</a></li>
                        </ul>

                        <ul class=\"nav navbar-nav navbar-right\">

                            <li>
                                <a href=\"";
        // line 40
        echo $this->env->getExtension('routing')->getUrl("fos_user_security_login");
        echo "\">Login</a>
                            </li>
                        </ul>
                    </div><!--/.nav-collapse -->
                </div>
            </div>
        ";
    }

    // line 49
    public function block_body($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "ConradCaineFrontendBundle::base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  150 => 49,  139 => 40,  130 => 34,  126 => 33,  116 => 25,  113 => 24,  106 => 11,  102 => 10,  98 => 9,  93 => 8,  90 => 7,  84 => 5,  77 => 50,  75 => 49,  71 => 47,  69 => 24,  65 => 23,  59 => 20,  55 => 19,  51 => 18,  47 => 17,  43 => 16,  39 => 15,  36 => 14,  34 => 7,  29 => 5,  23 => 1,);
    }
}

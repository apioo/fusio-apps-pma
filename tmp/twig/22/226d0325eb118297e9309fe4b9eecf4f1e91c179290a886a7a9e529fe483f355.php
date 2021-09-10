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

/* home/git_info.twig */
class __TwigTemplate_d3085bef2a9b09ba89ed5705315421faee7f6971b855256d3e39f5a6e7e190db extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<li id=\"li_pma_version_git\" class=\"list-group-item\">
  ";
        // line 2
        echo _gettext("Git revision:");
        // line 3
        echo "
  ";
        // line 4
        if (($context["is_remote_commit"] ?? null)) {
            // line 5
            echo "    <a href=\"";
            echo twig_escape_filter($this->env, PhpMyAdmin\Core::linkURL(sprintf("https://github.com/phpmyadmin/phpmyadmin/commit/%s", twig_escape_filter($this->env, ($context["hash"] ?? null)))), "html", null, true);
            echo "\" rel=\"noopener noreferrer\" target=\"_blank\">
      <strong title=\"";
            // line 6
            echo twig_escape_filter($this->env, ($context["message"] ?? null), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_slice($this->env, ($context["hash"] ?? null), 0, 7), "html", null, true);
            echo "</strong>
    </a>
  ";
        } else {
            // line 9
            echo "    <strong title=\"";
            echo twig_escape_filter($this->env, ($context["message"] ?? null), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_slice($this->env, ($context["hash"] ?? null), 0, 7), "html", null, true);
            echo "</strong>
  ";
        }
        // line 11
        echo "
  ";
        // line 12
        if ((($context["branch"] ?? null) === false)) {
            // line 13
            echo "    (";
            echo _gettext("no branch");
            echo ")
  ";
        } elseif (        // line 14
($context["is_remote_branch"] ?? null)) {
            // line 15
            echo "    ";
            echo sprintf(_gettext("from %s branch"), sprintf("<a href=\"%s\" rel=\"noopener noreferrer\" target=\"_blank\">%s</a>", PhpMyAdmin\Core::linkURL(sprintf("https://github.com/phpmyadmin/phpmyadmin/tree/%s", twig_escape_filter($this->env,             // line 17
($context["branch"] ?? null)))), twig_escape_filter($this->env,             // line 18
($context["branch"] ?? null))));
            // line 20
            echo ",<br>
  ";
        } else {
            // line 22
            echo "    ";
            echo twig_escape_filter($this->env, sprintf(_gettext("from %s branch"), ($context["branch"] ?? null)), "html", null, true);
            echo ",<br>
  ";
        }
        // line 24
        echo "
  ";
        // line 25
        echo sprintf(_gettext("committed on %s by %s"), twig_get_attribute($this->env, $this->source,         // line 26
($context["committer"] ?? null), "date", [], "any", false, false, false, 26), sprintf("<a href=\"mailto:%s\">%s</a>", twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source,         // line 27
($context["committer"] ?? null), "email", [], "any", false, false, false, 27)), twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["committer"] ?? null), "name", [], "any", false, false, false, 27))));
        // line 30
        if ( !(($context["committer"] ?? null) === ($context["author"] ?? null))) {
            // line 31
            echo ",<br>
    ";
            // line 32
            echo sprintf(_gettext("authored on %s by %s"), twig_get_attribute($this->env, $this->source,             // line 33
($context["author"] ?? null), "date", [], "any", false, false, false, 33), sprintf("<a href=\"mailto:%s\">%s</a>", twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source,             // line 34
($context["author"] ?? null), "email", [], "any", false, false, false, 34)), twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["author"] ?? null), "name", [], "any", false, false, false, 34))));
            // line 35
            echo "
  ";
        }
        // line 37
        echo "</li>
";
    }

    public function getTemplateName()
    {
        return "home/git_info.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  115 => 37,  111 => 35,  109 => 34,  108 => 33,  107 => 32,  104 => 31,  102 => 30,  100 => 27,  99 => 26,  98 => 25,  95 => 24,  89 => 22,  85 => 20,  83 => 18,  82 => 17,  80 => 15,  78 => 14,  73 => 13,  71 => 12,  68 => 11,  60 => 9,  52 => 6,  47 => 5,  45 => 4,  42 => 3,  40 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "home/git_info.twig", "C:\\www\\projects\\fusio-apps\\pma\\templates\\home\\git_info.twig");
    }
}

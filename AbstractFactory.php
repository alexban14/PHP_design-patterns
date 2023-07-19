<?php

// In this example, the Abstract Factory pattern provides an infrastructure for creating various types of templates for different elements of a web page.


interface TemplateFactory
{
	public function createTitleTemplate(): TitleTemplate;

	public function createPageTemplate(): PageTemplate;

	public function getRenderer(): TemplateRenderer;
}

/**
 * Each Concrete Factory corresponds to a specific variant (or family) of
 * products.
 *
 * This Concrete Factory creates Twig templates.
 */

class TwigTemplateFactory implements TemplateFactory
{
	public function function createTitleTemplate(): TitleTemplate
	{
		return new TwigTitleTemplate();
	}

	public function createPageTemplate(): PageTemplate
	{
		return new TwigPageTemplate($this->createTitleTemplate());
	}

	public function getRenderer(): TemplateRenderer
	{
		return new TwigRenderer();
	}
}

/**
 * And this Concrete Factory creates PHPTemplate templates.
 */
class PHPTemplateFactory implements TemplateFactory
{
    public function createTitleTemplate(): TitleTemplate
    {
        return new PHPTemplateTitleTemplate();
    }

    public function createPageTemplate(): PageTemplate
    {
        return new PHPTemplatePageTemplate($this->createTitleTemplate());
    }

    public function getRenderer(): TemplateRenderer
    {
        return new PHPTemplateRenderer();
    }
}



<?php namespace Yuna\Lib;

class View extends \Slim\View
{
    private $layout = null;

    public function setLayout($layout)
    {
        $this->layout = $layout;
    }

    public function render($template, $data)
    {
        $templatePathname = $this->getTemplatePathname($template);
        if (!is_file($templatePathname)) {
            throw new \RuntimeException("View cannot render `$template` because the template does not exist");
        }

        $data = array_merge($this->data->all(), (array)$data);
        extract($data);
        ob_start();
        require $templatePathname;

        $view = ob_get_clean();
        if ($this->layout) {
            $layoutPathname = $this->getLayoutPathname($this->layout);
            if (!is_file($layoutPathname)) {
                throw new \RuntimeException("View cannot render `$this->layout` because the layout does not exist");
            }
            ob_start();
            $yield = $view;
            require $layoutPathname;
            $view = ob_get_clean();
        }

        return $view;


    }

    public function getLayoutPathname($layout)
    {
        return $this->getTemplatesDirectory() . DIRECTORY_SEPARATOR . 'layout' . DIRECTORY_SEPARATOR . $layout;
    }


}
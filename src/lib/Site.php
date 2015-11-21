<?php namespace Yuna\Lib;

class Site extends \Slim\Slim
{
    private $layout = null;

    public function setLayout($layout)
    {
        $this->layout = $layout;

        return $this;
    }

    public function render($template, $data = array(), $status = null)
    {
        if (!is_null($status)) {
            $this->response->status($status);
        }
        $this->view->appendData($data);
        if (!is_null($this->layout)) {
            $this->view->setLayout($this->layout);
        }
        $this->view->display($template);
    }
}
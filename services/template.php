<?php

class Template {
    protected $path, $data;

    public function __construct($path, $data = [])
    {
        $this->path = $path;
        $this->data = $data;
    }

    public function include_content($path)
    {
        // Extracts vars to current view scope
        extract($this->data);

        // Starts output buffering
        ob_start();

        // Includes contents
        include $this->path;
        $buffer = ob_get_contents();
        @ob_end_clean();

        return $buffer;
    }

    public function render()
    {
        if (file_exists($this->path))
        {
            // Returns output buffer
            return $this->include_content($this->path);
        } else {
            $template_404 = __DIR__ . '/pages/404.phtml';
            $buffer = $this->include_content($template_404);

            return $buffer;
        }
    }       
}
<?php

namespace App;

class View {
    private array $data;

    private function includeFile(string $file) : void  {

        if (!file_exists($file)) {
            trigger_error(
                sprintf('The template file (%1$s) doesnt exist', $file),
                E_USER_WARNING
            );

            return;
        }
        extract($this->data);
        include $file;
    }

    public function __get(string $key) : mixed {

        return $this->data[$key] ?? null;
    }

    public function includePartial(string $name) : void  {

        $this->includeFile(basePath("templates/partials/{$name}.php"));
    }

    public function includePage(string $name, array $data = []) : void  {
        $this->data = $data;
        $this->includeFile(basePath("templates/pages/{$name}.php"));
    }

}
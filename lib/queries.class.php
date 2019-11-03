<?php

class Queries {

    private $queries = [];

    public function add_query (string $query) {

        $this->queries[] = $query;

    }

    public function get_query (int $i) {

        if ($i < count($this->queries) && $i > 0) return $this->queries[$i];
        throw new InvalidArgumentException();

    }

    public function get_queries () {

        return $this->queries;

    }

}

<?php
namespace SearchPortal\Plugins;

interface SearchEnginePluginInterface  {
    /**
     * Gets the slug for the search engine.
     *
     * @return string
     */
    public function getSlug() ;

    /**
     * Gets the display name of the search engine.
     *
     * @return string
     */
    function getDisplayName();

    /**
     * Constructs the search URL.
     *
     * @param $query string Query string to search for
     * @return string
     */
    function constructSearchUrl($query);
}
<?php

use SearchPortal\Plugins;
use SearchPortal\Plugins\SearchEnginePluginInterface;

class HomeController extends BaseController
{
    public function home()
    {
        // find all search engine plugins
        $searchengines = array();
        $fileName = realpath(dirname(__FILE__) . '/../plugins/plugins.json');
        /** @var SearchEnginePluginInterface[] $plugins */
        $plugins = (array)json_decode(file_exists($fileName) ? file_get_contents($fileName) : '[]');
        foreach ($plugins as $plugin) {
            $pluginInstance = new $plugin->class;
            $searchengines[] = (object)array('slug' => $pluginInstance->getSlug(), 'name' => $pluginInstance->getDisplayName());
        }

        return View::make('home')->with('searchengines', $searchengines);
    }

    public function search() {
        $query = Input::get('query');
        $slug = Input::get('slug');

        // find all search engine plugins
        $searchengines = array();
        $fileName = realpath(dirname(__FILE__) . '/../plugins/plugins.json');
        /** @var SearchEnginePluginInterface[] $plugins */
        $plugins = (array)json_decode(file_exists($fileName) ? file_get_contents($fileName) : '[]');
        foreach ($plugins as $plugin) {
            $pluginInstance = new $plugin->class;
            if ($pluginInstance->getSlug() == $slug) {
                return Redirect::away($pluginInstance->constructSearchUrl($query));
            }
        }

        return 'Could not perform search.';
    }

    public function about()
    {
        return View::make('about');
    }

}
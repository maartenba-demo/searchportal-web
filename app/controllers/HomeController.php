<?php

use SearchPortal\Plugins;
use SearchPortal\Plugins\DummySearchEnginePlugin;

class HomeController extends BaseController
{
    public function home()
    {
//        // find all search engine plugins
//        $pluginsFolder = realpath(dirname(__FILE__) . '/../plugins');
//        foreach (new DirectoryIterator($pluginsFolder) as $fileInfo) {
//            if (!$fileInfo->isDot() && strpos($fileInfo->getFilename(), 'SearchEnginePlugin.php') !== false) {
//                require_once $fileInfo->getPathname();
//
//                $className = str_replace('.php', '', $fileInfo->getFilename());
//                if (in_array('SearchEnginePluginInterface', class_implements($className, true))) {
//                    // it's a search class!
//                }
//            }
//            $x = new Plugins\DummySearchEnginePlugin();
//        }

        $x = new DummySearchEnginePlugin();
        $searchengine = (object)array('slug' => $x->getSlug(), 'name' => $x->getDisplayName());

        return View::make('home')->with('searchengines', array($searchengine));;
    }

    public function search() {
        $query = Input::get('query');
        $slug = Input::get('slug');

        return Redirect::to($query);
    }

    public function about()
    {
        return View::make('about');
    }

}
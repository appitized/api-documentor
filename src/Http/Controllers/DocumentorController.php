<?php

namespace Appitized\Documentor\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;
use Symfony\Component\Yaml\Parser;


class DocumentorController extends Controller
{

    /**
     * View API documentation based in the documents supplied. Documents are in YAML format.
     * They are stored in settings.document_path and is given a settings.project_name
     *
     * @param \Symfony\Component\Yaml\Parser $parser
     *
     * @return mixed
     */
    public function viewDocumentation(Parser $parser)
    {
        $files = File::files(config('documentor.settings.document_path'));
        $documents = array();
        foreach ($files as $file) {
            $document = $parser->parse(file_get_contents($file));
            foreach ($document as $group => $resource) {
                $documents[$group] = $resource;
            }
        }

        return view('documentor::index')
          ->withDocuments($documents)
          ->withProject(config('documentor.settings.project_name'))
          ->Prefix(config('documentor.settings.prefix'));
    }
}

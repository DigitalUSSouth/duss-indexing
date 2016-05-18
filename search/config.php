<?php

/*
 config file for global values
*/

global $solrCoreName;
$solrCoreName = "duss-indexing";

global $solrUrl;
$solrUrl = 'http://localhost:8983/solr/'.$solrCoreName.'/';

global $solrResultsHighlightTag;
$solrResultsHighlightTag = "mark";//bootstrap highlight <mark></mark>


global $solrFieldNames;
$solrFieldNames = array(
"archive" => "Digital Collection",
"contributing_institution" => "Contributing Institution",
"title" => "Title",
"type_content" => "Type of Content",
"type_digital" => "Type of Digital Surrogate",
"geolocation_human" => "Location",
"file_format" => "File Format",
"alternative_title" => "Alternative Title",
"thumbnail_url" => "Thumbnail URL",
"description" => "Description",
"full_text" => "Full Text",
"type_physical" => "Type of Physical Artifact",
"date_original" => "Date",
"date_digital" => "Date Digital",
"geolocation_machine" => "Geolocation",
"shelfmark" => "Shelfmark",
"subject_heading" => "LC Subject Headings",
"extent" => "Extent",
"copyright_holder" => "Copyright Holder",
"use_permissions" => "Use Rights",
"language" => "Language",
"notes" => "Notes"
);
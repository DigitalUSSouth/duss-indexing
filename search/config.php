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

global $lastError;
$lastError = '';


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

global $facetFields;
$facetFields = array(
		"archive_facet" => "Digital Collection",
		"contributing_institution_facet" => "Contributing Institution",
		"subject_heading_facet" => "LC Subject Headings",
		"type_content" => "Type of Content",
		"file_format" => "File Format",
		"language" => "Language"
		//"date"
);

global $searchFields;
$searchFields = array(
			"contributing_institution",
			"url",
			"title",
			"type_content",
			"type_digital",
			"role_ALL" ,
			"geolocation_human",
			"alternative_title",
			"description",
			"full_text",
			"type_physical",
			"shelfmark",
			"subject_heading",
			"extent",
			"copyright_holder",
			"use_permissions",
			"language",
			"notes",
);

global $advancedSearchFields;
$advancedSearchFields = array (
		"all" => "Search all fields",
		"title" => "Title (title and alternative title fields)",
		"description" => "Description",
		"notes" => "Notes",
		"shelfmark" => "Shelfmark",
		"subject" => "LC Subject Headings",
		"role" => "Roles (authors, editors, etc.)"
);
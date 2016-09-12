<?php

/*
 config file for global values
*/

global $solrCoreName;
$solrCoreName = "duss-indexing";

global $solrUrl;
$solrUrl = 'http://localhost:8983/solr/'.$solrCoreName.'/';

global $searchResultsRows;
$searchResultsRows = 20;

global $solrResultsHighlightTag;
$solrResultsHighlightTag = "mark";//bootstrap highlight <mark></mark>

global $lastError;
$lastError = '';

global $solrFieldNames;
$solrFieldNames = array(
"archive" => ["field_title" => "Digital Collection",
	"display" => "brief"],
"contributing_institution" => ["field_title" => "Contributing Institution",
	"display" => "brief"],
"title" => ["field_title" => "Title",
	"display" => "brief"],
"type_content" => ["field_title" => "Type of Content",
	"display" => "brief"],
"type_digital" => ["field_title" => "Type of Digital Surrogate",
	"display" => "full"],
"geolocation_human" => ["field_title" => "Location",
	"display" => "full"],
"file_format" => ["field_title" => "File Format",
	"display" => "full"],
"alternative_title" => ["field_title" => "Alternative Title",
	"display" => "full"],
"thumbnail_url" => ["field_title" => "Thumbnail URL",
	"display" => "full"],
"description" => ["field_title" => "Description",
	"display" => "brief"],
"full_text" => ["field_title" => "Full Text",
	"display" => "full"],
"type_physical" => ["field_title" => "Type of Physical Artifact",
	"display" => "full"],
"date_original" => ["field_title" => "Date",
	"display" => "full"],
"date_digital" => ["field_title" => "Date Digital",
	"display" => "full"],
"geolocation_machine" => ["field_title" => "Geolocation",
	"display" => "full"],
"shelfmark" => ["field_title" => "Shelfmark",
	"display" => "full"],
"subject_heading" => ["field_title" => "LC Subject Headings",
	"display" => "full"],
"extent" => ["field_title" => "Extent",
	"display" => "full"],
"copyright_holder" => ["field_title" => "Copyright Holder",
	"display" => "full"],
"use_permissions" => ["field_title" => "Use Rights",
	"display" => "full"],
"language" => ["field_title" => "Language",
	"display" => "full"],
"notes" => ["field_title" => "Notes",
	"display" => "full"]
);

global $briefDisplayFields;
foreach ($solrFieldNames as $name =>$info){
	if ($info['display']=='brief') $briefDisplayFields[] = $name;
}

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

function closetags($html) {
    preg_match_all('#<(?!meta|img|br|hr|input\b)\b([a-z]+)(?: .*)?(?<![/|/ ])>#iU', $html, $result);
    $openedtags = $result[1];
    preg_match_all('#</([a-z]+)>#iU', $html, $result);
    $closedtags = $result[1];
    $len_opened = count($openedtags);
    if (count($closedtags) == $len_opened) {
        return $html;
    }
    $openedtags = array_reverse($openedtags);
    for ($i=0; $i < $len_opened; $i++) {
        if (!in_array($openedtags[$i], $closedtags)) {
            $html .= '</'.$openedtags[$i].'>';
        } else {
            unset($closedtags[array_search($openedtags[$i], $closedtags)]);
        }
    }
    return $html;
} 


solr_core_name = 'duss-indexing'

solr_url = 'http://localhost:8983/solr/'+ solr_core_name+ '/'

search_result_rows = 20

solr_results_highlight_tag = 'mark'

solr_field_names ={
"archive" : {"field_title" : "Digital Collection",
	"display" : "brief"},
"contributing_institution" : {"field_title" : "Contributing Institution",
	"display" : "brief"},
"title" : {"field_title" : "Title",
	"display" : "brief"},
"type_content" : {"field_title" : "Type of Content",
	"display" : "brief"},
"type_digital" : {"field_title" : "Type of Digital Surrogate",
	"display" : "full"},
"geolocation_human" : {"field_title" : "Location",
	"display" : "full"},
"file_format" : {"field_title" : "File Format",
	"display" : "full"},
"alternative_title" : {"field_title" : "Alternative Title",
	"display" : "full"},
"thumbnail_url" : {"field_title" : "Thumbnail URL",
	"display" : "full"},
"description" : {"field_title" : "Description",
	"display" : "brief"},
"full_text" : {"field_title" : "Full Text",
	"display" : "full"},
"type_physical" : {"field_title" : "Type of Physical Artifact",
	"display" : "full"},
"date_original" : {"field_title" : "Date",
	"display" : "full"},
"date_digital" : {"field_title" : "Date Digital",
	"display" : "full"},
"geolocation_machine" : {"field_title" : "Geolocation",
	"display" : "full"},
"shelfmark" : {"field_title" : "Shelfmark",
	"display" : "full"},
"subject_heading" : {"field_title" : "LC Subject Headings",
	"display" : "full"},
"extent" : {"field_title" : "Extent",
	"display" : "full"},
"copyright_holder" : {"field_title" : "Copyright Holder",
	"display" : "full"},
"use_permissions" : {"field_title" : "Use Rights",
	"display" : "full"},
"language" : {"field_title" : "Language",
	"display" : "full"},
"notes" : {"field_title" : "Notes",
	"display" : "full"}
}

brief_display_fields = []
for name,info in solr_field_names.items():
	if info['display']=='brief':
		brief_display_fields.append(name)

facet_fields = {
		"archive_facet" : "Digital Collection",
		"contributing_institution_facet" : "Contributing Institution",
		"subject_heading_facet" : "LC Subject Headings",
		"type_content" : "Type of Content",
		"file_format" : "File Format",
		"language" : "Language"
		#"date"
}

search_fields = {
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
}

advanced_search_fields = {
		"all" : "Search all fields",
		"title" : "Title (title and alternative title fields)",
		"description" : "Description",
		"notes" : "Notes",
		"shelfmark" : "Shelfmark",
		"subject" : "LC Subject Headings",
		"role" : "Roles (authors, editors, etc.)"
}


import re, cgi

def strip_html(html):
	#from https://stackoverflow.com/a/19730306

	tag_re = re.compile(r'(<!--.*?-->|<[^>]*>)')

	# Remove well-formed tags, fixing mistakes by legitimate users
	no_tags = tag_re.sub('', html)

	# Clean up anything else by escaping
	ready_for_web = cgi.escape(no_tags)
	return ready_for_web
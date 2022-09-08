( function ( $ ) {
	'use strict';

	var ckbTransliterationArkbd = {
		id: 'ckb-transliteration-arkbd',
		name: 'باشووری',
		description: 'Central Kurdish keyboard based on Arabic keyboard',
		date: '2013-07-06',
		URL: 'http://github.com/wikimedia/jquery.ime',
		author: 'Çalak',
		license: 'GPLv3',
		version: '1.0',
		patterns: [
			[ '`', 'ژ' ],
			[ '1', '١' ],
			[ '2', '٢' ],
			[ '3', '٣' ],
			[ '4', '٤' ],
			[ '5', '٥' ],
			[ '6', '٦' ],
			[ '7', '٧' ],
			[ '8', '٨' ],
			[ '9', '٩' ],
			[ '0', '٠' ],

			[ 'q', 'چ' ],
			[ 'w', 'ص' ],
			[ 'e', 'پ' ],
			[ 'r', 'ق' ],
			[ 't', 'ف' ],
			[ 'y', 'غ' ],
			[ 'u', 'ع' ],
			[ 'i', 'ھ' ],
			[ 'o', 'خ' ],
			[ 'p', 'ح' ],
			[ '\\[', 'ج' ],
			[ '\\]', 'د' ],

			[ 'a', 'ش' ],
			[ 's', 'س' ],
			[ 'd', 'ی' ],
			[ 'f', 'ب' ],
			[ 'g', 'ل' ],
			[ 'h', 'ا' ],
			[ 'j', 'ت' ],
			[ 'k', 'ن' ],
			[ 'l', 'م' ],
			[ '\\;', 'ک' ],
			[ '\'', 'گ' ],

			[ 'z', 'ئ' ],
			[ 'x', 'ء' ],
			[ 'c', 'ۆ' ],
			[ 'v', 'ر' ],
			[ 'b', 'لا' ],
			[ 'n', 'ى' ],
			[ 'm', 'ە' ],
			[ '\\,', 'و' ],
			[ '\\.', 'ز' ],

			[ '\\%', '٪' ],
			[ '\\(', ')' ],
			[ '\\)', '(' ],

			[ 'Q', 'ض' ],
			[ 'W', '}' ],
			[ 'E', 'ث' ],
			[ 'R', '{' ],
			[ 'T', 'ڤ' ],
			[ 'Y', 'إ' ],
			[ 'U', 'ۊ' ],
			[ 'I', '\'' ],
			[ 'O', '"' ],
			[ 'P', '؛' ],
			[ '\\{', '>' ],
			[ '\\}', '<' ],

			[ 'A', '[' ],
			[ 'S', ']' ],
			[ 'D', 'ێ' ],
			[ 'F', '' ],
			[ 'G', 'ڵ' ],
			[ 'H', 'أ' ],
			[ 'J', 'ـ' ],
			[ 'K', '،' ],
			[ 'L', '\\' ],
			[ '"', 'ط' ],

			[ 'Z', 'ڎ' ],
			[ 'X', 'وو' ],
			[ 'C', 'ؤ' ],
			[ 'V', 'ڕ' ],
			[ 'B', 'ڵا' ],
			[ 'N', 'آ' ],
			[ 'M', 'ة' ],
			[ '\\<', '٫' ],
			[ '\\>', '.' ],
			[ '\\?', '؟' ]
		]
	};

	$.ime.register( ckbTransliterationArkbd );
}( jQuery ) );

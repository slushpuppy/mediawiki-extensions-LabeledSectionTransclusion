<?php
if ( ! defined( 'MEDIAWIKI' ) ) {
	die();
}

/**#@+
 * A parser extension that adds two functions, #lst and #lstx, and the
 * <section> tag, for transcluding marked sections of text.
 *
 * @file
 * @ingroup Extensions
 *
 * @link http://www.mediawiki.org/wiki/Extension:Labeled_Section_Transclusion Documentation
 *
 * @bug 5881
 *
 * @author Steve Sanbeg
 * @copyright Copyright © 2006, Steve Sanbeg
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License 2.0 or later
 */

##
# Standard initialisation code
##

$wgHooks['ParserFirstCallInit'][] = 'LabeledSectionTransclusion::setup';
// @todo FIXME: LanguageGetMagic is obsolete, but LabeledSectionTransclusion::setupMagic()
//              contains magic hack that $magicWords cannot handle.
$wgHooks['LanguageGetMagic'][] = 'LabeledSectionTransclusion::setupMagic';

$wgExtensionCredits['parserhook'][] = array(
	'path'           => __FILE__,
	'name'           => 'LabeledSectionTransclusion',
	'author'         => 'Steve Sanbeg',
	'url'            => 'https://www.mediawiki.org/wiki/Extension:Labeled_Section_Transclusion',
	'descriptionmsg' => 'lst-desc',
);

$dir = dirname( __FILE__ );
$wgAutoloadClasses['LabeledSectionTransclusion'] = $dir . '/LabeledSectionTransclusion.php';
$wgParserTestFiles[] = $dir . "/lstParserTests.txt";
$wgExtensionMessagesFiles['LabeledSectionTransclusion'] = $dir . '/lst.i18n.php';

// Local settings variable
// Must be set now to avoid injection via register_globals
$wgLstLocal = null;

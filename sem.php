<?php
require_once __DIR__ . "\\vendor\\autoload.php";
use Mekras\Speller\Hunspell\Hunspell;
use Mekras\Speller\Issues\Issue;
use Mekras\Speller\Source\StringSource;



// Create a source with the text to check
$source = new StringSource('Tiger, tigr, burning bright');

// Create a Hunspell speller instance
$speller = new Hunspell();

// Check spelling and get issues
$issues = $speller->checkText($source, ['en_GB', 'en']);

// Loop through the issues and display information
foreach ($issues as $issue) {
    /** @var Issue $issue */
    echo "Word: " . $issue->getWord() . "\n";
    echo "Line: " . $issue->getLine() . "\n";
    echo "Offset: " . $issue->getOffset() . "\n";
    echo "Suggestions: " . implode(', ', $issue->getSuggestions()) . "\n\n";
}
?>

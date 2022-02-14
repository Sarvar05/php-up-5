<?php

require_once 'ParserInterface.php';

/**
 * @author Victor Zinchenko <zinchenko.us@gmail.com>
 */
class Parser implements ParserInterface
{
    /**
     * return all tags that incudes the page
     *
     * @param string $url
     * @param string $tag
     * @return array
     */
    public function process(string $url, string $tag): array|bool
    {
        libxml_clear_errors();

        $html = file_get_contents($url);

        if ($html === false) {
            return false;
        } else {

            $dom = new DomDocument();
            $dom->loadHTML($html);

            $tags = $dom->getElementsByTagName('a');
            $result = [];

            foreach ($tags as $tag) {
                $result[] = $tag->textContent;
            }

            return $result;
        }
    }
}

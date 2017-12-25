<?php

class CountryPage extends Page
{
    // Convert UIDs listed under `featured:` to array of pages
    public function featured()
    {
        $featured = $this->feature()->yaml();

        array_walk($featured, function (&$value, $key) {
            $value = page('places/'.$value);
        });

        return $featured;
    }

    // Return `title_short` if exists, else normal title
    public function subdivision()
    {
        if ($this->uid() == 'channel-islands') {
            $subdivision = 'Islands';
        } else {
            $subdivision = 'Counties';
        };

        return $subdivision;
    }

    // Return `title_short` if exists, else normal title
    public function shortTitle()
    {
        if (!$this->title_short()->empty()) {
            $shortTitle = $this->title_short();
        } else {
            $shortTitle = $this->title();
        };

        return $shortTitle;
    }
}

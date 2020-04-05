<?php
class Page {
    private $page, $title , $year , $copyright ;

    /**
     * Set the value of title
     *
     * @return  self
     */ 
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Set the value of year
     *
     * @return  self
     */ 
    public function setYear($year)
    {
        $this->year = $year;

        return $this;
    }

    /**
     * Set the value of copyright
     *
     * @return  self
     */ 
    public function setCopyright($copyright)
    {
        $this->copyright = $copyright;

        return $this;
    }

    private function addHeader() {
        $this->page .= '<html>';
        $this->page .= "<head><meta charset='UTF-8'>
        <title>$this->title</title></head>";
    }

    public function addContent( $content ) {
        $this->addHeader();
        $this->page .="<body>$content</body>";
        $this->addFooter();
    }

    private function addFooter() {
        $this->page .= "<footer>
        <p>&copy;$this->copyright - $this->year<p></footer>";
        $this->page .= '</html>';
    }

    public function get() {return $this->page;}
}

$page1 = new Page;
$page1->setTitle("About Flu");
$page1->setCopyright("NguyenSinhHung");
$page1->setYear("2020");
$page1->addContent("<h1>Flu medication for government employees</h1>

<p>A specific vaccine for humans effective in preventing avian influenza is not yet readily available. Based on limited data, the CDC suggested that the anti-viral medication Oseltamivir (brand name-Tamiflu) may be effective in treating avian influenza. Using this input, the Department of State decided to pre-position the drug Tamiflu at its Embassies and Consulates worldwide, for eligible U.S. Government employees and their families serving abroad who become ill with avian influenza.</p>

<h1>Flu medication for private citizens</h1>

<p>We emphasize that we can’t make this medication available to private U.S. citizens abroad. Because of this, and because Tamiflu may not be readily available overseas, the State Department encourages American citizens traveling or living abroad to consult with their private physician about whether to get Tamiflu before they travel, whether to use if treatment becomes necessary, or if Tamiflu is readily available in the country where they live.</p>

<h1>Counterfeit drug warning</h1>

<p>Americans should also be aware of the potential health risk posed by counterfeit drugs, including those represented as Tamiflu, by internet scam artists or in countries with lax regulations governing the production and distribution of pharmaceuticals.</p>

<h1>Additional precautions</h1>

<p>In addition, the Department of State has asked its embassies and consulates to consider preparedness measures that consider that travel into or out of a country may not be possible, safe or medically advisable. Guidance on how private citizens can prepare for a “stay in place” response, including stockpiling food, water, and medical supplies, is available on the CDC and pandemicflu.gov websites.</p>");
echo $page1->get();

?>
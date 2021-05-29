<?php

class ScrapingTest extends TestCase
{
    /**
     * @var string
     */
    private $htmlContent;

    protected function setUp(): void
    {
        parent::setUp();

        $this->htmlContent = file_get_contents(storage_path('test/test.html'));
    }

    private function makeRequest($content, $template): self
    {
        $postData = [
            'url' => $content,
            'template' => json_encode($template),
            'is_html' => true,
        ];

        return $this->post('/', $postData);
    }

    public function testBasic(): void
    {
        $response = $this->makeRequest($this->htmlContent, [
            'title' => 'title'
        ]);

        $response->assertResponseOk();
        $response->seeJsonContains(['title' => 'Scrawler']);
    }

    public function testLoop(): void
    {
        $response = $this->makeRequest($this->htmlContent, [
            'li-list' => [
                'list-selector' => '.container ul li',
                'content' => [
                    'a-href' => 'a@href'
                ]
            ]
        ]);

        $response->assertResponseOk();
        $response->seeJsonContains([
            'li-list' => [
                ['a-href' => 'http://google.com/1'],
                ['a-href' => 'http://google.com/2'],
                ['a-href' => 'http://google.com/3']
            ]
        ]);
    }

    public function testIdSelector(): void
    {
        $response = $this->makeRequest($this->htmlContent, [
            'src' => '#some-image@src',
            'alt' => '#some-image@alt',
        ]);

        $response->assertResponseOk();
        $response->seeJsonContains([
            'src' => 'http://google.com/some-src.jpg',
            'alt' => 'alt-content'
        ]);
    }
}

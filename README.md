# Scrawler Server

### Description
Todo

### Requirements
- Docker and Docker Compose

### Installation
    git clone https://github.com/fozbek/scrawler-server
    cd scrawler-server
    mv .env.example .env

Generate Key
    
    php -r "echo bin2hex(random_bytes(16));"

Put they key to APP_KEY and run

    docker-compose up -d --build

### Test
    composer test

### Usage

### Parameters
- url
- template
- is_html

#### url  (string)
put url or html content if is_html is true

#### template  (string)
Schema as json. For more information https://github.com/fozbek/scrawler

#### is_html (bool)
set true if url contains html content


### Example

    curl --location --request POST 'http://localhost/' \
        --form 'url="https://news.ycombinator.com/"' \
        --form 'template="{\"title\":\"title\"}"'

Output

```json
{
    "title": "Hacker News"
}
```

### Example 2

    curl --location --request POST 'http://localhost/' \
    --form 'url="https://news.ycombinator.com/"' \
    --form 'template="{\"threads\":{\"list-selector\":\"tr.athing\",\"content\":{\"title\":\".storylink\",\"link\":\".storylink@href\",\"source\":\".sitebit.comhead > a\"}}}"'

Output


```json
{
    "threads": [
        {
            "title": "Yamaha MOTOROiD",
            "link": "https://global.yamaha-motor.com/design_technology/design/concept/motoroid/",
            "source": "yamaha-motor.com"
        },
        {
            "title": "Finding CSV files that start with a BOM using ripgrep",
            "link": "https://til.simonwillison.net/bash/finding-bom-csv-files-with-ripgrep",
            "source": "simonwillison.net"
        },
        {
            "title": "Ghost Stations of the Paris Metro",
            "link": "https://www.urbextour.com/en/urbex-travel/7-ghost-stations-of-the-paris-metro-and-how-to-get-into-the-illegally-unusual-tunnels-rer/",
            "source": "urbextour.com"
        },
        ....
```

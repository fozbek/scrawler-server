<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Scrawler Playground</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <form class="mt-5 mb-5" action="{{ route('play') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="content" class="form-label">Html Content</label>
            <textarea class="form-control" placeholder="" id="content" name="content" required rows="4">{{ $content }}</textarea>
        </div>
        <div class="mb-3">
            <label for="schema" class="form-label">Schema</label>
            <textarea class="form-control" placeholder="" id="schema" name="schema" required rows="4">{{ $schema }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Play</button>
    </form>

    @if(isset($result))
        {{ $result }}
    @endif
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
</body>
</html>

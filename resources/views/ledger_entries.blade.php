<h1>{{ $heading }}</h1>

@unless(count($ledgerEntries) == 0)
    @foreach ($ledgerEntries as $entry)
        <h2>
            <a href="/ledger/{{$entry['id']}}">{{$entry['type']}}</a>
        </h2>
        <p>{{ $entry['type'] }}</p>
        <p>{{ $entry['quantity'] }}</p>
        <p>{{ $entry['price'] }}</p>
        <p>{{ $entry['bought_at'] }}</p>
    @endforeach
@else
    <p>no listings found</p>
@endunless

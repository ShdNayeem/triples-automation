<img  class="img-fluid" {!! $attributeString !!}@if($loadingAttributeValue) loading="{{ $loadingAttributeValue }}"@endif src="{{ $media->getUrl($conversion) }}" alt="{{ $media->name }}">

@extends('layouts.app')
@section('content')
    <div class="layout">
        <h5 class="layout-title">Oyun Kuralları</h5>
        <div class="layout-content">
            <h6 class="text-warning">Tombala Kuralları</h6>
            <div class="text-group">
                <p class="text">Makine içine 1'den 90'a kadar yazılı sayıların olduğu toplar konur.
                    Ayrıca bu sayıların yazılı olduğu 135 karttan dilediğiniz kart ya da kartları
                    alırsınız. Bu kartlardaki sayılar 3 satırdan oluşur ve her satırda 5 sayı
                    bulunmaktadır.</p>
                <p class="text">Oyun makinenin start vermesi ile başlar ve toplar döner. Topların dönme
                    işleminden sonra rasgele bir biçimde toplar makinenin içinden çıkarılarak bütün
                    oyunculara gösterilir ve numaraların yazılı olduğu tabla üzerine yerleştirilir.</p>
                <p class="text">Alınan kartlardan herhangi birinde herhangi bir satırın tamamını ilk
                    tamamlayan kişi ya da kişiler 1. çinkoyu yapmış olur ve 1. çinkoyu yapan kişiler
                    gerekli ödülü bölüşürler. Aynı şekilde herhangi iki satırın tamamını ilk tamamlayan
                    kişi ya da kişiler 2. çinkoyu yapmış olur ve 2. çinkoyu yapan kişiler gerekli ödülü
                    bölüşürler. Tüm sayıları tamamlayan ilk kart ile tombala yapmış olur ve tombalayı
                    ilk yapan kişi ya da kişiler tombala ödülünü bölüşür.</p>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app', ['pageTitle' => 'Bli medlem'])
@section('content')
    <div class="container-narrow mt-2">
        <form method="POST" action="{{ route('postregistration') }}">
            @csrf
            
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <label for="first_name" class="form-label">Förnamn</label>
            <input type="text" class="form-control mb-3" id="first_name" name="first_name" name="first_name" placeholder="Paul" value="{{ old('first_name') }}" required>

            <label for="last_name" class="form-label">Efternamn</label>
            <input type="text" class="form-control mb-3" id="last_name" name="last_name" placeholder="Wysocki" value="{{ old('last_name') }}" required>


            <label for="social" class="form-label">Personnummer - Detta behövs för registrering i IdrottOnline</label>
            <input type="number" class="form-control mb-3" id="social" name="social" value="{{ old('social') }}" required>

            <label for="email" class="form-label">Emailadress</label>
            <input type="email" class="form-control mb-3" id="email" name="email" placeholder="worldchamp@lufs.se" value="{{ old('email') }}" required>

            <label for="phone" class="form-label">Telefonnummer</label>
            <input type="tel" class="form-control mb-3" id="phone" name="phone" placeholder="07XXXXXXXX" value="{{ old('phone') }}" required>

            <label for="street" class="form-label">Gatuadress</label>
            <input type="text" class="form-control mb-3" id="street" name="street" value="{{ old('street') }}" required>

            <div class="row">
                <div class="col-sm-4">
                    <label for="zip" class="form-label">Postkod</label>
                    <input type="number" class="form-control mb-3" id="zip" name="zip" value="{{ old('zip') }}" required>
                </div>
                <div class="col-sm-8">
                    <label for="city" class="form-label">Stad</label>
                    <input type="text" class="form-control mb-3" id="city" name="city" value="{{ old('city') }}" required>
                </div>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="{{ old('newsletter') }}" id="newsletter" name="newsletter">
                <label class="form-check-label" for="newsletter">
                    Jag vill ha LUFS nyhetsbrev utöver vanliga informationsutskick!
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="gdpr" name="gdpr" required>
                <label class="form-check-label" for="gdpr">
                    Jag har tagit del av och förstått Linköping Unika Frisbeesällskaps integritetspolicy. Genom att ansöka om medlemskap samtycker jag till att Linköping discgolf sparar och hanterar mina personuppgifter.
                </label>
            </div>
            <button class="btn btn-primary" type="submit">Bli medlem!</button>
            @error('first_name')

            @enderror
        </form>
    </div>
    
@endsection


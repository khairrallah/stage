<form action="{{ route('operation.transfer') }}" method="POST">
    @csrf

    <div class="form-group">
        <label for="source_compte_id">Compte source :</label>
        <select name="source_compte_id" class="form-control">
            @foreach($comptes as $compte)
                <option value="{{ $compte->id }}">{{ $compte->numcompte }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="destination_compte_id">Compte destination :</label>
        <select name="destination_compte_id" class="form-control">
            @foreach($comptes as $compte)
                <option value="{{ $compte->id }}">{{ $compte->numcompte }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="montant">Montant :</label>
        <input type="number" name="montant" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Transférer</button>
</form>

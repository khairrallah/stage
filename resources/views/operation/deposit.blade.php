<form action="{{ route('operation.deposit') }}" method="POST">
    @csrf

    <div class="form-group">
        <label for="compte_id">Compte :</label>
        <select name="compte_id" class="form-control">
            @foreach($comptes as $compte)
                <option value="{{ $compte->id }}">{{ $compte->numcompte }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="montant">Montant :</label>
        <input type="number" name="montant" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Déposer</button>
</form>

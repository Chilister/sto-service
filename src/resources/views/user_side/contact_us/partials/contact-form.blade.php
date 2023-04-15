<x-forms.post name="form-contact" class="form-contact">
    <div class="mb-4">
        <label for="contact_phone" class="text-dark bold mb-0">Номер Телефону</label>
        <div id="emailHelp" class="small form-text text-secondary mt-0 mb-2 italic">Заповніть номер телефону без +38</div>
        <input type="number" name="phone" id="contact_phone" class="form-control bg-contrast" placeholder="Номер телефону" required>
    </div>

    <div class="mb-4">
        <label for="contact_name" class="text-dark bold">Ім'я</label>
        <input type="text" name="name" id="contact_name" class="form-control bg-contrast" placeholder="Ім'я" required>
    </div>

    <div class="mb-4">
        <label for="contact_message" class="text-dark bold">Опис проблеми</label>
        <textarea name="message" id="contact_message" class="form-control bg-contrast" placeholder="Опис бажаного ремонту" rows="8" required></textarea>
    </div>

    <div class="d-grid gap-2">
        <button id="contact-submit" data-loading-text="Підтвердження..." name="submit" type="submit" class="btn btn-primary btn-rounded">
            Записатись
        </button>
    </div>
</x-forms.post>

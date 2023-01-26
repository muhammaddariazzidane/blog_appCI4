<?= $this->extend('layouts/main') ?>

<?= $this->section('main') ?>
<?= $this->include('components/navbar') ?>
<input type="checkbox" id="my-modal-4" class="modal-toggle" />

<label for="my-modal-4" class="modal  cursor-pointer">
    <label class="modal-box relative  dark:bg-black scrollbar-hide" for="">
        <h1 class="mb-5 text-center dark:text-white text-2xl">Create New Post</h1>

        <form action="/posts" method="post" class=" w-full">
            @csrf
            <label for="title" class="label">
                <span class="label-text dark:text-white">Title</span>
            </label>
            <input type="text" name="title" placeholder="Type here" class="input mb-3 border-primary focus:outline-primary w-full max-w-full " value="{{ old('title') }}" />

            <label for="" class="label">
                <span class="label-text dark:text-white">Category</span>
            </label>
            <select class="select select-bordered border-primary focus:outline-primary w-full max-w-full" name='category_id'>
                <!-- @if ($categories->count())
                @foreach ($categories as $c)
                @if (old('category_id') == $c->id) -->
                <option value="{{ $c->id }}" selected>yang di pilih</option>
                <!-- @else -->
                <!-- <option value="{{ $c->id }}">{{ $c->name }}</option> -->
                <!-- @endif -->
                <!-- @endforeach -->
                <!-- @else -->
                <option>Category Not Found</option>
                <!-- @endif -->
            </select>
            <label for="body" class="label">
                <span class="label-text dark:text-white">Body</span>
            </label>
            <textarea name="body" id="" class="textarea textarea-primary w-full" required></textarea>
            <!-- @error('body') -->
            <label for="" class="label mb-2">
                <span class="label-text-alt text-red-600">{{ $message }}</span>

            </label>
            <!-- @enderror -->
            <div class="mt-5">
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
        </form>
    </label>
</label>
<!-- <h1 class="text-6xl text-primary">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Unde id dolores, ratione officia officiis ex veritatis. Facere, voluptatem? Debitis non sint quam deleniti ducimus. Praesentium exercitationem itaque dolorem labore consequatur tenetur ratione omnis, odio nihil nam voluptatem quibusdam eveniet animi quo numquam rerum iure?</h1> -->



<?= $this->endSection() ?>
<div class="book-header" role="navigation">
    <?php /*{% if glossary.path %}
    <a href="{{ ('/' + glossary.path)|resolveFile }}" class="btn pull-left" aria-label="{{ "GLOSSARY_OPEN"|t }}"><i class="fa fa-sort-alpha-asc"></i></a>
    {% endif %}*/ ?>

    <!-- Title -->
    <h1>
        <i class="fa fa-circle-o-notch fa-spin"></i>
        <a href="<?php the_permalink(); ?>" ><?php the_title(); ?></a>
    </h1>
</div>

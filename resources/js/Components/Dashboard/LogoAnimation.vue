<script setup>
import {ref} from 'vue';
import gsap from 'gsap';

const text = 'SELETRA';
const textRef = ref(text);
let animation;

const startAnimation = () => {
    if (animation) animation.kill(); // Остановка текущей анимации, если она есть

    animation = gsap.to(textRef, {
        duration: 1.0,
        value: 'SELETRA: SE LE TRA',
        ease: 'slow(3.7, 3.7, false)',
        onComplete: () => {
            animation = gsap.to(textRef, {
                duration: 1.5,
                value: 'SELETRA: SELF - LE TRA',
                ease: 'slow(3.7, 3.7, false)',
                onComplete: () => {
                    animation = gsap.to(textRef, {
                        duration: 1.5,
                        value: 'SELETRA: SELF-LEARNING TRA',
                        ease: 'slow(3.7, 3.7, false)',
                        onComplete: () => {
                            animation = gsap.to(textRef, {
                                duration: 1.5,
                                value: 'SELETRA: SELF-LEARNING TRACKER',
                                ease: 'slow(3.7, 3.7, false)',
                            });
                        },
                    });
                },
            });
        },
    });
};

const reverseAnimation = () => {
    if (animation) animation.kill(); // Остановка текущей анимации, если она есть
    textRef.value = 'SELETRA';
};
</script>

<template>
    <div class="text-red-600 text-3xl font-bold cursor-pointer font-roca font-sans">
        <button
            @mouseenter="startAnimation"
            @mouseleave="reverseAnimation"

        >
            {{ textRef }}
        </button>
    </div>
</template>

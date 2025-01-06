from django.db import models

class Blog(models.Model):
    title = models.CharField(max_length=200)
    content = models.TextField()
    tags = models.CharField(max_length=500, blank=True, null=True)
    hashtags = models.CharField(max_length=500, blank=True, null=True)
    video_link = models.URLField(blank=True, null=True)
    photo_link = models.ImageField(upload_to='blog_photos/', blank=True, null=True)
    created_at = models.DateTimeField(auto_now_add=True)

    def __str__(self):
        return self.title
